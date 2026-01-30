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
            $table->dropColumn(['department', 'location']);
        });
    }

    public function down(): void
    {
        Schema::table('csr_sample_tracking_sheets', function (Blueprint $table) {
            $table->string('department')->nullable()->after('doc_no');
            $table->string('location')->nullable()->after('department');
            $table->index(['department', 'location', 'created_at'], 'csr_tracking_lookup_idx');
        });
    }
};
