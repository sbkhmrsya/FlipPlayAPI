<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FlipPlay: streaming anime, drama, manga, dan light novel dalam satu aplikasi web.">
    <title>FlipPlay | Streaming &amp; Baca dalam Satu Tempat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pastel-cream text-pastel-text antialiased">


    <header class="sticky top-0 z-50 bg-pastel-blue/90 backdrop-blur shadow-sm">
        <nav class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4" aria-label="Navigasi utama">
            <a href="#home" class="text-2xl font-extrabold text-blue-800">Flip<span class="text-pastel-lavender-dark">Play</span></a>

            
            <ul class="hidden md:flex items-center gap-8 font-medium text-blue-900">
                <li><a href="#home" class="hover:text-pastel-lavender-dark transition">Home</a></li>
                <li><a href="#about" class="hover:text-pastel-lavender-dark transition">About</a></li>
                <li><a href="#konten" class="hover:text-pastel-lavender-dark transition">Konten</a></li>
                <li><a href="#vibe-grid" class="hover:text-pastel-lavender-dark transition">Vibe Grid</a></li>
                <li><a href="#fitur" class="hover:text-pastel-lavender-dark transition">Fitur</a></li>
                <li><a href="#contact" class="bg-pastel-pink-dark text-white px-4 py-2 rounded-full hover:bg-pastel-lavender-dark transition">Contact</a></li>
            </ul>

        
            <details class="md:hidden relative">
                <summary class="list-none cursor-pointer px-3 py-2 rounded-lg bg-white/60 text-blue-900 font-semibold select-none">Menu</summary>
                <ul class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg p-3 space-y-1 text-blue-900">
                    <li><a href="#home" class="block px-3 py-2 rounded-lg hover:bg-pastel-blue">Home</a></li>
                    <li><a href="#about" class="block px-3 py-2 rounded-lg hover:bg-pastel-blue">About</a></li>
                    <li><a href="#konten" class="block px-3 py-2 rounded-lg hover:bg-pastel-blue">Konten</a></li>
                    <li><a href="#vibe-grid" class="block px-3 py-2 rounded-lg hover:bg-pastel-blue">Vibe Grid</a></li>
                    <li><a href="#fitur" class="block px-3 py-2 rounded-lg hover:bg-pastel-blue">Fitur</a></li>
                    <li><a href="#contact" class="block px-3 py-2 rounded-lg hover:bg-pastel-pink">Contact</a></li>
                </ul>
            </details>
        </nav>
    </header>

    <main>
        <section id="home" class="bg-linear-to-br from-pastel-blue via-pastel-lavender to-pastel-pink">
            <div class="max-w-3xl mx-auto px-6 py-16 md:py-24 text-center">
                <p class="inline-block bg-white/70 text-pastel-lavender-dark font-semibold text-sm px-4 py-1 rounded-full mb-4">Streaming + Digital Reading</p>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-blue-900 mb-4">
                    Anime, drama, manga, novel. Semuanya ada di FlipPlay.
                </h1>
                <p class="text-lg text-pastel-text mb-8 max-w-xl mx-auto">
                    Tonton dan baca tanpa pindah aplikasi. Satu akun, satu tempat, untuk semua hiburan favoritmu.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contact" class="bg-pastel-pink-dark text-white font-semibold px-6 py-3 rounded-full shadow hover:bg-pastel-lavender-dark transition">Mulai Sekarang</a>
                    <a href="#konten" class="bg-white text-blue-900 font-semibold px-6 py-3 rounded-full shadow hover:bg-pastel-cream transition">Lihat Konten</a>
                </div>
            </div>
        </section>

        <section id="about" class="max-w-4xl mx-auto px-6 py-16 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-4">Tentang FlipPlay</h2>
            <p class="leading-relaxed text-lg">
                FlipPlay adalah platform hiburan digital generasi baru yang menyatukan layanan streaming video dan
                digital reading dalam satu aplikasi web. Pengguna bisa menikmati anime dan drama, lalu lanjut membaca 
                light novel dari judul yang sama, tanpa berpindah platform.
            </p>
        </section>

        
        <section id="konten" class="bg-white py-16">
            <div class="max-w-6xl mx-auto px-6">
                <header class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-blue-900 mb-2">Pilihan Konten</h2>
                    <p>Kategori hiburan dalam satu pengalaman yang terpadu.</p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
    <article class="bg-pastel-blue rounded-2xl p-4 shadow hover:-translate-y-1 transition"> 
        <img src="{{ asset('images/Anime.jpg') }}" alt="Karakter anime perempuan di padang rumput" class="w-full h-56 object-cover rounded-xl mb-4"> 
        <h3 class="text-xl font-semibold text-blue-900 mb-2">Anime</h3> 
        <p class="mb-3">Streaming anime terbaru dan klasik dengan kualitas gambar jernih.</p> 
        <p>Di FlipPlay, kamu bisa menontonnya dengan subtitle Indonesia dan melanjutkan tontonan dari perangkat apa pun.</p> 
    </article> 

    <article class="bg-pastel-pink rounded-2xl p-4 shadow hover:-translate-y-1 transition"> 
        <img src="{{ asset('images/Drama.jpg') }}" alt="Popcorn, minuman, dan clapperboard film" class="w-full h-56 object-cover rounded-xl mb-4"> 
        <h3 class="text-xl font-semibold text-blue-900 mb-2">Drama</h3> 
        <p class="mb-3">Drama dari berbagai negara, lengkap dengan subtitle yang nyaman dibaca.</p> 
        <p>Di FlipPlay, kamu bisa menikmati berbagai drama dari berbagai negara dengan subtitle yang mudah dipahami dan kualitas tayangan yang nyaman untuk ditonton.</p> 
    </article> 

    <article class="bg-pastel-sage rounded-2xl p-4 shadow hover:-translate-y-1 transition"> 
        <img src="{{ asset('images/Light_Novel.jpg') }}" alt="Tumpukan buku bacaan bergambar" class="w-full h-56 object-cover rounded-xl mb-4"> 
        <h3 class="text-xl font-semibold text-blue-900 mb-2">Light Novel</h3> 
        <p class="mb-3">Nikmati light novel favoritmu dengan mode baca yang ramah di mata.</p> 
        <p>Di FlipPlay, kamu bisa membaca berbagai light novel dengan tampilan yang sederhana dan nyaman, sehingga dapat menikmati cerita favorit kapan saja.</p> 
    </article> 

    
<article class="bg-pastel-sage rounded-2xl p-4 shadow hover:-translate-y-1 transition">  
    <img src="{{ asset('images/Manga.jpg') }}" alt="Kumpulan manga untuk dibaca" class="w-full h-56 object-cover rounded-xl mb-4">  
    <h3 class="text-xl font-semibold text-blue-900 mb-2">Manga</h3>  
    <p class="mb-3">Nikmati manga favoritmu dengan mode baca yang ramah di mata.</p>  
    <p>Di FlipPlay, kamu bisa membaca berbagai manga dengan tampilan yang sederhana dan nyaman, sehingga dapat menikmati cerita favorit kapan saja.</p>  
</article>

</div>
        </section>

        <!-- ====== THE VIBE GRID (tempel di bawah </section> "Pilihan Konten", sebelum section "Sedang Populer") ====== -->
        <section id="vibe-grid" class="max-w-6xl mx-auto px-6 py-16">
            <header class="text-center mb-8">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">The Vibe Grid</h2>
                <p>Cari judul atau pilih Aura sesuai mood kamu hari ini.</p>
            </header>

            <!-- Unified Search -->
            <div class="max-w-xl mx-auto mb-6">
                <label for="vibe-search" class="sr-only">Cari judul</label>
                <input id="vibe-search" type="search" placeholder="Cari judul anime..." autocomplete="off"
                       class="w-full border border-pastel-blue-dark p-3 rounded-full px-5 bg-white focus:outline-none focus:ring-2 focus:ring-pastel-lavender-dark">
            </div>

            <!-- Aura-Based Discovery (tombol dibuat oleh app.js) -->
            <div id="aura-buttons" class="flex flex-wrap justify-center gap-3 mb-4" role="group" aria-label="Pilih Aura"></div>

            <p id="vibe-count" class="text-center text-sm mb-8" aria-live="polite"></p>

            <!-- Loading / error / kosong -->
            <div id="vibe-status" class="text-center py-10" aria-live="polite"></div>

            <!-- Grid card -->
            <div id="vibe-cards" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"></div>
        </section>

        <section class="max-w-6xl mx-auto px-6 py-16">
            <header class="text-center mb-10">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Sedang Populer</h2>
                <p>Sekilas tampilan konten yang akan hadir di FlipPlay.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <figure class="bg-white rounded-2xl overflow-hidden shadow">
                    <figcaption class="p-4">
                        <h3 class="font-semibold text-blue-900">Animasi Aksi</h3>
                        <p class="text-sm">Petualangan penuh kekuatan super.</p>
                    </figcaption>
                </figure>
                <figure class="bg-white rounded-2xl overflow-hidden shadow">
                    <figcaption class="p-4">
                        <h3 class="font-semibold text-blue-900">Hiburan Musik</h3>
                        <p class="text-sm">Konten musik dan variety pilihan.</p>
                    </figcaption>
                </figure>
                <figure class="bg-white rounded-2xl overflow-hidden shadow">
                    <figcaption class="p-4">
                        <h3 class="font-semibold text-blue-900">Majalah Digital</h3>
                        <p class="text-sm">Bacaan visual untuk kamu yang suka tren.</p>
                    </figcaption>
                </figure>
            </div>
        </section>

        <section id="fitur" class="bg-pastel-lavender/50 py-16">
            <div class="max-w-6xl mx-auto px-6">
                <header class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-blue-900 mb-2">Kenapa FlipPlay?</h2>
                </header>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <article class="bg-white rounded-2xl p-6 shadow">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">Satu Aplikasi</h3>
                        <p>Streaming dan membaca digabung, jadi tidak perlu bolak-balik antar platform.</p>
                    </article>
                    <article class="bg-white rounded-2xl p-6 shadow">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">Berbasis Web</h3>
                        <p>Cukup buka browser. Tanpa instalasi, bisa diakses dari mana saja.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact" class="max-w-6xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-blue-900 mb-3">Hubungi Kami</h2>
                    <p class="max-w-md mx-auto lg:mx-0">
                        Punya saran judul, pertanyaan, atau ingin jadi pengguna awal FlipPlay? Kirim pesan dan tim kami akan membalas secepatnya.
                    </p>
                </div>

                <form action="#" method="post" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg space-y-4">
                    <div>
                        <label for="nama" class="block font-medium mb-1">Nama</label>
                        <input id="nama" name="nama" type="text" required placeholder="Nama lengkap"
                               class="w-full border border-pastel-blue-dark p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-pastel-lavender-dark">
                    </div>
                    <div>
                        <label for="email" class="block font-medium mb-1">Email</label>
                        <input id="email" name="email" type="email" required placeholder="nama@email.com"
                               class="w-full border border-pastel-blue-dark p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-pastel-lavender-dark">
                    </div>
                    <div>
                        <label for="minat" class="block font-medium mb-1">Minat</label>
                        <select id="minat" name="minat"
                                class="w-full border border-pastel-blue-dark p-3 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-pastel-lavender-dark">
                            <option>Anime</option>
                            <option>Drama</option>
                            <option>Manga</option>
                            <option>Light Novel</option>
                        </select>
                    </div>
                    <div>
                        <label for="pesan" class="block font-medium mb-1">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="4" required placeholder="Tulis pesanmu di sini"
                                  class="w-full border border-pastel-blue-dark p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-pastel-lavender-dark"></textarea>
                    </div>
                    <button type="submit"
                            class="w-full bg-pastel-pink-dark text-white font-semibold px-6 py-3 rounded-lg hover:bg-pastel-lavender-dark transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </section>
    </main>

    <footer class="bg-blue-900 text-pastel-blue">
        <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <p class="text-xl font-extrabold text-white">FlipPlay</p>
                <p class="text-sm mt-2">Streaming dan digital reading dalam satu aplikasi web.</p>
            </div>
            <nav aria-label="Navigasi footer">
                <p class="font-semibold text-white mb-2">Menu</p>
                <ul class="space-y-1 text-sm">
                    <li><a href="#home" class="hover:text-white">Home</a></li>
                    <li><a href="#about" class="hover:text-white">About</a></li>
                    <li><a href="#konten" class="hover:text-white">Konten</a></li>
                    <li><a href="#contact" class="hover:text-white">Contact</a></li>
                </ul>
            </nav>
            <address class="not-italic text-sm">
                <p class="font-semibold text-white mb-2">Kontak</p>
                <p>halo@flipplay.example</p>
                <p>Indonesia</p>
            </address>
        </div>
        <p class="border-t border-white/10 text-center text-sm py-4">&copy; 2026 FlipPlay. Seluruh hak cipta dilindungi.</p>
    </footer>

</body>
</html>
