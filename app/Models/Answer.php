<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends AbstractAPIModel
{
    use HasFactory;

	protected $fillable = ['content', 'is_correct'];

	protected $hidden = ['question_id'];

	public function question(){
		return $this->belongsTo(Question::class);
	}

	public function questions() {
		return $this->question();
	}
		
	public function type()
	{
		return 'answers';
	}
}
