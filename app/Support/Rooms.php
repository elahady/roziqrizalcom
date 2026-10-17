<?php

namespace App\Support;

/**
 * Sembilan ruang "Denah Hidup". Slug dipakai di Posts::all() (kunci 'room') dan
 * di filter Journal (/journal?ruang=<slug>). Teks kartu di homepage tetap
 * hidup di resources/views/rooms/ — ubah keduanya kalau tagline berganti.
 */
class Rooms
{
    /**
     * @return array<string, array{slug: string, number: string, name: string, persona: string, tagline: string}>
     */
    public static function all(): array
    {
        $rooms = [
            'antara' => ['00', 'Ruang Antara', 'Bukan peran, tapi ruang di antaranya', 'Ada jeda di antara stimulus dan respons — dan di situlah saya sebenarnya tinggal.'],
            'finansial' => ['01', 'Ruang Finansial', 'I am an Investor', 'Uang bekerja, saya yang menabung waktu.'],
            'kerja' => ['02', 'Ruang Kerja', 'I am a Leader', 'Memimpin proyek, bukan sekadar menyelesaikan tugas.'],
            'takmir' => ['03', 'Ruang Takmir', 'I am a Servant', 'Bentuk kepemimpinan yang paling sunyi.'],
            'angkasa' => ['04', 'Ruang Angkasa', 'I am an Observer', 'Jarak yang cukup untuk melihat pola.'],
            'perpustakaan' => ['05', 'Ruang Perpustakaan', 'I am a Reader', 'Bahan bakar untuk semua ruang lainnya.'],
            'permainan' => ['06', 'Ruang Permainan', 'I am a Gamer', 'Tempat mengisi ulang energi.'],
            'taktik' => ['07', 'Ruang Taktik', 'I am a Trader', 'Pasar tidak peduli perasaan saya, jadi saya yang menyesuaikan.'],
            'hati' => ['08', 'Ruang Hati', 'I am a Husband', 'Prioritas, bukan sisa waktu.'],
        ];

        $result = [];
        foreach ($rooms as $slug => [$number, $name, $persona, $tagline]) {
            $result[$slug] = compact('slug', 'number', 'name', 'persona', 'tagline');
        }

        return $result;
    }

    /**
     * @return array{slug: string, number: string, name: string, persona: string, tagline: string}|null
     */
    public static function find(string $slug): ?array
    {
        return static::all()[$slug] ?? null;
    }
}
