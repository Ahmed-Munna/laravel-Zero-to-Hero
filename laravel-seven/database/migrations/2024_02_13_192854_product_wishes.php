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
        Schema::create('product_wishes', function (Blueprint $table) {

            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('email')
                  ->references('email')
                  ->on('profiles')
                  ->cascadeOnUpdate();

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_wishes');
    }
};
