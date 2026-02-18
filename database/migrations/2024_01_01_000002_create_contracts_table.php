<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // Ownership
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Core fields
            $table->string('title');
            $table->string('counterparty')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();

            // Status: draft | pending | active | expiring | expired
            $table->string('status')->default('draft');

            // Financials
            $table->decimal('value', 15, 2)->nullable();
            $table->string('currency', 3)->default('USD');

            // Dates
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('reminder_days')->default(30);

            // Document
            $table->string('file_path')->nullable();

            $table->timestamps();

            // Indexes for common queries
            $table->index(['user_id', 'status']);
            $table->index(['user_id', 'end_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
