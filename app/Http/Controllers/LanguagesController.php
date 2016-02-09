<?php

namespace MathTest\Http\Controllers;

use Illuminate\Http\Request;

use MathTest\Http\Requests;
use MathTest\Http\Controllers\Controller;
use MathTest\Language;

class LanguagesController extends Controller
{
    public function index() {
		$languages = Language::orderBy('name', 'asc')->get();

		$data = [
			 'active_menu' => 'languages',
			 'languages' => $languages
		];
		return view('languages', $data);
	}

	public function store(Request $request) {
		//Validation data
		$customAttributes = [
			 'name' => 'Язык'
		];
		$this->validate($request, [
			 'name' => 'required|min:2|max:50|unique:languages,name'
				  ], array(), $customAttributes);
		//Insert data to DB
		$lang_rec = new Language;
		$lang_rec->name = $request->input('name');
		$lang_rec->save();
		//Redirect to languages page
		return redirect()->route('languages');
	}

	public function update(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Язык не найден.'
		];
		$customAttributes = [
			 'name' => 'Язык'
		];
		$this->validate($request, [
			 'id' => 'exists:languages,id',
			 'name' => 'required|min:2|max:50|unique:languages,name,' . $request->input('id'),
				  ], $customMessages, $customAttributes);
		//Update data in DB
		$lang_rec = Language::find($request->input('id'));
		$lang_rec->name = $request->input('name');
		$lang_rec->save();
		//Redirect to languages page
		return redirect()->route('languages');
	}

	public function destroy(Request $request) {
		//Validation data
		$customMessages = [
			 'exists' => 'Язык не найден.Возможно он был удален ранее.'
		];
		$this->validate($request, [
			 'id' => 'exists:languages,id'
				  ], $customMessages);
		//Remove from DB
		$lang_rec = Language::find($request->input('id'));
		$lang_rec->cities()->detach();
		$lang_rec->delete();
		//Redirect to languages page
		return redirect()->route('languages');
	}
}
