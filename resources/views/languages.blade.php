@extends('basetemplate')

@section('page_title', 'Языки')

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
			<label>Язык:</label>
			<select class="form-control" name="id" size="10" id="languages_list">
				@if(count($languages)>0)
				@foreach($languages as $key=>$lang)
				@if($key==0)
				<option selected value="{{ $lang->id }}">{{ $lang->name }}</option>
				@else
				<option value="{{ $lang->id }}">{{ $lang->name }}</option>
				@endif
				@endforeach
				@endif
			</select>
			<input type="text" class="form-control" placeholder="Язык" name="name" id="language_name">
			<div class="editcontrolls-buttons">
				<button class="btn btn-primary btn-sm" type="submit" formaction="{{ URL::route('language-add') }}">Добавить</button>
				<button class="btn btn-warning btn-sm" type="submit" formaction="{{ URL::route('language-update') }}">Изменить</button>
				<button class="btn btn-danger btn-sm" type="submit" formaction="{{ URL::route('language-delete') }}" date-act="delete">Удалить</button>
			</div>
		</div>
	</div>
</form>
@endsection
@section('scripts')
LanguagesControllsInit();
@endsection

