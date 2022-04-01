<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends AbstractAPIModel
{
	use HasFactory;
	use Sluggable;

	protected $fillable = [
		'name'
	];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}

	public function quizzes()
	{
		return $this->hasMany(Quiz::class);
	}

	public function type()
	{
		return 'categories';
	}
}
