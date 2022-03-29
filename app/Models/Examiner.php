<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examiner extends Model
{
    use HasFactory;
	protected $fillable = ['name'];

	public function Quiz() {
		return $this->hasMany(Quiz::class);
	}
}
