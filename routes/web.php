<?php

use App\Http\Controllers\PostController;
use App\Support\Posts;
use Illuminate\Support\Facades\Route;

// Home / personal branding landing
Route::view('/', 'home')->name('home');
Route::view('/home', 'home');

// Blog index (was previously the homepage)
Route::get('/journal', fn () => view('journal', ['posts' => Posts::byCategory('blog')]))->name('journal');

// Static profile & content pages
Route::view('/im-project-manager', 'pages.im-project-manager');
Route::view('/my-management-playbook', 'pages.my-management-playbook');
Route::view('/it-enthusiast', 'pages.it-enthusiast');
Route::view('/market-observer', 'pages.market-observer');
Route::view('/about-me', 'pages.about-me');
Route::view('/haji-2026', 'pages.haji-2026');
Route::view('/privacy-policy-al-kaukaba', 'pages.privacy-policy');
Route::view('/culture-leadership', 'pages.culture-leadership');
Route::view('/the-bridge', 'pages.the-bridge');
Route::view('/anonymized-case-studies', 'pages.anonymized-case-studies');

// Category archives
Route::get('/category/daily-jurnal-trading', fn () => view('category.daily-jurnal-trading', ['posts' => Posts::byCategory('btcusd')]));
Route::get('/category/daily-jurnal-trading/btcusd', fn () => view('category.btcusd', ['posts' => Posts::byCategory('btcusd')]));

// Blog & trading journal posts — metadata (title, date, excerpt, category)
// lives in app/Support/Posts.php, the single source of truth also used by
// the journal/category listings above. Adding a post = new view + one entry
// there, nothing to add here.
Route::get('/{slug}', [PostController::class, 'show'])
    ->where('slug', implode('|', array_map(fn ($slug) => preg_quote($slug, '#'), array_keys(Posts::all()))))
    ->name('post.show');
