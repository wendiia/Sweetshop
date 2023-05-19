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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();

//            $table->integer('quantity')->unsigned();
//            $table->integer('price')->unsigned();
//            $table->integer('amount')->unsigned();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
