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


	$('#add-team').click(function(){
		loadTeamsView(siteUrl);
	});	

	loadMembersView(siteUrl);
	//loadSchedulesView(siteUrl);
	//
	//loadPlaceView(siteUrl);
	// loadTaskView(siteUrl);
	hideLoad();
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
 * Admin view
 */
 /*
function loadAdminView(siteUrl)
{
 	var template = $('#teamleader').html();
	Mustache.parse(template);   // optional, speeds up future uses
	var rendered = Mustache.render(template, {name: data.name, email: data.email, mobile: data.mobile});
	$('#container').html(rendered);

}
*/

/*
 * Method to load members view
 */
function loadTeamsView(siteUrl)
{	
	allTeams();

	function allTeams()
	{
		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'admin/getteams/',
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				var source = $('#team').html();
				var template = Handlebars.compile(source);
				var data = {data};
				$('#team-list').append(template(data));
			},
			complete: function()
			{
				getTeamMembers();
			}
		});
	}

	function getTeamMembers()
	{
		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'admin/getteammembers/',
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				$.each(data, function(key, val) {					
					var source = $('#teammembers').html();
					var template = Handlebars.compile(source);
					var data = {name: val.name, memberid: val.memberid};
					$('#teammembers-' + val.teamid).append(template(data));
				});
			}
		});
	}

	$('#add-team').click(function(){
		var hidden = $('.teams').hasClass('hide');

		if(hidden)
		{
			$('.teams').removeClass('hide');
			$('.insertTeams').addClass('hide');
		}
		else
		{
			$('.teams').addClass('hide');
			$('.insertTeams').removeClass('hide');
		}	
	});

	$('#submitTeam').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		var values = serializeForm(data); 

		url = $(this).attr('action');

		$.ajax({
			type: 'POST',
			url: url,
			data: $(this).serialize(),
			success: function(data, status, response) {
				var dataString = JSON.stringify(data);
			}
		});
	});
}	


/*
 * Method to load members view
 */
function loadMembersView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/getpendingmembers/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var source   = $('#pending-members').html();
				var template = Handlebars.compile(source);
				var data = {id: val.memberid, name: val.name, mobile: val.mobile};
				$('#pending-member-list').append(template(data));
			});
			
		},
		complete: function(data, status, response)
		{
			acceptMember();
			declineMember();
			getMemberInfo();
		}

	});

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/getmembers/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var source   = $('#members').html();
				var template = Handlebars.compile(source);
				var data = {id: val.memberid, name: val.name, mobile: val.mobile};
				$('#member-list').append(template(data));
			});
			
		}
	});
}

function loadPlaceView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/getplaces/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var source   = $('#places').html();
				var template = Handlebars.compile(source);
				var data = {name: val.name, id: val.placeid};
				$('#place-list').append(template(data));
			});
			
		},
	});

	$('#place-list').on('click','.deletePlace', function(e){

		var id = $(this).data('id');

		$.ajax({
		    type: 'DELETE',
		    url: siteUrl + 'admin/deletePlace/' + id,
			success: function(data, status, response)
			{	
				if(data == 'deleted')
				{
					Materialize.toast('Place was deleted', 4000) // 4000 is the duration of the toast
				}
				else
				{
					Materialize.toast('Place couldnt be deleted', 4000) // 4000 is the duration of the toast
				}
			}
		});
	});
}

function loadTaskView(siteUrl)
{
	$('#dateEnd').bootstrapMaterialDatePicker({ weekStart : 0, format : 'YYYY-MM-DD HH:mm:00'  });
	$('#dateStart').bootstrapMaterialDatePicker({ weekStart : 0, format : 'YYYY-MM-DD HH:mm:00'  }).on('change', function(e, date)
	{
		$('#dateEnd').bootstrapMaterialDatePicker('setMinDate', date);
	});

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/getplaces/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#place').html();
			var template = Handlebars.compile(source);
			var data = {data};
			$('.places').append(template(data));
			
		},
		complete: function()
		{
			$('.places-select').material_select();
		}
	});

	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/gettasks/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			var source   = $('#place').html();
			var template = Handlebars.compile(source);
			var data = {data};
			$('.places').append(template(data));
			
		},
		complete: function()
		{
			$('.places-select').material_select();
		}
	});	
}

function getMemberInfo()
{
	$('#get-member-info').click(function(e) {
		e.preventDefault();

		var id = $(this).data('memberid');

		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'admin/getmemberinfo/' + id,
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				var source   = $('#memberinfo').html();
				var template = Handlebars.compile(source);
				var data = {id: data.memberid, name: data.name, mobile: data.mobile};
				$('#profile-info').append(template(data));
			}
		});
	});
}

/*
 * Method to accept a membership request
 */
function acceptMember()
{
	$('#accept-member').click(function(e) {
		e.preventDefault();

		var id = $(this).data('memberid');

		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'admin/acceptmember/' + id,
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				loadMembersView(siteUrl);
			}
		});
	});
}

/*
 * Method to decline a membership request
 */
function declineMember()
{
	$('#decline-member').click(function(e) {
		e.preventDefault();

		var id = $(this).data('memberid');

		$.ajax({
		    type: 'GET',
		    url: siteUrl + 'admin/declinemember/' + id,
			contentType: 'application/json',
			success: function(data, status, response)
			{	
				loadMembersView(siteUrl);
			}
		});
	});
}

/*
 * Schedule date picker
 */
 function loadSchedulesView(siteUrl)
 {
 	$('#dateEnd').bootstrapMaterialDatePicker({ weekStart : 0, format : 'YYYY-MM-DD HH:mm:00'  });
	$('#dateStart').bootstrapMaterialDatePicker({ weekStart : 0, format : 'YYYY-MM-DD HH:mm:00'  }).on('change', function(e, date)
	{
		$('#dateEnd').bootstrapMaterialDatePicker('setMinDate', date);
	});
 }

 /*
 * Schedule form
 */
$('#createSchedule').submit(function(e) {
	e.preventDefault(); 

	url = $(this).attr('action');

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, status, response) {
		}
	});
});

 /*
 * Team create form
 */
$('#createTeam').submit(function(e) {
	e.preventDefault(); 

	url = $(this).attr('action');

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, status, response) {
			Materialize.toast('New team was made', 4000) // 4000 is the duration of the toast
		}
	});
});

 /*
 * Places form
 */
$('#createPlaces').submit(function(e) {
	e.preventDefault(); 

	url = $(this).attr('action');

	var data = $(this).serializeArray();
	var values = serializeForm(data); 

	if(values.name == '')
	{
		Materialize.toast('Name cant be empty', 4000) // 4000 is the duration of the toast
		return false;
	}

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, status, response) {
			var source   = $('#places').html();
			var template = Handlebars.compile(source);
			var data = {name: data.name, id: data.placeid};
			$('#place-list').append(template(data));
			$('#name').val('');
		}
	});
});

 /*
 * Places form
 */
$('#createTasks').submit(function(e) {
	e.preventDefault(); 

	url = $(this).attr('action');

	var data = $(this).serializeArray();
	var values = serializeForm(data); 

	if(values.name == '' || values.dateStart == '' || values.dataEnd == '' || values.memberid == '' || values.placeId == '0')
	{
		Materialize.toast('Something isnt right', 4000) // 4000 is the duration of the toast
		return false;
	}

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, status, response) {
			// var source   = $('#tasks').html();
			// var template = Handlebars.compile(source);
			// var data = {name: data.name, id: data.placeid};
			// $('#task-list').append(template(data));
			Materialize.toast('New task was made, each task is assigned under the user profile', 4000) // 4000 is the duration of the toast
		}
	});
});

/*
 * Info form
 */
$('#submitInfo').submit(function(e) {
	e.preventDefault();

	url = $(this).attr('action');

	$.ajax({
		type: 'POST',
		url: url,
		data: $(this).serialize(),
		success: function(data, status, response) {
			var dataString = JSON.stringify(data);
		}
	});
});