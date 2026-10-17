# roziqrizal.com

Personal branding website (Laravel). Lihat [CLAUDE.md](CLAUDE.md) untuk tema
inti situs ("Denah Hidup" / satu orang, banyak ruang, satu sistem) dan catatan
desain. File ini berisi **konvensi kode & konten** — baca sebelum menambah
halaman, post, atau partial baru.

## Struktur & filosofi

Situs ini sengaja **tanpa database untuk konten** dan **tanpa admin panel** —
setiap halaman/post di-authoring langsung sebagai file Blade dan di-commit ke
git. Ini keputusan sadar untuk volume konten personal (puluhan post), bukan
utang teknis. Kalau nanti volume tumbuh jauh lebih besar dan mulai butuh
draft/schedule/edit dari luar git, itu baru jadi trigger untuk naik level ke
model+database.

Ada tiga jenis halaman. Semuanya memakai satu layout, `<x-layout>`
(`resources/views/components/layout.blade.php`), dengan header dan footer yang sama
dengan homepage.

1. **Halaman profil/statis** (Tentang saya, I'm Project Manager, Hajj 2026, dll.) —
   tidak tampil di Journal. Cukup:
   - Buat view di `resources/views/pages/<nama>.blade.php`, dibungkus
     `<x-page title="...">` (isinya markup polos: `<h2>`, `<p>`, `<ul>`, dst.;
     judul dan kolom baca dirender komponen). Opsional: `eyebrow`, `meta`, `active`.
   - Daftarkan `Route::view('/slug', 'pages.nama')` di `routes/web.php`.
   - Tambahkan ke menu **Profil** di `resources/views/partials/site-header.blade.php`
     (array `$profile`) supaya ada jalan masuknya.
2. **Post** (blog & jurnal trading) — tampil di Journal dan di filter ruang, jadi
   metadatanya tidak boleh diketik ulang di banyak file. Lihat bagian berikut.
3. **Halaman Karya** (`/karya/{slug}`) — metadata di `app/Support/Projects.php`,
   view di `resources/views/karya/`, memakai `<x-layout active="karya">`.

## Menambah post baru

Post metadata punya **satu sumber kebenaran**: [`app/Support/Posts.php`](app/Support/Posts.php).
Routing (`PostController`) dan Journal (`JournalController`) baca dari array ini — jangan
sentuh `routes/web.php` untuk post baru.

Langkah menambah post:

1. Buat view di `resources/views/posts/<nama-file>.blade.php`:
   ```blade
   <x-post :slug="$slug" :post="$post">

       <h2>Subjudul</h2>
       <p>Isi tulisan...</p>

   </x-post>
   ```
   Judul, tanggal, penulis, chip seri, kartu "ruang asal", navigasi lebih lama/lebih baru
   dirender komponen dari metadata di bawah — jangan diketik ulang di view. Kalau post punya
   komentar, taruh di `<x-slot:comments>...</x-slot:comments>` (default: tidak ada bagian komentar).
2. Tambah satu entry di `Posts::all()`:
   ```php
   'slug-url-post-ini' => [
       'view' => 'posts.nama-file',
       'title' => 'Judul Post',
       'date' => 'Month D, YYYY',
       'excerpt' => 'Ringkasan singkat, diakhiri …',
       'room' => 'taktik',   // slug dari Rooms::all(): finansial, kerja, angkasa, ...
       'series' => 'btcusd', // opsional, kunci dari Posts::SERIES
   ],
   ```
3. Selesai — `/slug-url-post-ini` otomatis ke-route, post muncul di Journal, di filter
   `/journal?ruang=<room>`, dan jumlahnya ikut tampil di kartu ruang homepage.

Chip filter di Journal hanya muncul untuk ruang yang punya post. Ruang baru ditambah di
[`app/Support/Rooms.php`](app/Support/Rooms.php); teks kartunya di homepage ada di
`resources/views/rooms/` (ubah keduanya kalau tagline berganti).

URL lama `/category/daily-jurnal-trading` dan `/category/daily-jurnal-trading/btcusd`
dialihkan (301) ke `/journal?ruang=taktik`.

## Partial & komponen yang wajib dipakai ulang

- **`<x-layout>`** — satu-satunya layout. Props: `title`, `description`, `active`
  (`denah` | `karya` | `journal` | `profil`, untuk menyorot menu).
- **`<x-post>`** dan **`<x-page>`** — pembungkus post dan halaman profil (lihat di atas).
- **`partials.post-row`** — satu baris post di listing Journal.
- **`partials.room-journal-link`** — baris "N tulisan di Journal →" di tiap kartu ruang.
- **`partials.no-comments`** — placeholder "belum ada komentar" untuk slot `comments`.
  Override lewat prop kalau perlu teks beda:
  ```blade
  @include('partials.no-comments', ['heading' => 'Comments', 'message' => 'Pesan custom.'])
  ```
  Kalau sebuah post memang punya komentar riil, tulis manual dengan class `.comments` /
  `.comment-item` / `.comment-author` / `.comment-meta` (lihat
  `posts/menavigasi-arsitektur.blade.php`).

## Styling

- **Jangan pakai atribut `style="..."` inline di Blade.** Pakai utilitas Tailwind dan
  token warna dari `resources/css/app.css` (`text-primary`, `bg-sage-pastel`, dst.),
  bukan warna hex baru.
- Hanya ada **satu stylesheet**: `resources/css/app.css` (Tailwind v4 + Vite). Isi artikel
  di dalam `<x-post>`/`<x-page>` memakai markup polos; elemen `h2`, `h3`, `ul`, `blockquote`,
  `table`, `figure`, `.image-row`, `.core-insight` di-style oleh blok `.article-body` di file itu.
- Aset dibangun lewat `npm run build` (otomatis di Dockerfile); `public/build` tidak ada di git.

## Menjalankan lokal

```
npm run build   # sekali, atau npm run dev
php artisan serve
```

Test cepat setelah menambah/ubah post atau route:

```
php artisan route:list
```
