<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\PostController;
use App\Support\Posts;
use App\Support\Projects;
use Illuminate\Support\Facades\Route;

// Home / personal branding landing
Route::view('/', 'home')->name('home');
Route::view('/home', 'home');

// Journal: semua tulisan, atau satu ruang lewat ?ruang=<slug>
Route::get('/journal', [JournalController::class, 'index'])->name('journal');

// Static profile & content pages
Route::view('/im-project-manager', 'pages.im-project-manager');
Route::view('/my-management-playbook', 'pages.my-management-playbook');
Route::view('/it-enthusiast', 'pages.it-enthusiast');
Route::view('/market-observer', 'pages.market-observer');
Route::view('/about-me', 'pages.about-me');
Route::view('/haji-2026', 'pages.haji-2026');
Route::view('/privacy-policy-al-kaukaba', 'pages.privacy-policy');

// Portfolio ("Karya") detail pages — metadata lives in app/Support/Projects.php.
// Only projects with a 'view' key get a page; the rest are homepage cards only.
Route::get('/karya/{slug}', function (string $slug) {
    $project = Projects::withPage()[$slug] ?? abort(404);

    return view($project['view'], ['project' => $project]);
})->name('karya.show');

// Arsip kategori lama — jurnal trading sekarang ada di Ruang Taktik
Route::redirect('/category/daily-jurnal-trading', '/journal?ruang=taktik', 301);
Route::redirect('/category/daily-jurnal-trading/btcusd', '/journal?ruang=taktik', 301);

// Blog & trading journal posts — metadata (title, date, excerpt, room)
// lives in app/Support/Posts.php, the single source of truth also used by
// the journal listing above. Adding a post = new view + one entry
// there, nothing to add here.
Route::get('/{slug}', [PostController::class, 'show'])
    ->where('slug', implode('|', array_map(fn ($slug) => preg_quote($slug, '#'), array_keys(Posts::all()))))
    ->name('post.show');
