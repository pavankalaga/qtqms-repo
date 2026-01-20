<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bio_rad_d10_maintenance_forms', function (Blueprint $table) {
            $table->string('d10_year', 4)->nullable()->after('d10_month_year');
            $table->string('d10_monthly_instrument_serial', 150)->nullable()
                  ->after('d10_instrument_serial');
        });
    }

    public function down(): void
    {
        Schema::table('bio_rad_d10_maintenance_forms', function (Blueprint $table) {
            $table->dropColumn([
                'd10_year',
                'd10_monthly_instrument_serial'
            ]);
        });
    }
};
