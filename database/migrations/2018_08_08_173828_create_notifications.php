<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table categories[0,*] <-> users[0,*]
        Schema::create('categories_subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['category_id', 'user_id']);
        });

        // Pivot table threads[0,*] <-> users[0,*]
        Schema::create('threads_subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['thread_id', 'user_id']);
        });

        // Pivot table blogs[0,*] <-> users[0,*]
        Schema::create('blogs_subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['blog_id', 'user_id']);
        });

        // Threads notifications
        Schema::create('threads_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->enum('type', ['NEW', 'LIKE', 'COMMENT', 'APPROVAL', 'REJECT',
                                  'LOCK', 'PIN', 'DELETION', 'MENTION']);
        });

        // Comments notifications
        Schema::create('comments_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('comment_id');
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->enum('type', ['LIKE', 'RESPONSE', 'PIN', 'DELETION', 'MENTION']);
        });

        // Blog contributors notifications
        Schema::create('blogs_contributors_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('other_user_id');
            $table->foreign('other_user_id')->references('id')->on('users');
            $table->enum('type', ['APPROVAL', 'REJECT', 'CONTRIBUTOR', 'NOT_CONTRIBUTOR',
                                  'NEW_COLLEAGUE', 'BYE_COLLEAGUE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_subscriptions');
        Schema::dropIfExists('threads_subscriptions');
        Schema::dropIfExists('blogs_subscriptions');
        Schema::dropIfExists('threads_notifications');
        Schema::dropIfExists('comments_notifications');
        Schema::dropIfExists('blogs_contributors_notifications');
    }
}
