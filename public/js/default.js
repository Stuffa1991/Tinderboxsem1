$(function(){
	/*
	 * Initialize
	 */
	// Initialize collapse button

	$('select').material_select();
	$('.collapsible').collapsible();

	$('.button-collapse').sideNav({
	      	menuWidth: 210, // Default is 240
	     	edge: 'right', // Choose the horizontal origin
	      	closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	      	draggable: false // Choose whether you can drag to open on touch screens
	    }
	);

	var fakeLoad = 500;

	//DASHBOARD
	//Load dashboard view
	$('#dashboard-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		showLoad();

		setTimeout(function(){
			loadDashboardView(siteUrl)
		}, fakeLoad);

		document.title = 'Dashboard';
	});

	//Load back to dashboard on team leader click
	$('#container').on('click','#backDashboard', function(e){
		showLoad();

		setTimeout(function(){
			loadDashboardView(siteUrl);
		}, fakeLoad);
	});

	//Load team leader info on dash board
	$('#container').on('click','#show-teamleader', function(e){
		showLoad();
		var id = $(this).data('member-id');

		setTimeout(function(){
			showInfoTeamLeader(siteUrl,id)
		}, fakeLoad);
	});

	//TEAM
	//Load team view
	$('#team-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		showLoad();

		setTimeout(function(){
			loadTeamView(siteUrl);
		}, fakeLoad);

		document.title = 'Team';
	});

	//Load back button on member profile page
	$('#container').on('click','#backTeam', function(e){
		showLoad();

		setTimeout(function(){
			loadTeamView(siteUrl);
		}, fakeLoad);
	});

	//Load member info in team tab
	$('#container').on('click','.memberinfo', function(e){
		showLoad();

		var memberId = $(this).data('member-id');

		setTimeout(function(){
			loadTeamMembersInfo(siteUrl,memberId);
		}, fakeLoad);
				
	});

	//SCHEDULE
	//Load schedule view
	$('#schedule-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		showLoad();

		setTimeout(function(){
			loadScheduleView(siteUrl);
		}, fakeLoad);

		document.title = 'Schedules';
	});

	//SIDENAV PAGES
	//Load sidenav
	$('#sidenav-view').click(function(){
		$('.collection-item').removeClass('active');
		$(this).addClass('active');

		document.title = 'Side Nav';
	});

	//Load rules view
	$('#rules-view').click(function(){
		showLoad();

		setTimeout(function(){
			loadRuleView(siteUrl);
		}, fakeLoad);

		document.title = 'Rules';
	});

	//Load info view
	$('#info-view').click(function(){
		showLoad();

		setTimeout(function(){
			loadInfoView(siteUrl);
		}, fakeLoad);

		document.title = 'Info';
	});

	//Load news view
	$('#news-view').click(function(){
		showLoad();

		setTimeout(function(){
			loadNewsView(siteUrl);
		}, fakeLoad);

		document.title = 'News';
	});

	//Load edit view
	$('#edit-view').click(function(){
		showLoad();

		setTimeout(function(){
			loadEditView(siteUrl);
		}, fakeLoad);

		document.title = 'Edit profile';
	});
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

function showLoad()
{
	$('#loader').show();
	$('#container').hide();
	$('#container').html('');
}

function hideLoad()
{
	$('#loader').hide();
	$('#container').fadeIn('slow')
}

/*
 * Dashboard view
 */
function loadDashboardOnLoad(siteUrl)
{
	showLoad();

	setTimeout(function(){
		loadDashboardView(siteUrl);
	}, 500);

	document.title = 'Dashboard';
}


function loadDashboardView(siteUrl)
{
	var source   = $('#dashboard').html();
	var template = Handlebars.compile(source);
	$('#container').html(template());

	var load = setTimeout(after(siteUrl), 1000);

	function after(siteUrl)
	{
		getTeamLeader(siteUrl);
		getSchedules(siteUrl);
		getStaff(siteUrl);
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
			if(data == null)
			{

			}
			else
			{
				var source   = $('#teamleader').html();
				var template = Handlebars.compile(source);
				var data = {name: data.name, email: data.email, mobile: data.mobile, memberid: data.memberid};
				$('#teamleader-info').append(template(data));
			}
		}
	});
}

function showInfoTeamLeader(siteUrl,id)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'team/getTeamMemberInfo/' + id,
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#teammemberDashboard').html();
			var template = Handlebars.compile(source);
			var data = {name: data.name, email: data.email, phone: data.phone, mobile: data.mobile};
			$('#container').html(template(data));	
		},
		complete: function()
		{
			hideLoad();
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
				var source   = $('#schedules').html();
				var template = Handlebars.compile(source);
				var data = {day: val.day ,fromtime: val.fromtime, totime: val.totime};
				$('#schedules-info').append(template(data));
			});
		}
	});
}

function getStaff(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getstaff/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			$('.collapsible').collapsible();

			$.each(data, function(key, val) {
				var source   = $('#staff').html();
				var template = Handlebars.compile(source);
				var data = {title: val.title, text: val.text, date: val.created_at};
				$('#staff-info').append(template(data));
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
			}
		});
	}
}

/*
 * Method to load members information
 */

function loadTeamMembersInfo(siteUrl,memberId)
{

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'team/getTeamMemberInfo/' + memberId,
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#teammember').html();
			var template = Handlebars.compile(source);
			var data = {name: data.name, email: data.email, phone: data.phone, mobile: data.mobile};
			$('#container').html(template(data));	
		},
		complete: function()
		{
			hideLoad();
		}
	});
}

/**
 * Schedules View
 */

function loadScheduleView(siteUrl)
{

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'schedules/getSchedulesBy7days',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#schedulesview').html();
			var template = Handlebars.compile(source);
			var data = {data};
			$('#container').html(template(data));	
		},
		complete: function()
		{
			$('ul.tabs').tabs();
			daysLoad();
		}
	});

	function daysLoad()
	{
		$.ajax({
	    type: 'GET',
	    url: siteUrl + 'schedules/getSchedulesBy30days',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#schedulesmonth').html();
			var template = Handlebars.compile(source);
			var data = {data};
			$('#30days').append(template(data));	
		},
		complete: function()
		{
			$('ul.tabs').tabs();
			hideLoad();
		}
	});
	}
}


/*
 * Method to load rules
 */
function loadRuleView(siteUrl)
{
	
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
 * Method to edit profile view
 */
function loadEditView(siteUrl)
{

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'dashboard/getOwnInfo/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$('.button-collapse').sideNav('hide');

			var source   = $('#editview').html();
			var template = Handlebars.compile(source);
			var data = {name: data.name, email: data.email, phone: data.phone, mobile: data.mobile};
			$('#container').html(template(data));
		},
		complete: function()
		{
			hideLoad();
			Materialize.updateTextFields();
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
			if(data == 'loggedIn')
			{
				window.location.href = siteUrl + "dashboard";
			}
			else
			{
				Materialize.toast(data, 4000) // 4000 is the duration of the toast
			}
		},
		complete: function(xhr, textStatus) {
		},
		error: function(xhr, textStatus, errorThrown) {
		}
	});
});

/*
 * Edit user form
 */
$('.editUserForm').submit(function(e){
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
			var dataString = JSON.stringify(data);
			Materialize.toast('Profile was edited', 4000);
		},
		complete: function(xhr, textStatus) {
		},
		error: function(xhr, textStatus, errorThrown) {
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
		success: function(data, textStatus, xhr) {;
		},
		complete: function(xhr, textStatus) {
		},
		error: function(xhr, textStatus, errorThrown) {
		}
	});
});