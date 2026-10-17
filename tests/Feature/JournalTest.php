<?php

namespace Tests\Feature;

use App\Support\Posts;
use App\Support\Rooms;
use Tests\TestCase;

class JournalTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_setiap_post_punya_ruang_yang_valid_dan_tanggal_yang_terbaca(): void
    {
        foreach (Posts::all() as $slug => $post) {
            $this->assertNotNull(Rooms::find($post['room']), "Ruang '{$post['room']}' pada post {$slug} tidak ada di Rooms::all()");
            $this->assertNotEmpty(Posts::dateLabel($post), "Tanggal post {$slug} tidak terbaca");

            if (isset($post['series'])) {
                $this->assertArrayHasKey($post['series'], Posts::SERIES);
            }
        }
    }

    public function test_journal_menampilkan_semua_post_terbaru_dulu(): void
    {
        $response = $this->get('/journal')->assertOk();
        $html = $response->getContent();

        $positions = [];
        foreach (Posts::sorted() as $slug => $post) {
            $response->assertSee(e($post['title']), false);
            $positions[] = strpos($html, 'href="'.url('/'.$slug).'"');
        }

        $sorted = $positions;
        sort($sorted);
        $this->assertSame($sorted, $positions, 'Post tidak berurutan dari yang terbaru');
    }

    public function test_journal_hanya_menampilkan_chip_untuk_ruang_yang_punya_post(): void
    {
        $html = $this->get('/journal')->assertOk()->getContent();

        foreach (array_keys(Posts::roomCounts()) as $slug) {
            $this->assertStringContainsString('/journal?ruang='.$slug, $html);
        }
        $this->assertStringNotContainsString('/journal?ruang=hati', $html);
    }

    public function test_filter_ruang_menyaring_post_dan_menampilkan_kepala_ruang(): void
    {
        $response = $this->get('/journal?ruang=taktik')->assertOk();

        $response->assertSee('Ruang Taktik');
        $response->assertSee('Pasar tidak peduli perasaan saya');
        $response->assertSee('The Disciplined Ledger');

        foreach (Posts::all() as $post) {
            if ($post['room'] === 'taktik') {
                $response->assertSee(e($post['title']), false);
            } else {
                $response->assertDontSee(e($post['title']), false);
            }
        }
    }

    public function test_ruang_yang_valid_tapi_kosong_tetap_tampil(): void
    {
        $this->get('/journal?ruang=hati')
            ->assertOk()
            ->assertSee('Ruang Hati')
            ->assertSee('Belum ada tulisan di ruang ini.');
    }

    public function test_ruang_yang_tidak_dikenal_menghasilkan_404(): void
    {
        $this->get('/journal?ruang=ngawur')->assertNotFound();
        $this->get('/journal?ruang[]=taktik')->assertNotFound();
    }

    public function test_url_kategori_lama_dialihkan_ke_ruang_taktik(): void
    {
        foreach (['/category/daily-jurnal-trading', '/category/daily-jurnal-trading/btcusd'] as $old) {
            $this->get($old)->assertStatus(301)->assertRedirect('/journal?ruang=taktik');
        }
    }

    public function test_setiap_post_terbuka_dengan_ruang_dan_tanggal(): void
    {
        foreach (Posts::all() as $slug => $post) {
            $room = Rooms::find($post['room']);

            $this->get('/'.$slug)
                ->assertOk()
                ->assertSee(e($post['title']), false)
                ->assertSee($room['name'])
                ->assertSee(Posts::dateLabel($post));
        }
    }

    public function test_post_menaut_ke_tulisan_lebih_lama_dan_lebih_baru_di_ruang_yang_sama(): void
    {
        $this->get('/btcusd-rabu-18-maret-2026')
            ->assertOk()
            ->assertSee('/btcusd-daily-trading-jurnal-16-maret-2026', false)
            ->assertSee('/btcusd-the-critical-lesson-when-ego-overrides-the-plan', false);

        // Post tunggal di ruangnya tidak punya navigasi lama/baru.
        $this->get('/emas-dolar-dan-rdpu-mengapa-safe-haven-adalah-kunci-saat-genderang-perang-ditabuh')
            ->assertOk()
            ->assertDontSee('Lebih lama')
            ->assertDontSee('Lebih baru');
    }

    public function test_halaman_profil_memakai_layout_baru_dan_terbuka(): void
    {
        $paths = [
            '/about-me', '/im-project-manager', '/my-management-playbook', '/it-enthusiast',
            '/market-observer', '/haji-2026', '/privacy-policy-al-kaukaba',
        ];

        foreach ($paths as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('Menu utama')
                ->assertSee('href="'.url('/im-project-manager').'"', false);
        }
    }

    public function test_halaman_yang_dihapus_menghasilkan_404(): void
    {
        foreach (['/culture-leadership', '/the-bridge', '/anonymized-case-studies'] as $path) {
            $this->get($path)->assertNotFound();
        }
    }

    public function test_kartu_ruang_di_beranda_menaut_ke_journal(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('4 tulisan di Journal', false)
            ->assertSee('/journal?ruang=taktik', false)
            ->assertSee('Belum ada tulisan');
    }
}
