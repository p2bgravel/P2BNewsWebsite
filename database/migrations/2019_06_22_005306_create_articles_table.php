<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 190);
            $table->longText('content');
            $table->enum('state', ['draft', 'published', 'deleted']);
            $table->string('slug', 190)->nullable();
            $table->string('tags', 190)->nullable();
            $table->text('image_url')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->mediumText('html_meta')->nullable();
            $table->dateTime('published_at')->nullable();
            //ref
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
