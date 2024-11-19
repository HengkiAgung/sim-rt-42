<?php

use App\Constants;
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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('hallway_id')->nullable()->constrained()->onDelete('set null');
            $table->bigInteger('nik')->unique();
            $table->string('name');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->enum('gender', Constants::GENDER);
            $table->enum("blood_type", Constants::BLOOD_TYPE)->nullable();
            $table->string('address_domisili')->nullable();
            $table->string('address_ktp')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->enum('religion', Constants::RELIGION)->nullable();
            $table->enum('marital_status', Constants::MARITAL_STATUS)->nullable();
            $table->string('work')->nullable();
            $table->string('nationality')->nullable();
            $table->string('pic_file')->nullable();
            $table->enum('citizen_status', Constants::CITIZEN_STATUS);

            $table->string('tenant_name')->nullable();
            $table->string('tenant_phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
