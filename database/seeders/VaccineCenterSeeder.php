<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        VaccineCenter::truncate();
        VaccineCenter::factory()->count(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
