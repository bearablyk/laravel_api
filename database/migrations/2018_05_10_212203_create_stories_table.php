<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->smallInteger('story_catogory_id')->unsigned()->nullable()->index('FK_stories_story_catogories');
			$table->string('author')->nullable();
			$table->string('title', 500);
			$table->string('description', 5000)->nullable();
			$table->string('cover_photo_url')->nullable();
			$table->string('background_photo_url')->nullable();
			$table->bigInteger('reading_count')->unsigned()->default(0);
			$table->boolean('is_active')->unsigned()->default(1);
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
		Schema::drop('stories');
	}

}
