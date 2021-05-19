<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');

            $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            
            //Estado 1 borrador o 2 publicado
            $table->enum('status', [1, 2])->default(1);
            //Llaves foraneas
            //Se relaciona con los campos para obtener id y la categoria relacionada al posts
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');

            //Restriccion de llave foranea, y si se da de baja se eliminan todos los posts asociados
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
