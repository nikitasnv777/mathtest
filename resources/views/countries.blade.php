@extends('basetemplate')

@section('page_title', 'Страны')

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
			<select class="form-control" name="id" size="10" id="countries_list">
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
			<input type="text" class="form-control" placeholder="Страна" name="name" id="country_name">
			<div class="editcontrolls-buttons">
				<button class="btn btn-primary btn-sm" type="submit" formaction="{{ URL::route('country-add') }}">Добавить</button>
				<button class="btn btn-warning btn-sm" type="submit" formaction="{{ URL::route('country-update') }}">Изменить</button>
				<button class="btn btn-danger btn-sm" type="submit" formaction="{{ URL::route('country-delete') }}" date-act="delete">Удалить</button>
			</div>
		</div>
	</div>
</form>
@endsection
@section('scripts')
CountriesControllsInit();
@endsection

