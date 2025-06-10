<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\local;

class LocalSeeder extends Seeder
{

    public function run(): void
    {
        Local::factory()->count(10)->create();
    }
}
