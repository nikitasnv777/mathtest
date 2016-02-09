<?php

namespace MathTest\Http\Controllers;

use Illuminate\Http\Request;
use MathTest\Http\Requests;
use MathTest\Http\Controllers\Controller;
use MathTest\Country;
use MathTest\City;
use MathTest\Language;
use Debugbar;

class IndexController extends Controller {

	public function ajaxGetCitiesList(Request $request) {
		if (!is_numeric($request->input('country_id'))) {
			abort(400);
		}
		$country = Country::findOrFail($request->input('country_id'));
		$cities = $country->cities()->orderBy('name', 'asc')->get();
		$languages = array();
		if (count($cities) > 0) {
			$languages = $cities[0]->languages()->orderBy('name', 'asc')->get();
		}
		return response()->json(['cities' => $cities, 'languages' => $languages]);
	}

	public function ajaxGetLanguagesList(Request $request) {
		if (!is_numeric($request->input('city_id'))) {
			abort(400);
		}
		$city = City::findOrFail($request->input('city_id'));
		$languages = $city->languages()->orderBy('name', 'asc')->get();
		return response()->json(['languages' => $languages]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$countries = Country::orderBy('name', 'asc')->get();
		$cities = array();
		$languages = array();
		if (count($countries) > 0) {
			$cities = $countries[0]->cities()->orderBy('name', 'asc')->get();
			if (count($cities) > 0) {
				$languages = $cities[0]->languages()->orderBy('name', 'asc')->get();
			}
		}

		$data = [
			 'active_menu' => 'index',
			 'countries' => $countries,
			 'cities' => $cities,
			 'languages' => $languages
		];

		return view('index', $data);
	}

}
