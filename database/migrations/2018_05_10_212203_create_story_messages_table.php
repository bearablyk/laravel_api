<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoryMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('story_messages', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('story_id')->unsigned()->index('FK_story_characters_stories');
			$table->bigInteger('story_character_id')->unsigned()->index('FK_story_messages_story_characters');
			$table->text('text', 65535)->nullable();
			$table->string('thumbnail_photo_url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('story_messages');
	}

}
