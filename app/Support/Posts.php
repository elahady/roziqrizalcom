<?php

namespace App\Support;

/**
 * Single source of truth for post/journal metadata.
 *
 * Adding a new post: create the Blade view under resources/views/posts/,
 * then add one entry here. Routing (via PostController) and every listing
 * (journal, category archives) read from this array — no other file needs
 * to be touched.
 */
class Posts
{
    /**
     * @return array<string, array{view: string, title: string, date: string, excerpt: string, category: string}>
     */
    public static function all(): array
    {
        return [
            'menavigasi-arsitektur-rilis-aplikasi-falak-al-kaukaba-sebagai-monumen-pembelajaran-bagi-software-developer-di-labirin-google-play-store' => [
                'view' => 'posts.menavigasi-arsitektur',
                'title' => 'Menavigasi Arsitektur Rilis Aplikasi Falak Al-Kaukaba sebagai Monumen Pembelajaran bagi Software-Developer di Labirin Google Play Store',
                'date' => 'March 14, 2026',
                'excerpt' => 'Membangun sebuah arsitektur aplikasi adalah perwujudan dari imajinasi teknis, namun mengeksekusi peluncurannya ke hadapan jagat digital adalah sebuah kontestasi yang menuntut ketabahan intelektual yang berbeda. Tulisan ini bukan sekadar catatan teknis; ia adalah sebuah rekam jejak birokrasi dan purifikasi kode yang saya lalui untuk membawa aplikasi Falak Al-Kaukaba menembus pintu gerbang Google Play Store. Sebuah…',
                'category' => 'blog',
            ],
            'emas-dolar-dan-rdpu-mengapa-safe-haven-adalah-kunci-saat-genderang-perang-ditabuh' => [
                'view' => 'posts.emas-dolar-rdpu',
                'title' => "Emas, Dolar, dan RDPU: Mengapa \u{2018}Safe Haven\u{2019} Adalah Kunci Saat Genderang Perang Ditabuh",
                'date' => 'March 2, 2026',
                'excerpt' => "Pasar tidak menyukai ketidakpastian, apalagi bau mesiu. Dengan eskalasi mendadak antara Israel dan Iran di awal Maret 2026 ini, portofolio agresif mulai menunjukkan \u{2018}warna merahnya\u{2019}. Namun, bagi saya, ini bukan saatnya panik, melainkan saatnya mengaktifkan protokol mitigasi…",
                'category' => 'blog',
            ],
            'al-kaukaba-ikhtiar-mendekatkan-langit-ke-dalam-genggaman' => [
                'view' => 'posts.al-kaukaba',
                'title' => 'Al-Kaukaba: Ikhtiar Mendekatkan Langit ke Dalam Genggaman',
                'date' => 'February 18, 2026',
                'excerpt' => 'Ada sebuah pepatah bijak yang mengatakan bahwa perjalanan ribuan mil selalu dimulai dengan satu langkah kecil. Langkah itu kami beri nama aplikasi mobile android Al-Kaukaba, layaknya arti dari Al-Kaukaba sendiri yang maknanya berasal dari keagungan benda-benda langit yang sejak berabad-abad silam…',
                'category' => 'blog',
            ],
            'firsst-post' => [
                'view' => 'posts.firsst-post',
                'title' => 'Precision in Management, Strategy in Markets: A Day in My Life',
                'date' => 'February 17, 2026',
                'excerpt' => 'Introduction. Welcome to my first blog post! As a Project Manager in a Japanese IT software development company, my world is often defined by two things: precision and adaptation. Whether I am navigating the complexities of a software build or observing the shifts in the global market…',
                'category' => 'blog',
            ],
            'btcusd-the-power-of-patience-executing-the-masterplan-setting-the-h4-demand-trap' => [
                'view' => 'posts.btcusd-power-of-patience',
                'title' => '[BTCUSD] – The Power of Patience: Executing the Masterplan & Setting the H4 Demand Trap',
                'date' => 'March 27, 2026',
                'excerpt' => 'Trading plan kemarin akhirnya tereksekusi dengan sangat presisi. Sabar menunggu adalah kuncinya. Harga akhirnya menjemput target Take Profit (TP) di level 69.400…',
                'category' => 'btcusd',
            ],
            'btcusd-the-critical-lesson-when-ego-overrides-the-plan' => [
                'view' => 'posts.btcusd-critical-lesson',
                'title' => '[BTCUSD] – The Critical Lesson: When Ego Overrides the Plan',
                'date' => 'March 25, 2026',
                'excerpt' => 'Menoleh kembali pada rencana sebelumnya, target optimis saya adalah level $74.000 pasca rilis berita The Fed…',
                'category' => 'btcusd',
            ],
            'btcusd-rabu-18-maret-2026' => [
                'view' => 'posts.btcusd-rabu-18-maret',
                'title' => '[BTCUSD] – [Rabu, 18 Maret 2026]',
                'date' => 'March 17, 2026',
                'excerpt' => "Sebelum kita terjun ke dalam kegilaan hari ini, mari kita menengok sejenak hasil dari rencana \u{2018}perang\u{2019} kita pada jurnal Senin, 16 Maret 2026…",
                'category' => 'btcusd',
            ],
            'btcusd-daily-trading-jurnal-16-maret-2026' => [
                'view' => 'posts.btcusd-senin-16-maret',
                'title' => '[BTCUSD] – [Senin, 16 Maret 2026]',
                'date' => 'March 16, 2026',
                'excerpt' => 'Trading bukan soal menebak masa depan, tapi soal mengelola probabilitas dengan cermat…',
                'category' => 'btcusd',
            ],
        ];
    }

    /**
     * @return array{view: string, title: string, date: string, excerpt: string, category: string}|null
     */
    public static function find(string $slug): ?array
    {
        return static::all()[$slug] ?? null;
    }

    /**
     * @return array<string, array{view: string, title: string, date: string, excerpt: string, category: string}>
     */
    public static function byCategory(string $category): array
    {
        return array_filter(
            static::all(),
            fn (array $post) => $post['category'] === $category
        );
    }
}
