<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('csr_sample_tracking_sheets', function (Blueprint $table) {
            $table->dropIndex('csr_tracking_lookup_idx');
            $table->dropColumn('row_date');
            $table->index(['department', 'location', 'created_at'], 'csr_tracking_lookup_idx');
        });
    }

    public function down(): void
    {
        Schema::table('csr_sample_tracking_sheets', function (Blueprint $table) {
            $table->dropIndex('csr_tracking_lookup_idx');
            $table->date('row_date')->nullable()->after('location');
            $table->index(['row_date', 'department', 'location'], 'csr_tracking_lookup_idx');
        });
    }
};
