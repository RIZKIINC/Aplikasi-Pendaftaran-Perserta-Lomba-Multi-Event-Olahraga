<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berita::create([
            'title' => 'ANTAR ATLET JUARA PON RAIH PIALA EMAS',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore voluptatum, vero, dolorum aliquid inventore reiciendis quas quaerat, cumque aliquam doloribus obcaecati. Porro magni consectetur accusantium ad dolores ea eum dolore?',
            'image' => null,
        ]);
    }
}
