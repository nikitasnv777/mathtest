<?php

namespace MathTest\Http\Controllers;

use Illuminate\Http\Request;
use MathTest\Http\Requests;
use MathTest\Http\Controllers\Controller;
use MathTest\Country;
use MathTest\City;
use MathTest\Language;
use Debugbar;

class CitiesController extends Controller {

	public function ajaxGetCitiesList(Request $request) {
		if (!is_numeric($request->input('country_id'))) {
			abort(400);
		}
		$country = Country::findOrFail($request->input('country_id'));
		$cities = $country->cities()->orderBy('name', 'asc')->get();
		$languages = Language::orderBy('name', 'asc')->get();
		if (count($cities) > 0) {
			//find active languages
			$lngs_act = $cities[0]->languages()->get();
			//find active languages
			for ($i = 0; $i < count($languages); $i++) {
				$languages[$i]->active = FALSE;
				for ($j = 0; $j < count($lngs_act); $j++) {
					if ($languages[$i]->id == $lngs_act[$j]->id) {
						$languages[$i]->active = TRUE;
						break;
					}
				}
			}
		}
		return response()->json(['cities' => $cities, 'languages' => $languages]);
	}

	public function AjaxGetLanguagesList(Request $request) {
		if (!is_numeric($request->input('city_id'))) {
			abort(400);
		}
		$city = City::findOrFail($request->input('city_id'));
		$languages = Language::orderBy('name', 'asc')->get();
		//find active languages
		$lngs_act = $city->languages()->get();
		//find active languages
		for ($i = 0; $i < count($languages); $i++) {
			$languages[$i]->active = FALSE;
			for ($j = 0; $j < count($lngs_act); $j++) {
				if ($languages[$i]->id == $lngs_act[$j]->id) {
					$languages[$i]->active = TRUE;
					break;
				}
			}
		}
		return response()->json(['languages' => $languages]);
	}

	public function AjaxGetLanguagesModif(Request $request) {
		if ((!is_numeric($request->input('city_id'))) ||
				  (!is_numeric($request->input('lang_id')))) {
			abort(400);
		}
		$city = City::findOrFail($request->input('city_id'));
		if ($request->input('lang_en')) {
			$city->languages()->attach($request->input('lang_id'));
			$result = 'attached';
		} else {
			$city->languages()->detach($request->input('lang_id'));
			$result = 'detached';
		}
		return response()->json(['result' => $result]);
	}

	public function index() {
		$languages = Language::orderBy('name', 'asc')->get();
		$countries = Country::orderBy('name', 'asc')->get();
		$cities = array();
		if (count($countries) > 0) {
			$cities = $countries[0]->cities()->orderBy('name', 'asc')->get();
			if (count($cities) > 0) {
				$lngs_act = $cities[0]->languages()->get();
				//find active languages
				for ($i = 0; $i < count($languages); $i++) {
					$languages[$i]->active = FALSE;
					for ($j = 0; $j < count($lngs_act); $j++) {
						if ($languages[$i]->id == $lngs_act[$j]->id) {
							$languages[$i]->active = TRUE;
							break;
						}
					}
				}
			}
		}
		//Debugbar::info($lng_ids[0]->id);
		Debugbar::info($languages);
		$data = [
			 'active_menu' => 'cities',
			 'countries' => $countries,
			 'cities' => $cities,
			 'languages' => $languages
		];
		return view('cities', $data);
	}

	public function store(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Страна не найдена.'
		];
		$customAttributes = [
			 'name' => 'Город',
			 'country_id' => 'Страна'
		];
		$this->validate($request, [
			 'country_id' => 'required|exists:countries,id',
			 'name' => 'required|min:2|max:50|unique:cities,name'
				  ], $customMessages, $customAttributes);
		//Insert data to DB
		$city_rec = new City;
		$city_rec->name = $request->input('name');
		$country = Country::find($request->input('country_id'));
		$country->cities()->save($city_rec);
		//Redirect to cities page
		return redirect()->route('cities');
	}

	public function update(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Город не найден.'
		];
		$customAttributes = [
			 'name' => 'Город'
		];
		$this->validate($request, [
			 'id' => 'exists:cities,id',
			 'name' => 'required|min:2|max:50|unique:cities,name,' . $request->input('id'),
				  ], $customMessages, $customAttributes);
		//Update data in DB
		$city_rec = City::find($request->input('id'));
		$city_rec->name = $request->input('name');
		$city_rec->save();
		//Redirect to cities page
		return redirect()->route('cities');
	}

	public function destroy(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Город не найдена. Возможно он был удален ранее.'
		];
		$customAttributes = [
			 'id' => 'Город'
		];
		$this->validate($request, [
			 'id' => 'required|exists:cities,id'
				  ], $customMessages, $customAttributes);
		//Remove from DB
		$city_rec = City::find($request->input('id'));
		$city_rec->languages()->detach();
		$city_rec->delete();
		//Redirect to cities page
		return redirect()->route('cities');
	}

}
