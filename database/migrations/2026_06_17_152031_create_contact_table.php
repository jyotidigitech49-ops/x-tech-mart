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
        Schema::create('contact', function (Blueprint $table) {
             $table->id();

            $table->string('name')->nullable();

            $table->string('email')->nullable();

            $table->string('subject')->nullable();

            $table->text('msg')->nullable();

            $table->string('ip_address', 100)->nullable();

            $table->dateTime('inserted_at')
                  ->nullable()
                  ->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
