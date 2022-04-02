<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends AbstractAPIModel
{
    use HasFactory;

	protected $fillable = [
		'body'
	];

	public function quiz(){
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
