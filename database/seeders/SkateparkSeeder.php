<?php

namespace Database\Seeders;

use App\Models\SkatePark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkateparkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkatePark::factory(200)->create();
    }
}
