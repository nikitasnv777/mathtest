<?php

namespace MathTest;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

	protected $table = 'languages';
	public $timestamps = false;

	public function cities() {
		return $this->belongsToMany('MathTest\City', 'city_language', 'language_id', 'city_id');
	}

}
