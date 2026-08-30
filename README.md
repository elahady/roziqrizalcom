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

Ada dua jenis halaman:

1. **Halaman statis murni** (Rooms, About, Privacy Policy, dll.) — tidak
   tampil di listing/kategori manapun. Cukup:
   - Buat view di `resources/views/pages/<nama>.blade.php`.
   - Daftarkan `Route::view('/slug', 'pages.nama')` di `routes/web.php`.

2. **Post** (blog & trading journal) — tampil di halaman Journal dan/atau
   arsip kategori, jadi metadatanya (judul, tanggal, excerpt, kategori) tidak
   boleh diketik ulang di banyak file. Lihat bagian berikut.

## Menambah post baru

Post metadata punya **satu sumber kebenaran**: [`app/Support/Posts.php`](app/Support/Posts.php).
Routing (`PostController`) dan semua listing (Journal, arsip kategori) baca
dari array ini — jangan sentuh `routes/web.php` untuk post baru.

Langkah menambah post:

1. Buat view di `resources/views/posts/<nama-file>.blade.php` (isi bebas,
   pakai `<x-layout>` seperti post lain).
2. Tambah satu entry di `Posts::all()`:
   ```php
   'slug-url-post-ini' => [
       'view' => 'posts.nama-file',
       'title' => 'Judul Post',
       'date' => 'Month DD, YYYY',
       'excerpt' => 'Ringkasan singkat, diakhiri …',
       'category' => 'blog', // atau 'btcusd', atau kategori baru
   ],
   ```
3. Selesai — `/slug-url-post-ini` otomatis ke-route ke view-nya, dan post
   otomatis muncul di listing kategori yang sesuai (lihat
   `Posts::byCategory()` yang dipakai `routes/web.php` untuk halaman Journal
   & arsip kategori).

Jangan bikin `Route::view()` baru per post, dan jangan copy-paste markup
`<article class="post-card">` di listing manapun — pakai
`@include('partials.post-card', ['slug' => $slug, 'post' => $post])`, yang
sudah otomatis dipakai oleh `journal.blade.php` dan
`partials/trading-post-list.blade.php` lewat `@foreach ($posts as $slug =>
$post)`.

## Partial yang wajib dipakai ulang

- **`partials.post-card`** — satu kartu post di listing (judul + tanggal +
  excerpt + link). Dipakai di `journal.blade.php` dan
  `partials/trading-post-list.blade.php`.
- **`partials.no-comments`** — placeholder "belum ada komentar" di akhir
  artikel. Default: heading "Leave a Reply", pesan "Belum ada komentar.".
  Override lewat prop kalau perlu teks beda:
  ```blade
  @include('partials.no-comments', ['heading' => 'Comments', 'message' => 'Pesan custom.'])
  ```
  Kalau sebuah post memang punya komentar riil (bukan placeholder), tulis
  manual dengan class `.comment-item` / `.comment-author` / `.comment-meta`
  (lihat `posts/menavigasi-arsitektur.blade.php`), jangan pakai partial ini.

## Styling

- **Jangan pakai atribut `style="..."` inline di Blade.** Tambahkan class ke
  stylesheet yang relevan. Ini supaya satu perubahan visual (warna border,
  spacing) tidak perlu diulang di setiap file post.
- Ada **dua stylesheet** yang hidup berdampingan (transisi desain, bukan
  duplikasi yang perlu buru-buru disatukan):
  - `resources/css/app.css` — desain acuan/source-of-truth terbaru (palet
    sage/Material-3, token warna `--color-primary` dll.), dipakai homepage.
  - `public/css/app.css` — layout lama, dipakai halaman lain (Journal,
    posts, pages, category), sudah direstyle agar konsisten dengan homepage
    lewat token warna sendiri (`--border-light`, `--muted`, dll.).
  Kalau menambah style untuk halaman non-homepage, tambahkan ke
  `public/css/app.css` dan pakai variabel token yang sudah ada, bukan warna
  hex baru.

## Menjalankan lokal

```
php artisan serve
```

Test cepat setelah menambah/ubah post atau route:

```
php artisan route:list
```
