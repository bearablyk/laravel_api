<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoryUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story_user', function(Blueprint $table)
		{
			$table->foreign('story_id', 'FK_story_user_stories')->references('id')->on('stories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_story_user_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story_user', function(Blueprint $table)
		{
			$table->dropForeign('FK_story_user_stories');
			$table->dropForeign('FK_story_user_users');
		});
	}

}
