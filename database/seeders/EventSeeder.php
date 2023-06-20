<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'title' => 'Pertemuan Anggota Pencak Silat Indonesia',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore voluptatum, vero, dolorum aliquid inventore reiciendis quas quaerat, cumque aliquam doloribus obcaecati. Porro magni consectetur accusantium ad dolores ea eum dolore?',
            'date' => Carbon::now()->addDays(3),
            'location' => 'Jalan merdeka nomor 100, Jakarta, Indonesia',
            'image' => null,
        ]);
    }
}
