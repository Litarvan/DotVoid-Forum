<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // The available tags, each with an id, name and color
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('color_code'); // HTML color, exact format TBD
        });

        // pivot table threads[0,*] <-> tags[0,*]
        Schema::create('threads_tags', function (Blueprint $table) {
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->primary(['thread_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('threads_tags');
    }
}
