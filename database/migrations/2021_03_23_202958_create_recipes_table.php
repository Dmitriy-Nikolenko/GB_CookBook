<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table
                ->string('name')
                ->comment('Название рецепта');
            $table
                ->string('image')
                ->comment('Адрес изображения');
            $table
                ->string('slug')
                ->comment('Уникальная ссылка на рецепт');
            $table
                ->text('description')
                ->comment('Описание рецепта');
            $table
                ->enum('level', [1, 2, 3, 4, 5])
                ->comment('Уровень сложности от 1 до 5');
            $table
                ->integer('time')
                ->nullable('false')
                ->comment('Время для приготовления');
            $table
                ->text('ingredients')
                ->comment('Список ингредиентов');
            $table
                ->integer('likes')
                ->comment('Общее количество лайков на рецепте');
            $table
                ->unsignedBigInteger('kitchen_id')
                ->comment('ID кухни');
            $table
                ->foreign('kitchen_id')
                ->references('id')
                ->on('kitchens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
