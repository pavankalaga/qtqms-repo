<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactDetail;

class ContactDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ContactDetail::create([
        'salutation' => 'salutation',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'department' => 'department',
        'designation' => 'designation',
        'office_phone' => 'office_phone',
        'mobile_no' => 'mobile_no',
        'office_email' => 'office_email',
        'other_email' => 'other_email',
       ]);
    }
}
