<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends AbstractAPIModel
{
    use HasFactory;

	protected $fillable = ['content', 'is_correct'];

	public function question(){
		return $this->belongsTo(Question::class);
	}
		
	public function type()
	{
		return 'answers';
	}
}
