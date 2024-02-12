<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::table('photos', function (Blueprint $table) {
            $table->index('album_id');
            $table->index('user_id');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::table('comments', function (Blueprint $table) {
            $table->index('foto_id');
            $table->index('user_id');
            $table->foreign('foto_id')->references('id')->on('photos');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::table('likes', function (Blueprint $table) {
            $table->index('foto_id');
            $table->index('user_id');
            $table->foreign('foto_id')->references('id')->on('photos');
            $table->foreign('user_id')->references('id')->on('users');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->dropForeign('albums_user_id_foreign');
            $table->dropIndex('albums_user_id_index');
            $table->dropColumn('user_id');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('photos_user_id_foreign');
            $table->dropForeign('photos_album_id_foreign');
            $table->dropIndex('photos_user_id_index');
            $table->dropIndex('photos_album_id_index');
            $table->dropColumn('album_id');
            $table->dropColumn('user_id');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_foto_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
            $table->dropIndex('comments_foto_id_index');
            $table->dropIndex('comments_user_id_index');
            $table->dropColumn('foto_id');
            $table->dropColumn('user_id');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign('likes_foto_id_foreign');
            $table->dropForeign('likes_user_id_foreign');
            $table->dropIndex('likes_foto_id_index');
            $table->dropIndex('likes_user_id_index');
            $table->dropColumn('foto_id');
            $table->dropColumn('user_id');
        });
    }
};
