<?php

namespace Tests\Feature;

use App\Models\WaitlistSignup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WaitlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_karya_rizqflow_menampilkan_form_daftar_tunggu(): void
    {
        $this->get('/karya/rizqflow')
            ->assertOk()
            ->assertSee('Daftar jadi penguji pertama', false)
            ->assertSee(route('waitlist.store', 'rizqflow'), false);
    }

    public function test_mendaftar_email_baru_tersimpan_dan_menampilkan_terima_kasih(): void
    {
        $response = $this->from('/karya/rizqflow')
            ->post(route('waitlist.store', 'rizqflow'), ['email' => 'calon@contoh.test']);

        $response->assertRedirect('/karya/rizqflow#daftar-tunggu');
        $response->assertSessionHas('waitlist_status', 'baru');

        $this->assertDatabaseHas('waitlist_signups', [
            'project' => 'rizqflow',
            'email' => 'calon@contoh.test',
        ]);
    }

    public function test_mendaftar_email_yang_sama_tidak_menggandakan_baris(): void
    {
        WaitlistSignup::create(['project' => 'rizqflow', 'email' => 'sudah@contoh.test']);

        $response = $this->from('/karya/rizqflow')
            ->post(route('waitlist.store', 'rizqflow'), ['email' => 'sudah@contoh.test']);

        $response->assertSessionHas('waitlist_status', 'sudah-terdaftar');
        $this->assertSame(1, WaitlistSignup::where('email', 'sudah@contoh.test')->count());
    }

    public function test_email_tidak_valid_ditolak_dan_tidak_tersimpan(): void
    {
        $response = $this->from('/karya/rizqflow')
            ->post(route('waitlist.store', 'rizqflow'), ['email' => 'bukan-email']);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseMissing('waitlist_signups', ['email' => 'bukan-email']);
    }

    public function test_proyek_yang_tidak_terdaftar_di_karya_ditolak(): void
    {
        $this->post(route('waitlist.store', 'proyek-tidak-ada'), ['email' => 'calon@contoh.test'])
            ->assertNotFound();
    }
}
