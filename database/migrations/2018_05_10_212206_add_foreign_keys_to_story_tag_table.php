<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoryTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story_tag', function(Blueprint $table)
		{
			$table->foreign('story_id', 'FK_story_tag_stories')->references('id')->on('stories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tag_id', 'FK_story_tag_tags')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story_tag', function(Blueprint $table)
		{
			$table->dropForeign('FK_story_tag_stories');
			$table->dropForeign('FK_story_tag_tags');
		});
	}

}
