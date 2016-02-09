function CountriesListInit(dest_url)
{
	$('select#country').change(function () {
		$.ajax({
			url: dest_url,
			type: "POST",
			data: "country_id=" + $(this).val(),
			success: function (response)
			{
				var city = $('#city');
				city.empty();
				response['cities'].forEach(function (item, i, arr) {
					city.append('<option value="' + item.id + '">' + item.name + '</option>');
				});
				var languages = $('#languages');
				languages.empty();
				response['languages'].forEach(function (item, i, arr) {
					languages.append('<div class="col-sm-2">' + item.name + '</div>');
				});
			},
			error: function (response)
			{
				console.log(response);
			}
		});
	});
}

function CitiesListInit(dest_url)
{
	$('select#city').change(function () {
		$.ajax({
			url: dest_url,
			type: "POST",
			data: "city_id=" + $(this).val(),
			success: function (response)
			{
				var languages = $('#languages');
				languages.empty();
				response['languages'].forEach(function (item, i, arr) {
					languages.append('<div class="col-sm-2">' + item.name + '</div>');
				});
			},
			error: function (response)
			{
				console.log(response);
			}
		});
	});
}

function CountriesControllsInit()
{
	$('#countries_list').change(function () {
		$('#country_name').val($("#countries_list option:selected").text());
	});

	$('button[date-act=delete]').click(function () {
		return confirm('Подтверждаете удаление?');
	});
}

function CitiesControllsInit(dest_url_cities, dest_url_languages, dest_url_langmod)
{
	$('select#countries_list').change(function () {
		$.ajax({
			url: dest_url_cities,
			type: "POST",
			data: "country_id=" + $(this).val(),
			success: function (response)
			{
				$('#city_name').val('');
				var city = $('select#cities_list');
				city.empty();
				var lang = $('div#languages_list');
				lang.empty();
				if (response['cities'].length > 0) {
					response['cities'].forEach(function (item, i, arr) {
						if (i === 0) {
							$('#city_name').val(item.name);
							city.append('<option selected value="' + item.id + '">' + item.name + '</option>');
						} else {
							city.append('<option value="' + item.id + '">' + item.name + '</option>');
						}
					});
					city.attr('disabled', false);
					response['languages'].forEach(function (item, i, arr) {
						if (item.active) {
							lang.append('<p><input type="checkbox" checked name="languages[]" value="' + item.id + '"><span>' + item.name + '</span></p>');
						} else {
							lang.append('<p><input type="checkbox" name="languages[]" value="' + item.id + '"><span>' + item.name + '</span></p>');
						}
					});
					CitiesControllsLngListInit(dest_url_langmod);
				} else {
					city.attr('disabled', true);
					response['languages'].forEach(function (item, i, arr) {
						lang.append('<p><input disabled type="checkbox" name="languages[]" value="' + item.id + '"><span>' + item.name + '</span></p>');
					});
				}
			},
			error: function (response)
			{
				console.log(response);
			}
		});
	});

	$('select#cities_list').change(function () {
		$.ajax({
			url: dest_url_languages,
			type: "POST",
			data: "city_id=" + $(this).val(),
			success: function (response)
			{
				var lang = $('div#languages_list');
				lang.empty();
				response['languages'].forEach(function (item, i, arr) {
					if (item.active) {
						lang.append('<p><input type="checkbox" checked name="languages[]" value="' + item.id + '"><span>' + item.name + '</span></p>');
					} else {
						lang.append('<p><input type="checkbox" name="languages[]" value="' + item.id + '"><span>' + item.name + '</span></p>');
					}
				});
				CitiesControllsLngListInit(dest_url_langmod);
			},
			error: function (response)
			{
				console.log(response);
			}
		});
	});

	$('#cities_list').change(function () {
		$('#city_name').val($("#cities_list option:selected").text());
	});

	$('button[date-act=delete]').click(function () {
		return confirm('Подтверждаете удаление?');
	});

	CitiesControllsLngListInit(dest_url_langmod);
}

function CitiesControllsLngListInit(dest_url_langmod)
{
	$("div#languages_list p input").click(function () {
		var attach = '0';
		if ($(this).is(":checked") == true) {
			attach = '1';
		}
		;
		$.ajax({
			url: dest_url_langmod,
			type: "POST",
			data: "city_id=" + $('select#cities_list').val() + "&lang_id=" + $(this).attr('value') + "&lang_en=" + attach,
			success: function (response)
			{
				console.log(response);
			},
			error: function (response)
			{
				console.log(response);
			}
		});
	});
}

function LanguagesControllsInit()
{
	$('#languages_list').change(function () {
		$('#language_name').val($("#languages_list option:selected").text());
	});

	$('button[date-act=delete]').click(function () {
		return confirm('Подтверждаете удаление?');
	});
}
