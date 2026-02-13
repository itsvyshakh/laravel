<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_models', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_month'); // e.g. 2026-03
            $table->string('legal_entity_code');
            $table->string('currency')->default('INR');
            $table->string('batch_id')->nullable();
            $table->date('posting_date')->nullable();
            $table->enum('status', ['draft', 'finalized', 'posted'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_models');
    }
};
