# FlipPlay

FlipPlay is a Laravel application for discovering anime and browsing a media library of anime, drama, manga, and light novels.

## Requirements

- PHP 8.3+
- Composer
- Node.js and npm

## Setup

```powershell
composer install
npm install
if (-not (Test-Path .env)) {
    Copy-Item .env.example .env
    php artisan key:generate
}
php artisan migrate --seed
```

Run the Laravel server and Vite in separate terminals:

```powershell
php artisan serve
npm run dev
```

The demo media records are inserted by `php artisan db:seed`. Build static assets for production with `npm run build`.

## Media API

The JSON API supports listing, searching, filtering, creating, updating, and deleting media under `/api/media`.

- `GET /api/media?search=frieren&jenis=Anime&is_available=1`
- `POST /api/media`
- `GET`, `PUT`, `PATCH`, and `DELETE /api/media/{media}`
- `POST /api/media/{media}/add-to-collection` with a `user_id`
- `DELETE /api/media/{media}/remove-from-collection` with a `user_id`
- `GET /api/users/{user}/collection`

Media records use `judul`, `jenis`, `genre`, optional `deskripsi`, `episodes`, `score`, `country`, `chapters`, and `volumes` fields, and `is_available` (defaults to `true`).
