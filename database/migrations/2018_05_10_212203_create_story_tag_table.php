<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoryTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('story_tag', function(Blueprint $table)
		{
			$table->integer('tag_id')->unsigned();
			$table->bigInteger('story_id')->unsigned()->index('FK_story_tag_stories');
			$table->primary(['tag_id','story_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('story_tag');
	}

}
