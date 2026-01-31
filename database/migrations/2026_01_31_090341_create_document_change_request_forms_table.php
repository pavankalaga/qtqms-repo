<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_change_request_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();

            // Requester info
            $table->string('requester_name')->nullable();
            $table->string('department')->nullable();

            // Document details
            $table->string('document_name')->nullable();
            $table->string('document_no')->nullable();
            $table->string('page_no')->nullable();
            $table->string('clause_no')->nullable();

            // Checkbox arrays stored as JSON
            $table->json('document_types')->nullable();

            // Narratives
            $table->text('nature_of_change')->nullable();
            $table->text('reason_for_change')->nullable();

            // Approval row 1: Request status
            $table->string('request_status', 20)->nullable();
            $table->string('request_status_date')->nullable();
            $table->string('request_status_signature')->nullable();

            // Approval row 2: Approved by
            $table->string('approved_by')->nullable();
            $table->string('approved_by_date')->nullable();
            $table->string('approved_by_signature')->nullable();

            // Versions
            $table->string('current_version')->nullable();
            $table->string('new_version')->nullable();

            // Follow-up changes stored as JSON
            $table->json('followup_changes')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('requester_name', 'dcr_requester_name_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_change_request_forms');
    }
};
