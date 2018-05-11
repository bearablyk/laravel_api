<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stories', function(Blueprint $table)
		{
			$table->foreign('story_catogory_id', 'FK_stories_story_catogories')->references('id')->on('story_catogories')->onUpdate('SET NULL')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stories', function(Blueprint $table)
		{
			$table->dropForeign('FK_stories_story_catogories');
		});
	}

}
