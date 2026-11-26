// ===================== The Vibe Grid - FlipPlay =====================
const API_URL = 'https://api.tenrai.org/v1/top/anime?limit=25';

// ---------- Aura: tiap Aura punya aturan penyaringan sendiri ----------
const hasAny = (anime, names) => getTags(anime).some((tag) => names.includes(tag));

const AURAS = {
    all:        { label: 'Semua',       emoji: '✨', match: () => true },
    energy:     { label: 'High Energy', emoji: '⚡', match: (a) => hasAny(a, ['Action', 'Sports', 'Adventure', 'Mecha']) },
    melancholy: { label: 'Melancholy',  emoji: '🌧️', match: (a) => hasAny(a, ['Drama', 'Psychological', 'Suspense']) },
    binge:      { label: 'Binge Mode',  emoji: '🍿', match: (a) => (a.episodes || 0) >= 24 },
};

// ---------- State ----------
const state = {
    items: [],      // semua data hasil fetch
    query: '',      // kata kunci search
    aura: 'all',    // aura yang aktif
};

// ---------- Elemen DOM ----------
const searchInput = document.getElementById('vibe-search');
const auraBox     = document.getElementById('aura-buttons');
const statusBox   = document.getElementById('vibe-status');
const cardsBox    = document.getElementById('vibe-cards');
const countText   = document.getElementById('vibe-count');

// ---------- Helper ----------
function getTags(anime) {
    return [...(anime.genres || []), ...(anime.themes || [])].map((g) => g.name);
}

function escapeHTML(text = '') {
    return String(text).replace(/[&<>"']/g, (c) => (
        { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]
    ));
}

// ---------- Render ----------
function renderAuraButtons() {
    auraBox.innerHTML = Object.entries(AURAS).map(([key, aura]) => {
        const isActive = state.aura === key;
        const style = isActive
            ? 'bg-pastel-pink-dark text-white'
            : 'bg-white text-blue-900 hover:bg-pastel-lavender';
        return `
            <button type="button" data-aura="${key}" aria-pressed="${isActive}"
                    class="${style} font-semibold px-5 py-2 rounded-full shadow transition">
                ${aura.emoji} ${aura.label}
            </button>`;
    }).join('');
}

function renderCards(list) {
    cardsBox.innerHTML = list.map((anime) => {
        const tags = getTags(anime).slice(0, 3);
        const poster = anime.images?.jpg?.image_url || '';
        return `
            <article class="bg-white rounded-2xl overflow-hidden shadow hover:-translate-y-1 transition flex flex-col">
                <img src="${poster}" alt="Poster ${escapeHTML(anime.title)}" loading="lazy"
                     class="w-full h-64 object-cover">
                <div class="p-4 flex flex-col gap-2 grow">
                    <h3 class="font-semibold text-blue-900 line-clamp-2">${escapeHTML(anime.title)}</h3>
                    <p class="text-sm">
                        ⭐ ${anime.score ?? '-'} &middot; ${anime.episodes ?? '?'} eps
                    </p>
                    <ul class="flex flex-wrap gap-1 mt-auto">
                        ${tags.map((t) => `<li class="text-xs bg-pastel-blue px-2 py-1 rounded-full">${escapeHTML(t)}</li>`).join('')}
                    </ul>
                </div>
            </article>`;
    }).join('');
}

function showLoading() {
    cardsBox.innerHTML = '';
    countText.textContent = '';
    statusBox.innerHTML = `
        <div class="inline-block h-10 w-10 animate-spin rounded-full border-4 border-pastel-lavender-dark border-t-transparent"></div>
        <p class="mt-3">Sedang memuat data...</p>`;
}

function showError(message) {
    cardsBox.innerHTML = '';
    countText.textContent = '';
    statusBox.innerHTML = `
        <p class="text-red-600 font-semibold mb-3">Gagal memuat data: ${escapeHTML(message)}</p>
        <button type="button" data-action="retry"
                class="bg-pastel-pink-dark text-white font-semibold px-6 py-2 rounded-full hover:bg-pastel-lavender-dark transition">
            Coba Lagi
        </button>`;
}

// ---------- Filter gabungan: search + aura ----------
function getVisibleItems() {
    const keyword = state.query.trim().toLowerCase();
    const aura = AURAS[state.aura];

    return state.items.filter((anime) => {
        const title = `${anime.title} ${anime.title_english || ''}`.toLowerCase();
        return aura.match(anime) && title.includes(keyword);
    });
}

function updateView() {
    const visible = getVisibleItems();
    renderAuraButtons();
    renderCards(visible);

    countText.textContent = `Menampilkan ${visible.length} dari ${state.items.length} judul`;
    statusBox.innerHTML = visible.length === 0
        ? '<p>Tidak ada judul yang cocok. Coba kata kunci atau Aura lain.</p>'
        : '';
}

// ---------- Fetch API ----------
async function loadAnime() {
    showLoading();
    try {
        const response = await fetch(API_URL);
        if (!response.ok) {
            throw new Error(`Server membalas dengan status ${response.status}`);
        }
        const result = await response.json();
        state.items = result.data;
        updateView();
    } catch (error) {
        showError(error.message);
    }
}

// ---------- Event handling ----------
// 1) input: search real-time
searchInput.addEventListener('input', (event) => {
    state.query = event.target.value;
    updateView();
});

// 2) click: tombol Aura (event delegation)
auraBox.addEventListener('click', (event) => {
    const button = event.target.closest('[data-aura]');
    if (!button) return;
    state.aura = button.dataset.aura;
    updateView();
});

// 3) click: tombol "Coba Lagi" saat error
statusBox.addEventListener('click', (event) => {
    if (event.target.closest('[data-action="retry"]')) loadAnime();
});

// ---------- Mulai ----------
renderAuraButtons();
loadAnime();
