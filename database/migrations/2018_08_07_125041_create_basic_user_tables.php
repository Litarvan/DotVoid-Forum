<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('css_url');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });

        // Pivot table roles[0,*] <-> permissions[0,*]
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedInteger('perm_id');
            $table->foreign('perm_id')->references('id')->on('permissions');
            $table->primary(['role_id', 'perm_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            # already there: id
            # already there: timestamps
            $table->dropColumn('name');
            $table->string('pseudo', 20)->unique();
            # already there: email
            // -- user profile --
            $table->string('avatar_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('website_url')->nullable();
            $table->text('profile_description')->nullable();
            // ------------------
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            // -- email validation --
            $table->string('validation_token')->nullable();
            $table->timestamp('validation_expires_at')->nullable();
            $table->boolean('is_validated')->nullable();
            // ----------------------
            $table->string('password', 255)->change(); // set length to 255
            # already there: remember token
            // -- user settings --
            $table->boolean('setting_subscribe_comments');
            $table->boolean('setting_subscribe_likes');
            $table->unsignedInteger('setting_theme_id');
            $table->foreign('setting_theme_id')->references('id')->on('themes');
            // -------------------
            $table->softDeletes();
        });

        Schema::create('punishments', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
            $table->increments('id');
            $table->timestamp('ends_at')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('punisher_id');
            $table->foreign('punisher_id')->references('id')->on('users');
            $table->string('reason');
            $table->enum('type', ['MUTE', 'BAN', 'WARN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
        Schema::dropIfExists('punishments');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles_permissions');

        Schema::table('users', function (Blueprint $table) {
            # untouched: id
            # untouched: timestamps
            $table->dropUnique('pseudo');
            $table->dropColumn('pseudo');
            $table->string('name');
            # untouched: email
            // -- user profile --
            $table->dropColumn('avatar_url');
            $table->dropColumn('github_url');
            $table->dropColumn('website_url');
            $table->dropColumn('profile_description');
            // ------------------
            $table->dropForeign('role_id');
            $table->dropColumn('role_id');
            // -- email validation --
            $table->dropColumn('validation_token');
            $table->dropColumn('validation_expires_at');
            $table->dropColumn('is_validated');
            // ----------------------
            $table->string('password')->change(); // unspecify length
            # untouched: remember token
            // -- user settings --
            $table->dropColumn('setting_subscribe_comments');
            $table->dropColumn('setting_subscribe_likes');
            $table->dropForeign('setting_theme_id');
            $table->dropColumn('setting_theme_id');
            // -------------------
            $table->dropSoftDeletes();
        });
    }
}
