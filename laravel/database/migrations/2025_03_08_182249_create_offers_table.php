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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->decimal('offer_price', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('offers_product_id_foreign');
        });
        Schema::dropIfExists('offers');
    }
};
