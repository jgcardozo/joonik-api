<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   /*      $data = [
            ['Cali', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Barranquilla', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Bogota', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Medellin', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Cartagena', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Bucaramanga', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
            ['Pereira', 'https://source.unsplash.com/640x480/?nature', 'created_at' => now()],
        ]; */
        //Location::insert($data);
        Location::factory(10)->create();
    }
}
