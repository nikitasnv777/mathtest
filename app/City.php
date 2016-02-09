<?php

namespace MathTest;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

	protected $table = 'cities';
	public $timestamps = false;

	public function country() {
		return $this->belongsTo('MathTest\Country', 'country_id', 'id');
	}

	public function languages() {
		return $this->belongsToMany('MathTest\Language', 'city_language', 'city_id', 'language_id');
	}

}
