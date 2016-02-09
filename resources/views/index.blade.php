@extends('basetemplate')

@section('page_title', 'Главная страница')

@section('content')
<div class="row">
	<div class="col-sm-4">
		<label>Страна:</label>
		<select class="form-control" name="country" id="country">
			@if(count($countries)>0)
			@foreach($countries as $country)
			<option value="{{ $country->id }}">{{ $country->name }}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="col-sm-4">
		<label>Город:</label>
		<select class="form-control" name="city" id="city">
			@if(count($cities)>0)
			@foreach($cities as $city)
			<option value="{{ $city->id }}">{{ $city->name }}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="col-sm-4">
		<label>Языки:</label>
		<div class="row" id="languages">
			@if(count($languages)>0)
			@foreach($languages as $language)
			<div class="col-xs-6 col-sm-6">
				{{ $language->name }}
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
CountriesListInit("{{ URL::route('index-citylist') }}");
CitiesListInit("{{ URL::route('index-langlist') }}");
@endsection

