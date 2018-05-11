<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoryCharactersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story_characters', function(Blueprint $table)
		{
			$table->foreign('story_id', 'FK_story_characters_stories')->references('id')->on('stories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story_characters', function(Blueprint $table)
		{
			$table->dropForeign('FK_story_characters_stories');
		});
	}

}
