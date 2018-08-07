<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Poll entries, which store the available answers to the threads' polls
        Schema::create('polls_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->string('text');
        });

        // Pivot table users[0,*] <-> polls_entries[0,*]
        Schema::create('polls_answers', function (Blueprint $table) {
            $table->unsignedInteger('entry_id');
            $table->foreign('entry_id')->references('id')->on('polls_entries');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['entry_id', 'user_id']);
        });

        // Add new columns to the threads
        Schema::table('threads', function (Blueprint $table) {
            $table->string('poll_question')->nullable();
            $table->boolean('is_poll_multiple_choice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls_entries');
        Schema::dropIfExists('polls_answers');
        Schema::table('threads', function (Blueprint $table) {
            $table->dropColumn('poll_question');
            $table->dropColumn('is_poll_multiple_choice');
        });
    }
}
