<?php

namespace Database\Seeders;

use App\Models\BusinessInteligence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessInteligenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessInteligence::create([
            'no_of_doctors' => 'no_of_doctors',
            'specialities' => 'specialities',
            'lab_revenue' => 'lab_revenue',
            'currently_outsourceed_to' => 'currently_outsourceed_to',
            'description' => 'description',
        ]);
    }
}
