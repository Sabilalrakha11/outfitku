<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SemuaHalamanBisaDiAksesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // 1. Tes Halaman Utama (Katalog Produk)
    public function test_home_bisa_diakses(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_halaman_login_bisa_diakses(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_halaman_register_bisa_diakses(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    // 4. Tes Halaman Lupa Password
    public function test_halaman_lupa_password_bisa_diakses(): void
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }
}
