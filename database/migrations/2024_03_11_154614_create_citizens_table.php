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
            $table->foreignId('family_id')->nullable()->constrained();
            $table->foreignId('hallway_id')->nullable()->constrained();
            $table->bigInteger('nik')->unique();
            $table->string('name');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->enum('gender', Constants::GENDER);
            $table->enum("blood_type", Constants::BLOOD_TYPE);
            $table->string('address_domisili');
            $table->string('address_ktp');
            $table->string('rt');
            $table->string('rw');
            $table->string('sub_district');
            $table->string('district');
            $table->string('city');
            $table->enum('religion', Constants::RELIGION);
            $table->enum('marital_status', Constants::MARITAL_STATUS);
            $table->string('work');
            $table->string('nationality');
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
