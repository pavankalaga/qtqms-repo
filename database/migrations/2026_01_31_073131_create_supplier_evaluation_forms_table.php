<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier_evaluation_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();

            // Header fields
            $table->string('supplier_name')->nullable();
            $table->string('agreement_reference')->nullable();
            $table->string('contract_description')->nullable();
            $table->string('time_period')->nullable();
            $table->string('evaluator_name')->nullable();
            $table->string('evaluation_date')->nullable();

            // 5 categories: items per cat = [4, 2, 1, 1, 2]
            $itemsPerCat = [4, 2, 1, 1, 2];
            foreach ($itemsPerCat as $catIdx => $count) {
                $c = $catIdx + 1;
                for ($q = 1; $q <= $count; $q++) {
                    $table->string("cat{$c}_score_{$q}", 10)->nullable();
                    $table->string("cat{$c}_action_{$q}")->nullable();
                }
                $table->string("cat{$c}_total", 10)->nullable();
            }

            // Footer
            $table->string('final_total_score', 10)->nullable();
            $table->string('purchase_manager_signature')->nullable();
            $table->text('overall_comments')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('supplier_name', 'se_supplier_name_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_evaluation_forms');
    }
};
