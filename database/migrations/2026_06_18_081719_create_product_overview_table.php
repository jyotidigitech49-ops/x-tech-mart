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
        Schema::create('product_overview', function (Blueprint $table) {
            $table->id();

            $table->char('status', 1)
                  ->default('A');

            $table->integer('product_id');

            $table->text('headkey');

            $table->longText('value');

            $table->longText('overview');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_overview');
    }
};
