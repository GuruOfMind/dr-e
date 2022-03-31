<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	use HasFactory;
	use Sluggable;

	protected $fillable = ['name', 'examiner_id', 'category_id', 'year', 'semester'];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}
	
	public function question()
	{
		return $this->hasMany(Question::class);
	}

	public function examiner()
	{
		return $this->belongsTo(Examiner::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
