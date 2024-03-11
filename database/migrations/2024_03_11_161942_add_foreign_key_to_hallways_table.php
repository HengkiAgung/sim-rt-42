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
        Schema::table('hallways', function (Blueprint $table) {
            $table->foreignId('chief_id')->after('name')->nullable()->references('id')->on('citizens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hallways', function (Blueprint $table) {
            $table->dropForeign(['chief_id']);
            $table->dropColumn('chief_id');
        });
    }
};
