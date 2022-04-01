<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends AbstractAPIModel
{
    use HasFactory;

	protected $fillable = [
		'body',
		'quiz_id'
	];

	public function quizzes(){
		return $this->belongsTo(Quiz::class);
	}

	public function answers() {
		return $this->hasMany(Answer::class);
	}

		
	public function type()
	{
		return 'questions';
	}
}
