<?php

namespace Database\Seeders;

use App\Models\FakeNidRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeNidRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FakeNidRecord::truncate();
        FakeNidRecord::factory()->count(50)->create();
    }
}
