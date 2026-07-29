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

            $table->char('status', 1)
                  ->default('A');

            $table->string('name', 255);

            $table->string('slug', 255)
                  ->nullable();

            $table->integer('cat_id')
                  ->nullable();

            $table->text('short_description')
                  ->nullable();

            $table->longText('overview_description')
                  ->nullable();

            $table->longText('specification_description');

            $table->enum('stock_status', [
                'available',
                'unavailable'
            ])->default('available');

            $table->string('parent_cat', 250);

            $table->string('featured', 250);

            $table->decimal('price', 10, 2);

            $table->string('img1', 255)
                  ->nullable();

            $table->string('img2', 250);

            $table->string('img3', 250);

            $table->string('img4', 250);

            $table->string('blog_ids', 50);

            $table->timestamp('created_at')
                  ->useCurrent();

            $table->timestamp('updated_at')
                  ->useCurrent()
                  ->useCurrentOnUpdate();
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
