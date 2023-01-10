<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tao 2 ban ghi hotel va moi ban ghi hotel co 2 ban ghi room
        Hotel::factory()
            ->count(3)
            //->hasRooms(10)
            ->create();
    }
}
