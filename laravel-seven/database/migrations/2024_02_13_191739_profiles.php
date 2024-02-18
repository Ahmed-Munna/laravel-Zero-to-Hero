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
        Schema::create('profiles', function(Blueprint $table) {
            
            $table->id();
            $table->string('first_name');
            $table->string('lastName');
            $table->string('mobile');
            $table->string('city');
            $table->string('shopping_address');
            $table->string('email')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('email')
                  ->references('email')
                  ->on('users')
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
