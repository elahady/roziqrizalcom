<?php

use Illuminate\Support\Facades\Route;

// Home / blog index
Route::view('/', 'home')->name('home');
Route::view('/home', 'home');

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
Route::view('/category/daily-jurnal-trading', 'category.daily-jurnal-trading');
Route::view('/category/daily-jurnal-trading/btcusd', 'category.btcusd');

// Blog posts (category: Blog)
Route::view('/firsst-post', 'posts.firsst-post');
Route::view('/al-kaukaba-ikhtiar-mendekatkan-langit-ke-dalam-genggaman', 'posts.al-kaukaba');
Route::view('/emas-dolar-dan-rdpu-mengapa-safe-haven-adalah-kunci-saat-genderang-perang-ditabuh', 'posts.emas-dolar-rdpu');
Route::view(
    '/menavigasi-arsitektur-rilis-aplikasi-falak-al-kaukaba-sebagai-monumen-pembelajaran-bagi-software-developer-di-labirin-google-play-store',
    'posts.menavigasi-arsitektur'
);

// Trading journal posts (category: Daily Jurnal Trading > BTCUSD)
Route::view('/btcusd-the-power-of-patience-executing-the-masterplan-setting-the-h4-demand-trap', 'posts.btcusd-power-of-patience');
Route::view('/btcusd-the-critical-lesson-when-ego-overrides-the-plan', 'posts.btcusd-critical-lesson');
Route::view('/btcusd-rabu-18-maret-2026', 'posts.btcusd-rabu-18-maret');
Route::view('/btcusd-daily-trading-jurnal-16-maret-2026', 'posts.btcusd-senin-16-maret');
