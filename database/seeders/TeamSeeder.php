<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Letjen Purnomo',
            'position' => 'Ketua Umum',
            'order' => '1',
            'image' => null,
        ]);
        Team::create([
            'name' => 'Mayjen Aripudin',
            'position' => 'Wakil I Ketua Umum',
            'order' => '2',
            'image' => null,
        ]);
        Team::create([
            'name' => 'Mayjen Saripudin',
            'position' => 'Wakil II Ketua Umum',
            'order' => '3',
            'image' => null,
        ]);
        Team::create([
            'name' => 'Tursandi Firman Aripatu',
            'position' => 'Wakil III Ketua Umum',
            'order' => '4',
            'image' => null,
        ]);
    }
}
