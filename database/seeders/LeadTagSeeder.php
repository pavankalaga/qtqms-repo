<?php

namespace Database\Seeders;

use App\Models\LeadTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeadTag::create([
            'lead_id' => '1', 
            'salesheadquarter_id' => '1', 
            'assign_user' => '1'
        ]);
        }
}
