<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('new_supplier_verification_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();

            // Basic fields
            $table->string('supplier_name')->nullable();
            $table->string('location')->nullable();
            $table->string('verification_date')->nullable();
            $table->string('inspector_name')->nullable();

            // 5 sections × 3 questions = 15 radio fields (yes/no/na)
            for ($s = 1; $s <= 5; $s++) {
                for ($q = 1; $q <= 3; $q++) {
                    $table->string("sec{$s}_q{$q}", 10)->nullable();
                }
                $table->text("sec{$s}_notes")->nullable();
            }

            // Additional notes
            $table->text('additional_notes')->nullable();

            // Inspector signature
            $table->string('inspector_signature_name')->nullable();
            $table->string('inspector_signature')->nullable();
            $table->string('inspector_signature_date')->nullable();

            // Approval
            $table->string('risk_level', 20)->nullable();
            $table->string('approval_status', 20)->nullable();

            // Approved by
            $table->string('approved_by_name')->nullable();
            $table->string('approved_by_signature')->nullable();
            $table->string('approved_by_date')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('supplier_name', 'nsv_supplier_name_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('new_supplier_verification_forms');
    }
};
