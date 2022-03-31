<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractAPIModel extends Model
{
	/**
	 * @return string
	 */
	abstract public function type();

	public function allowedAttributes()
	{
		return collect($this->attributes)->filter(function ($item, $key) {
			return !collect($this->hidden)->contains($key) && $key !== 'id' && $key !== 'created_at' && $key !== 'updated_at';
		});
	}
}
