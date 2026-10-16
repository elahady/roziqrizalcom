<?php

namespace Tests\Feature;

use App\Support\Projects;
use Tests\TestCase;

class KaryaImageVersionTest extends TestCase
{
    public function test_url_gambar_membawa_hash_isi_berkas(): void
    {
        $file = 'habitflow-web-habit.jpg';
        $hash = substr(md5_file(public_path('images/karya/'.$file)), 0, 8);

        $this->assertStringEndsWith('/images/karya/'.$file.'?v='.$hash, Projects::imageUrl($file));
    }

    public function test_berkas_yang_tidak_ada_tetap_menghasilkan_url_tanpa_penanda(): void
    {
        $url = Projects::imageUrl('tidak-ada.jpg');

        $this->assertStringEndsWith('/images/karya/tidak-ada.jpg', $url);
        $this->assertStringNotContainsString('?v=', $url);
    }

    public function test_halaman_karya_dan_beranda_memakai_penanda_versi_di_semua_gambar(): void
    {
        foreach (['/karya/habitflow', '/'] as $uri) {
            $html = $this->get($uri)->assertOk()->getContent();

            preg_match_all('#<img[^>]+src="([^"]*images/karya/[^"]+)"#', $html, $m);

            $this->assertNotEmpty($m[1], "Tidak ada gambar karya di $uri");
            foreach ($m[1] as $src) {
                $this->assertMatchesRegularExpression('#\?v=[0-9a-f]{8}$#', $src, "Gambar tanpa ?v= di $uri: $src");
            }
        }
    }
}
