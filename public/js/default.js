$(function(){

	/*
	 * Initialize
	 */
	// Initialize collapse button
	$(".button-collapse").sideNav();

	$('select').material_select();
	$('.collapsible').collapsible();

	$('.button-collapse').sideNav({
	      	menuWidth: 300, // Default is 240
	     	edge: 'right', // Choose the horizontal origin
	      	closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	      	draggable: false // Choose whether you can drag to open on touch screens
	    }
	);

	loadDashboardView(siteUrl);

	// menu
	$('#dashboard-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		loadDashboardView(siteUrl);
	});

	$('#team-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		loadTeamView(siteUrl);
	});

	$('#schedule-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		//loadScheduleView(siteUrl);
	});

	$('#rules-view').click(function(){
		loadRuleView(siteUrl);
	});

	$('#info-view').click(function(){
		loadInfoView(siteUrl);
	});

	$('#news-view').click(function(){
		loadNewsView(siteUrl);
	});

	//loadAdminView(siteUrl);

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

/**
 * [clearView description]
 * @return {[type]} [description]
 */
function clearView()
{
	$('#container').html('');
}

function showLoad()
{
	$('#loader').show();
	$('#container').hide();
}

function hideLoad()
{
	$('#loader').hide();
	$('#container').show();
}


/*
 * Dashboard view
 */
function loadDashboardView(siteUrl)
{
	clearView();
	showLoad();

	var source   = $('#dashboard').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	var load = setTimeout(after(siteUrl), 1000);

	function after(siteUrl)
	{
		getTeamLeader(siteUrl);
		getSchedules(siteUrl);
		getNews(siteUrl);
	}
}

function getTeamLeader(siteUrl) 
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getteamleader/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			var source   = $('#teamleader').html();
			var template = Handlebars.compile(source);
			var data = {name: data.name, email: data.email, mobile: data.mobile};
			$('#teamleader-info').append(template(data));
		}
	});
}

function getSchedules(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getschedules/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			$.each(data, function(key, val) {
				console.log(val);
				var source   = $('#schedules').html();
				var template = Handlebars.compile(source);
				var data = {fromtime: val.fromtime, totime: val.totime};
				$('#schedules-info').append(template(data));
			});
		}
	});
}

function getNews(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getnews/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			$('.collapsible').collapsible();

			$.each(data, function(key, val) {
				var source   = $('#news').html();
				var template = Handlebars.compile(source);
				var data = {title: val.title, text: val.text};
				$('#news-info').append(template(data));
			});	
		},
		complete: function()
		{
			hideLoad();
		}
	});
}

/*
 * Team view
 */
function loadTeamView(siteUrl)
{	
	clearView();
	showLoad();

	var source   = $('#teamlist').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	var load = setTimeout(after(siteUrl), 1000);

	function after(siteUrl)
	{
		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'team/getteam/',
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				$.each(data, function(key, val) {
					var source   = $('#team').html();
					var template = Handlebars.compile(source);
					var data = {memberid: val.memberid, name: val.name};
					$('#team-list').append(template(data));
					
				});
			},
			complete: function()
			{
				hideLoad();

				loadTeamMemberInfo(siteUrl);
			}
		});
	}
}

/*
 * Method to load members information
 */
function loadTeamMemberInfo(siteUrl)
{
	$('.memberinfo').click(function(e){
		e.preventDefault();

		var memberId = $(this).data('member-id');

		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'team/getTeamMemberInfo/' + memberId,
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				console.log(data);
				var source   = $('#teammember').html();
				var template = Handlebars.compile(source);
				var data = {name: data.name, email: data.email, phone: data.phone, mobile: data.mobile};
				$('#container').html(template(data));	
			}
		});		
	});
}

/*
 * Method to load rules
 */
function loadRuleView(siteUrl)
{
	clearView();
	showLoad();
	
	var source   = $('#rulesview').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getrules/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$('.collapsible').collapsible();

			$.each(data, function(key, val) {
				var source   = $('#rules').html();
				var template = Handlebars.compile(source);
				var data = {title: val.title, text: val.text};
				$('#rules-list').append(template(data));
			});
		},
		complete: function()
		{
			hideLoad();
		}
	});
}

/*
 * Method to load infos
 */
function loadInfoView(siteUrl)
{	
	clearView();
	showLoad();
	
	var source   = $('#infoview').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getinfos/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$('.collapsible').collapsible();

			$.each(data, function(key, val) {
				var source   = $('#info').html();
				var template = Handlebars.compile(source);
				var data = {title: val.title, text: val.text};
				$('#info-list').append(template(data));
			});
		},
		complete: function()
		{
			hideLoad();
		}
	});
}

/*
 * Method to load news
 */
function loadNewsView(siteUrl)
{
	clearView();
	showLoad();
	
	var source   = $('#newsview').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'info/getnews/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$('.collapsible').collapsible();

			$.each(data, function(key, val) {
				var source   = $('#news').html();
				var template = Handlebars.compile(source);
				var data = {title: val.title, text: val.text};
				$('#news-list').append(template(data));
			});
		},
		complete: function()
		{
			hideLoad();
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
		Materialize.toast('Passwords dont match', 4000) // 4000 is the duration of the toast
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