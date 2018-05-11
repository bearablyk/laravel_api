<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoryMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story_messages', function(Blueprint $table)
		{
			$table->foreign('story_id', 'FK_story_messages_stories')->references('id')->on('stories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('story_character_id', 'FK_story_messages_story_characters')->references('id')->on('story_characters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story_messages', function(Blueprint $table)
		{
			$table->dropForeign('FK_story_messages_stories');
			$table->dropForeign('FK_story_messages_story_characters');
		});
	}

}
