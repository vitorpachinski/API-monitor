<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->foreignId('category_id')
              ->after('id')
              ->constrained()       // referência a categories.id
              ->onDelete('cascade'); // opcional: remove produtos se categoria for deletada
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['category_id']);  // Remove a chave estrangeira
        $table->dropColumn('category_id');    // Remove a coluna 'category_id'
    });
}

};
