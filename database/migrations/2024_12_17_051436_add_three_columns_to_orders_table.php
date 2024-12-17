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
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('value_1')->nullable()->after('status');
            $table->integer('value_2')->nullable()->after('value_1');
            $table->enum('dificulty_level', ['easy', 'medium', 'hard'])->nullable()->after('value_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['attribute_1', 'attribute_2', 'dificulty_level']);
        });
    }
};