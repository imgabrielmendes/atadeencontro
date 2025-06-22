<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearAta extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ata_has_user')->truncate();
        DB::table('ata_has_text')->truncate();
        DB::table('ata_has_userparticipante')->truncate();
        DB::table('ata')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
