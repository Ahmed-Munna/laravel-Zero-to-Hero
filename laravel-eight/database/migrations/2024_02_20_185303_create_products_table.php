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
            $table->string('title');
            $table->string('short_des');
            $table->tinyInteger('price');
            $table->tinyInteger('discount');
            $table->string('discount_price');
            $table->string('image');
            $table->tinyInteger('stock');
            $table->double('star');
            $table->enum('remark', ['new', 'hot', 'best deal']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();

            $table->index(['id', 'price', 'discount_price', 'star', 'category_id', 'brand_id']);

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
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
