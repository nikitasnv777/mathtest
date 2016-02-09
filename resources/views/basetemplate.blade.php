<!DOCTYPE html>
<html lang="ru">
   <head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>MathTest - @yield('page_title')</title>
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/mathtest.css') }}">
   </head>
   <body>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ URL::route('index') }}">MathTest</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-navbar-collapse">
						<ul class="nav navbar-nav">
							<li<?php if($active_menu=='index') echo ' class="active"'; ?>><a href="{{ URL::route('index') }}">Главная страница</a></li>
							<li<?php if($active_menu=='countries') echo ' class="active"'; ?>><a href="{{ URL::route('countries') }}">Страны</a></li>
							<li<?php if($active_menu=='cities') echo ' class="active"'; ?>><a href="{{ URL::route('cities') }}">Города</a></li>
							<li<?php if($active_menu=='languages') echo ' class="active"'; ?>><a href="{{ URL::route('languages') }}">Языки</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="panel panel-default">
				<div class="panel-body">
					@yield('content')
				</div>
			</div>
      </div>
		<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/mathtest.js') }}"></script>
		<script>
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
@yield('scripts')
		</script>
   </body>
</html>
