<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function test_index_profile()
    {
        $response = $this->get('/profile');

        $response->assertStatus(302);
    }

    public function test_update_profile()
    {
        $response = $this->put('/profile/update', [
            'name' => 'bunga',
            'email' => 'bungaelf@gmail.com',
            'username' => 'bungaa',
            'password' => "$2y$10$8yW1rJ4EMiC/fHsthSdmfuKSshKcYl96ukrpd62ivX9B2QkXEXNVa",
            'phone_number' => "83111693588",
            'address' => "jember",
            'role' => 1,
            'is_active' => true,
        ]);
        $response->assertStatus(302);
    }

    public function test_index_vannamei()
    {
        $response = $this->get('/litopenaeus-vannamei');

        $response->assertStatus(302);
    }

    public function test_edit_vannamei()
    {
        $response = $this->get('/litopenaeus-vannamei/edit/{_id}');

        $response->assertStatus(302);
    }

    public function test_update_vannamei()
    {
        $response = $this->put('/litopenaeus-vannamei/update/{_id}', [
            'title' => 'Vannamei',
            'subtitle' => 'Udang Putih',
            'description' => 'Udang vaname merupakan udang paling populer di Indonesia',
            'vannamei_image' => 'storage/image/2022-12-17125803.jpg'
        ]);
        $response->assertStatus(302);
    }

    public function test_index_fuzzy()
    {
        $response = $this->get('/fuzzy');

        $response->assertStatus(302);
    }

    public function test_index_rules_fuzzy()
    {
        $response = $this->get('/fuzzy-rules');

        $response->assertStatus(302);
    }

    public function test_add_rules_fuzzy()
    {
        $response = $this->get('/fuzzy-rules/add');

        $response->assertStatus(302);
    }

    public function test_store_rules_fuzzy()
    {
        $response = $this->post('/fuzzy-rules/store', [
            'ph' => "baik",
            'temp' => "baik",
            'salinity' => "baik",
            'do' => "baik",
            'grade' => "A"
        ]);
        $response->assertStatus(302);
    }

    public function test_edit_rules_fuzzy()
    {
        $response = $this->get('/fuzzy-rules/edit/{_id}');

        $response->assertStatus(302);
    }

    public function test_update_rules_fuzzy()
    {
        $response = $this->put('/fuzzy-rules/{_id}', [
            'ph' => "sedang",
            'temp' => "baik",
            'salinity' => "baik",
            'do' => "baik",
            'grade' => "A"
        ]);
        $response->assertStatus(302);
    }

    public function test_delete_rules_fuzzy()
    {
        $response = $this->delete('/fuzzy-rules/delete/{_id}');

        $response->assertStatus(302);
    }

    public function test_index_prosess()
    {
        $response = $this->get('/proses');

        $response->assertStatus(302);
    }

    public function test_add_prosess()
    {
        $response = $this->get('/proses/add');

        $response->assertStatus(302);
    }

    public function test_store_prosess()
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

    //detail proses
    public function test_detail_prosess()
    {
        $response = $this->get('/proses/detail/{_id}');

        $response->assertStatus(302);
    }

    //delete proses
    public function test_delete_prosess()
    {
        $response = $this->delete('/proses/{_id}');

        $response->assertStatus(302);
    }

    public function test_index_perhitungan()
    {
        $response = $this->get('/perhitungan');

        $response->assertStatus(302);
    }

    //post create perhitungan
    public function test_create_perhitungan()
    {
        $response = $this->post('/perhitungan/create', [
            'title' => 'Test',
            'location' => 'Tambak Pazi Udang Jaya',
            'name' => 'Kolam 1',
            'status' => "1",
        ]);
        $response->assertStatus(302);
    }

    public function test_store_perhitungan()
    {
        $response = $this->post('/perhitungan/store', [
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

    public function test_detail_perhitungan()
    {
        $response = $this->get('/perhitungan/detail/{_id}');

        $response->assertStatus(302);
    }

    public function test_history()
    {
        $response = $this->get('/history');

        $response->assertStatus(302);
    }

    public function test_get_data_sensor()
    {
        $response = $this->get('/get-data-sensor');

        $response->assertStatus(302);
    }

    //get data sensor all
    public function test_all_data_sensor()
    {
        $response = $this->get('/get-data-sensor-all');

        $response->assertStatus(302);
    }

    //one last data sensor
    public function test_last_data_sensor()
    {
        $response = $this->get('/get-one-last-data-sensor');

        $response->assertStatus(302);
    }
}
