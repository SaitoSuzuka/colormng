<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('color_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('color_name');
            $table->integer('division');
            $table->string('color1');
            $table->string('color2');
            $table->string('color3')->nullable();//nullの許容を追記
            $table->string('color4')->nullable();
            $table->string('color5')->nullable();
            $table->string('color6')->nullable();
            $table->integer('image_div');
            $table->integer('hue_div');
            $table->integer("gradation");
            $table->string('memo')->nullable();
            $table->integer('delete_flg');
            $table->string('created_by');
            $table->string('updated_by');

            $table->foreign('image_div')->references('image_div')->on('images');
            $table->foreign('hue_div')->references('hue_div')->on('hues');

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
        Schema::dropIfExists('colors');
    }
}
