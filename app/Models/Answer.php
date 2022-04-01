<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends AbstractAPIModel
{
    use HasFactory;

	protected $fillable = ['content', 'question_id', 'is_correct'];

	public function questions(){
		return $this->belongsTo(Question::class);
	}
		
	public function type()
	{
		return 'answers';
	}
}
