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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('product_id')->constrained();
            $table->foreignId('order_id')->constrained();

            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('amount')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_products');
    }
};
