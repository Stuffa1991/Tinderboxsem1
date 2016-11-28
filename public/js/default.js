$(function(){

	/*
	 * Initialize
	 */
	// Initialize collapse button
	$(".button-collapse").sideNav();
	$('select').material_select();
	
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	//$('.collapsible').collapsible();

	$('.button-collapse').sideNav({
	      	menuWidth: 300, // Default is 240
	     	edge: 'right', // Choose the horizontal origin
	      	closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	      	draggable: true // Choose whether you can drag to open on touch screens
	    }
	);


	// Footer menu

	//loadAdminView(siteUrl);
	//loadTeamLeader(siteUrl);

	//loadInfoView(siteUrl);
	//loadRuleView(siteUrl);
	//loadNewsView(siteUrl);



});

function serializeForm(data) 
{
	//Serialize form - get values
    var values = {};
	$.each(data, function(i, field) {
	    values[field.name] = field.value;
	});

	return values;
}

/*
 * Dashboard view
 */
function loadTeamLeader(siteUrl) 
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getteamleader/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			var template = $('#teamleader').html();
			Mustache.parse(template);   // optional, speeds up future uses
			var rendered = Mustache.render(template, {name: data.name, email: data.email, mobile: data.mobile});
			$('#container').html(rendered);
		}
	});
}

/*
 * Method to load infos
 */
function loadInfoView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getinfos/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var template = $('#info').html();
				Mustache.parse(template);   // optional, speeds up future uses
				var rendered = Mustache.render(template, {title: val.title, text: val.text});
				$('#info-list').append(rendered);
			});
			
		}
	});
}

/*
 * Method to load rules
 */
function loadRuleView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getrules/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var template = $('#info').html();
				Mustache.parse(template);   // optional, speeds up future uses
				var rendered = Mustache.render(template, {title: val.title, text: val.text});
				$('#info-list').append(rendered);
			});
			
		}
	});
}

/*
 * Method to load news
 */
function loadNewsView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getnews/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var template = $('#info').html();
				Mustache.parse(template);   // optional, speeds up future uses
				var rendered = Mustache.render(template, {title: val.title, text: val.text});
				$('#info-list').append(rendered);
			});
			
		}
	});
}

/*
 * Login user form
 */
$('.loginUserForm').submit(function(e) {
	e.preventDefault();

    var data = $(this).serializeArray();
	var values = serializeForm(data); 

	url = $(this).attr('action');

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, textStatus, xhr) {
			console.log(data);
			//console.debug(data + ' ' + textStatus + ' ' + xhr);
			if(data == 'loggedIn')
			{
				window.location.href = siteUrl + "dashboard";
				console.log(data + ' True')
			}
			else
			{
				Materialize.toast(data, 4000) // 4000 is the duration of the toast
			}
		},
		complete: function(xhr, textStatus) {
			//console.debug(textStatus + ' ' + xhr); 
		},
		error: function(xhr, textStatus, errorThrown) {
			//console.debug(xhr + ' ' + textStatus + ' ' + errorThrown);
		}
	});
});

/*
 * Register user form
 */
$('.registerUserForm').submit(function(e) {
	e.preventDefault();

    var data = $(this).serializeArray();
	var values = serializeForm(data); 

	if(values.repeatPassword !== values.password)
	{
		alert('Passwords dont match');
		return false;
	}

	url = $(this).attr('action');

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, textStatus, xhr) {
			//console.debug(data + ' ' + textStatus + ' ' + xhr);
			var dataString = JSON.stringify(data);
			console.debug(dataString);
		},
		complete: function(xhr, textStatus) {
			//console.debug(textStatus + ' ' + xhr); 
		},
		error: function(xhr, textStatus, errorThrown) {
			//console.debug(xhr + ' ' + textStatus + ' ' + errorThrown);
		}
	});
});