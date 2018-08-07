<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table users[0,*] <-> threads[0,*]
        Schema::create('threads_likes', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['thread_id', 'user_id']);
        });

        // Pivot table users[0,*] <-> comments[0,*]
        Schema::create('comments_likes', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedInteger('comment_id');
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['comment_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads_likes');
        Schema::dropIfExists('comments_likes');
    }
}
