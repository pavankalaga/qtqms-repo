<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sample_outsource_registers', function (Blueprint $table) {
            $table->id();

            // Filters / common
            $table->date('date')->index();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->string('equipment_id')->nullable(); // TL Code

            // Main data
            $table->string('bar_code')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('testname_code')->nullable();

            $table->text('sample_handover_sign')->nullable();     // Accession
            $table->text('sample_receiver_sign')->nullable();     // Front office

            $table->string('sample_handover_to_os')->nullable();  // OS Lab
            $table->text('os_lab_receiver_name')->nullable();
            $table->string('destination_department')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_outsource_registers');
    }
};
