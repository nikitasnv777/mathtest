<?php

namespace MathTest;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

	protected $table = 'countries';
	public $timestamps = false;

	public function cities() {
		return $this->hasMany('MathTest\City', 'country_id', 'id');
	}

}
