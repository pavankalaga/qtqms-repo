<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sample_volume_check_items', function (Blueprint $table) {
            $table->string('month', 3)->after('actual_qty'); // jul, aug, sep
        });
    }

    public function down(): void
    {
        Schema::table('sample_volume_check_items', function (Blueprint $table) {
            $table->dropColumn('month');
        });
    }
};
