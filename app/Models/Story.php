<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class Story
 *
 * @property int $id
 * @property int $story_catogory_id
 * @property string $author
 * @property string $title
 * @property string $description
 * @property string $cover_photo_url
 * @property string $background_photo_url
 * @property int $reading_count
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\StoryCatogory $story_catogory
 * @property \Illuminate\Database\Eloquent\Collection $story_characters
 * @property \Illuminate\Database\Eloquent\Collection $story_messages
 * @property \Illuminate\Database\Eloquent\Collection $tags
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereBackgroundPhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereCoverPhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereReadingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereStoryCatogoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Story whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Story extends Model
{
	protected $casts = [
		'story_catogory_id' => 'int',
		'reading_count' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'story_catogory_id',
		'author',
		'title',
		'description',
		'cover_photo_url',
		'background_photo_url',
		'reading_count',
		'is_active'
	];

	public function story_catogory()
	{
		return $this->belongsTo(\App\Models\StoryCatogory::class);
	}

	public function story_characters()
	{
		return $this->hasMany(\App\Models\StoryCharacter::class);
	}

	public function story_messages()
	{
		return $this->hasMany(\App\Models\StoryMessage::class);
	}

	public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\User::class)
					->withPivot('is_readed');
	}
}
