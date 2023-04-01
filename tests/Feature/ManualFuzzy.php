<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManualFuzzy extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_proses()
    {
        $response = $this->get('/proses');

        $response->assertStatus(200);
    }

    // index
    public function test_store_proses()
    {
        $response = $this->post('/proses/store', [
            'title' => 'Test',
            'location' => 'Tambak Pazi Udang Jaya',
            'name' => 'Kolam 1',
            'status' => "2",
            'ph' => "7.8",
            'temp' => "24",
            'salinity' => "20",
            'do' => "4.8",
        ]);
        $response->assertStatus(302);
    }
}
