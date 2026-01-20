<?php

namespace Database\Seeders;

use App\Models\CallLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallLog::create([
            'check_in' => '2024-10-19',
            'check_out' => '2024-10-19',
            'fallow_up_date' => '2024-10-19',
            'call_log_remarks' => 'test',
        ]);
    }
}
