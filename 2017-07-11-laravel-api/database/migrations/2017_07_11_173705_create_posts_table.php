<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('platform');
            $table->text('content');
            $table->dateTime('publish_at')->nullable();

	        $table->integer('user_id')
		        ->unsigned()
		        ->index();

	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
		        ->onDelete('cascade');

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
