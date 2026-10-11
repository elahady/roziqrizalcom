<?php

namespace App\Support;

/**
 * Single source of truth for portfolio ("Karya") metadata.
 *
 * Adding a project: add one entry here (and its screenshots under
 * public/images/karya/). The homepage "Karya" section renders every entry
 * through partials/project-card. A project only gets its own page at
 * /karya/{slug} when it has a 'view' key (a Blade view under
 * resources/views/karya/); entries without one render as a card only.
 */
class Projects
{
    /**
     * @return array<string, array{
     *     name: string,
     *     tagline: string,
     *     summary: string,
     *     status: string,
     *     status_label: string,
     *     rooms: string,
     *     tech: list<string>,
     *     screens: list<array{file: string, alt: string, caption?: string}>,
     *     web_screens?: list<array{file: string, alt: string, caption?: string}>,
     *     view?: string,
     * }>
     */
    public static function all(): array
    {
        return [
            'habitflow' => [
                'view' => 'karya.habitflow',
                'name' => 'Habitflow',
                'tagline' => 'Asisten harian pribadi: habit, jadwal, dan kerja dalam satu sistem.',
                'summary' => 'Dari centang habit sampai alarm Subuh, follow-up kerja, dan to-do bersama pasangan. Android dulu, kini juga di web.',
                'status' => 'dev',
                'status_label' => 'Dalam pengembangan',
                'rooms' => 'Lintas ruang',
                'tech' => ['Kotlin', 'Jetpack Compose', 'Laravel', 'Livewire', 'MySQL', 'Docker'],
                'screens' => [
                    ['file' => 'habitflow-android-hari-ini.jpg', 'alt' => 'Layar Hari ini di Habitflow Android: jadwal Sekarang dan Berikutnya, berat, tensi, dan progres habit', 'caption' => 'Hari ini'],
                    ['file' => 'habitflow-android-kerja.jpg', 'alt' => 'Layar Kerja di Habitflow Android: daftar follow-up per status', 'caption' => 'Kerja'],
                    ['file' => 'habitflow-android-progres.jpg', 'alt' => 'Layar Progres di Habitflow Android: streak dan heatmap kontribusi habit', 'caption' => 'Progres'],
                ],
                // Tangkapan layar versi web. Kosong = barisnya tidak ditampilkan.
                // Isi dengan ['file' => ..., 'alt' => ..., 'caption' => ...] setelah gambarnya ada di public/images/karya/.
                'web_screens' => [
                    ['file' => 'habitflow-web-habit.jpg', 'alt' => 'Halaman Habit di Habitflow web: habit dan to-do hari ini', 'caption' => 'Habit hari ini'],
                    ['file' => 'habitflow-web-follow-up.jpg', 'alt' => 'Halaman Follow-up Kerja di Habitflow web: Inbox dan Aktif', 'caption' => 'Follow-up kerja'],
                ],
            ],
            'al-kaukaba' => [
                'name' => 'Al-Kaukaba',
                'tagline' => 'Semua kebutuhan falak dalam satu genggaman.',
                'summary' => 'Jadwal sholat, arah kiblat, awal bulan Hijriyah, fase Bulan, dan gerhana dalam satu aplikasi Android.',
                'status' => 'live',
                'status_label' => 'Live di Play Store',
                'rooms' => 'Ruang Angkasa',
                'tech' => ['Kotlin', 'Android', 'Ilmu falak'],
                'screens' => [
                    ['file' => 'alkaukaba-beranda.jpg', 'alt' => 'Beranda Al-Kaukaba: waktu sholat berikutnya dan fase Bulan'],
                    ['file' => 'alkaukaba-kiblat.jpg', 'alt' => 'Fitur arah kiblat di Al-Kaukaba'],
                    ['file' => 'alkaukaba-waktu-sholat.jpg', 'alt' => 'Fitur jadwal waktu sholat di Al-Kaukaba'],
                    ['file' => 'alkaukaba-awal-bulan.jpg', 'alt' => 'Fitur awal bulan Hijriyah di Al-Kaukaba'],
                    ['file' => 'alkaukaba-peta.jpg', 'alt' => 'Fitur peta di Al-Kaukaba'],
                    ['file' => 'alkaukaba-gerhana.jpg', 'alt' => 'Fitur gerhana di Al-Kaukaba'],
                ],
            ],
        ];
    }

    /**
     * Projects that have their own page at /karya/{slug}.
     *
     * @return array<string, array>
     */
    public static function withPage(): array
    {
        return array_filter(self::all(), fn (array $project) => isset($project['view']));
    }
}
