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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->string('slug')->unique();

            $table->foreignId('category_id')->constrained();
            $table->foreignId('size_id')->constrained();

            $table->integer('expiration_date');
            $table->string('product_value');
            $table->mediumText('description');
            $table->mediumText('ingredients');
            $table->integer('weight')->unsigned();
            $table->string('photo');
            $table->integer('price')->unsigned();
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
