<?php

namespace Database\Seeders;

use App\Models\Salesheadquarter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesheadquarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salesheadquarter::created(['name' => 'Hyderabad']);
    }
}
