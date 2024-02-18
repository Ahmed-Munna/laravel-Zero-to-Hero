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
        Schema::create('products', function(Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->string('short_des');
            $table->string('price');
            $table->tinyInteger('discount');
            $table->string('discount_price');
            $table->string('image');
            $table->tinyInteger('strock');
            $table->float('star');
            $table->enum('remark', ['popular', 'new', 'top', 'special', 'trending', 'regular']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
