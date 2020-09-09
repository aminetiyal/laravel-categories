<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('categories.table', 'categories'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->integer('order_column')->nullable();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->string('categorizable_type')->default(0);
            $table->unsignedBigInteger('categorizable_id')->default(0);

            $table->index(['categorizable_type', 'categorizable_id']);

            $table->timestamps();
        $table->unique(['name', 'category_id','categorizable_type', 'categorizable_id'], 'unique_category_with_parent_and_categorizable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('categories.table', 'categories'));
    }
}
