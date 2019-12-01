<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsItemRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_item_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('news_item_id');
            $table->unsignedBigInteger('recipe_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->unique(['news_item_id', 'recipe_id']);
            $table
                ->foreign('news_item_id')
                ->references('id')
                ->on('news_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_item_recipe');
    }
}
