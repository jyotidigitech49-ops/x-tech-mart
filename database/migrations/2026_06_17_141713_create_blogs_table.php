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
       Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->char('status', 1)->default('A');

            $table->string('heading', 250);
            $table->string('slug', 250)->unique();

            $table->longText('content');

            $table->string('image1', 250)->nullable();
            $table->string('image2', 250)->nullable();
            $table->string('image3', 250)->nullable();

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
        Schema::dropIfExists('blogs');
    }
};
