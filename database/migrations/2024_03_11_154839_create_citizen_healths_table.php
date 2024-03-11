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
        Schema::create('citizen_healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained();
            $table->date('date');
            $table->string('blood_type');
            $table->boolean('is_smoker');
            $table->string('has_allergies');
            $table->string('has_chronic_conditions');
            $table->text('notes')->nullable();
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->integer('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_healths');
    }
};
