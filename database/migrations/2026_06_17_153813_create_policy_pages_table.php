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
         Schema::create('policy_pages', function (Blueprint $table) {
            $table->id();

            $table->char('status', 1)
                  ->default('A');

            $table->dateTime('inserted_at')
                  ->useCurrent();

            $table->string('heading', 250);

            $table->string('slug', 250);

            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_pages');
    }
};
