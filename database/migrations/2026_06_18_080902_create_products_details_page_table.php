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
        Schema::create('products_details_page', function (Blueprint $table) {
            $table->id();

            $table->char('status', 1)
                  ->default('A');

            $table->string('slug', 250);

            $table->string('meta_title', 250);

            $table->string('meta_description', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_details_page');
    }
};
