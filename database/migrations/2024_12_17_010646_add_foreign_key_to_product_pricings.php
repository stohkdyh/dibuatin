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
        Schema::table('product_pricings', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_name')->change();
            $table->foreign('attribute_name')->references('id')->on('produk_atributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_pricings', function (Blueprint $table) {
            $table->dropForeign(['attribute_name']);
        });
    }
};