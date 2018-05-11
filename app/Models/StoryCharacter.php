<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class StoryCharacter
 *
 * @property int $id
 * @property int $story_id
 * @property string $name
 * @property string $color_text
 * @property string $color_chat_bubble
 * @property \App\Models\Story $story
 * @property \Illuminate\Database\Eloquent\Collection $story_messages
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCharacter whereColorChatBubble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCharacter whereColorText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCharacter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCharacter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCharacter whereStoryId($value)
 * @mixin \Eloquent
 */
class StoryCharacter extends Model
{
	public $timestamps = false;

	protected $casts = [
		'story_id' => 'int'
	];

	protected $fillable = [
		'story_id',
		'name',
		'color_text',
		'color_chat_bubble'
	];

	public function story()
	{
		return $this->belongsTo(\App\Models\Story::class);
	}

	public function story_messages()
	{
		return $this->hasMany(\App\Models\StoryMessage::class);
	}
}
