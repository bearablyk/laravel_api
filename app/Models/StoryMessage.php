<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class StoryMessage
 *
 * @property int $id
 * @property int $story_id
 * @property int $story_character_id
 * @property string $text
 * @property string $thumbnail_photo_url
 * @property \App\Models\Story $story
 * @property \App\Models\StoryCharacter $story_character
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryMessage whereStoryCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryMessage whereStoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryMessage whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryMessage whereThumbnailPhotoUrl($value)
 * @mixin \Eloquent
 */
class StoryMessage extends Model
{
	public $timestamps = false;

	protected $casts = [
		'story_id' => 'int',
		'story_character_id' => 'int'
	];

	protected $fillable = [
		'story_id',
		'story_character_id',
		'text',
		'thumbnail_photo_url'
	];

	public function story()
	{
		return $this->belongsTo(\App\Models\Story::class);
	}

	public function story_character()
	{
		return $this->belongsTo(\App\Models\StoryCharacter::class);
	}
}
