<?php

namespace MathTest\Http\Controllers;

use Illuminate\Http\Request;
use MathTest\Http\Requests;
use MathTest\Http\Controllers\Controller;
use MathTest\Country;

class CountriesController extends Controller {

	public function index() {
		$countries = Country::orderBy('name', 'asc')->get();

		$data = [
			 'active_menu' => 'countries',
			 'countries' => $countries
		];
		return view('countries', $data);
	}

	public function store(Request $request) {
		//Validation data
		$customAttributes = [
			 'name' => 'Страна'
		];
		$this->validate($request, [
			 'name' => 'required|min:2|max:50|unique:countries,name'
				  ], array(), $customAttributes);
		//Insert data to DB
		$country_rec = new Country;
		$country_rec->name = $request->input('name');
		$country_rec->save();
		//Redirect to countries page
		return redirect()->route('countries');
	}

	public function update(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Страна не найдена. Возможно она была удалена ранее.'
		];
		$customAttributes = [
			 'name' => 'Страна'
		];
		$this->validate($request, [
			 'id' => 'exists:countries,id',
			 'name' => 'required|min:2|max:50|unique:countries,name,' . $request->input('id'),
				  ], $customMessages, $customAttributes);
		//Update data in DB
		$country_rec = Country::find($request->input('id'));
		$country_rec->name = $request->input('name');
		$country_rec->save();
		//Redirect to countries page
		return redirect()->route('countries');
	}

	public function destroy(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Страна не найдена.'
		];
		$customAttributes = [
			 'id' => 'Страна'
		];
		$this->validate($request, [
			 'id' => 'required|exists:countries,id'
				  ], $customMessages, $customAttributes);
		//Remove from DB
		$country_rec = Country::find($request->input('id'));
		$cities_rec = $country_rec->cities()->get();
		foreach ($cities_rec as $city_rec) {
			$city_rec->languages()->detach();
			$city_rec->delete();
		}
		$country_rec->delete();
		//Redirect to countries page
		return redirect()->route('countries');
	}

}
