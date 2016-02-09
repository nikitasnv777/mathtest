@extends('basetemplate')

@section('page_title', 'Города')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>Ошибка!</strong><br>
	<ul>
		@foreach($errors->all() as $error)
		{!! $error !!}
		@endforeach
	</ul>
</div>
@endif

<form method="POST">
	{!! csrf_field() !!}
	<div class="row editcontrolls-block">
		<div class="col-xs-12 col-sm-6 col-md-4 editcontrolls-controlls">
			<label>Страна:</label>
			<select class="form-control" name="country_id" size="10" id="countries_list">
				@if(count($countries)>0)
				@foreach($countries as $key=>$country)
				@if($key==0)
				<option selected value="{{ $country->id }}">{{ $country->name }}</option>
				@else
				<option value="{{ $country->id }}">{{ $country->name }}</option>
				@endif
				@endforeach
				@endif
			</select>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 editcontrolls-controlls">
			<label>Город:</label>
			<select class="form-control" name="id" size="10" id="cities_list">
				@if(count($cities)>0)
				@foreach($cities as $key=>$city)
				@if($key==0)
				<option selected value="{{ $city->id }}">{{ $city->name }}</option>
				@else
				<option value="{{ $city->id }}">{{ $city->name }}</option>
				@endif
				@endforeach
				@endif
			</select>
			<input type="text" class="form-control" placeholder="Город" name="name" id="city_name">
			<div class="editcontrolls-buttons">
				<button class="btn btn-primary btn-sm" type="submit" formaction="{{ URL::route('city-add') }}">Добавить</button>
				<button class="btn btn-warning btn-sm" type="submit" formaction="{{ URL::route('city-update') }}">Изменить</button>
				<button class="btn btn-danger btn-sm" type="submit" formaction="{{ URL::route('city-delete') }}" date-act="delete">Удалить</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 editcontrolls-controlls">
			<label>Языки:</label>
			<div class="panel panel-default checkboxslist">
				<div class="panel-body" id="languages_list">
					@if(count($languages)>0)
					@foreach($languages as $lang)
					<p>
						@if(count($cities)>0)
						@if($lang->active)
						<input type="checkbox" checked name="languages[]" value="{{ $lang->id }}"><span>{{ $lang->name }}</span>
						@else
						<input type="checkbox" name="languages[]" value="{{ $lang->id }}"><span>{{ $lang->name }}</span>
						@endif
						@else
						<input type="checkbox" disabled name="languages[]" value="{{ $lang->id }}"><span>{{ $lang->name }}</span>
						@endif
					</p>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('scripts')
CitiesControllsInit("{{ URL::route('cities-list') }}", "{{ URL::route('cities-langlist') }}", "{{ URL::route('cities-langmod') }}");
@endsection

