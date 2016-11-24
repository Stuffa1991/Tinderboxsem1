$(function(){

	var siteUrl = 'http://localhost/sites/tinderbox/trunk/';

	/*
	 * Initialize
	 */
	// Initialize collapse button
	$(".button-collapse").sideNav();
	
	
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	//$('.collapsible').collapsible();

	$('.button-collapse').sideNav({
	      	menuWidth: 300, // Default is 240
	     	edge: 'right', // Choose the horizontal origin
	      	closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	      	draggable: true // Choose whether you can drag to open on touch screens
	    }
	);

	loadTeamLeader(siteUrl);
});

/*
 * Dashboard view
 */
function loadTeamLeader(siteUrl) {
		
		$.ajax({
        type: 'GET',
        url: siteUrl + 'dashboard/getteamleader/',
		contentType: 'application/json',
		success: function(data, status, response)
		{
			var html = '<div class="card horizontal">'
					      	+'<div class="card-image">'
					        	+'<img src="http://lorempixel.com/100/190/nature/6">'
					      	+'</div>'
					      	+'<div class="card-stacked">'
					        	+'<div class="card-content">'
					        		+'<p>Team leader</p>'
					          		+'<p>I am a very simple card. I am good at containing small bits of information.</p>'
					       		+'</div>'
					        	+'<div class="card-action">'
					          		+'<a href="#" class="right">This is a link</a>'
				        		+'</div>'
					      	+'</div>'
					    +'</div>';
	
			$('#container').html(html);
		}
	});
}


/*
 * Register user form
 */
jQuery('.registerUserForm').submit(function(e) {
	e.preventDefault();

    //Serialize form - get values
    var values = {};
	$.each(jQuery(this).serializeArray(), function(i, field) {
	    values[field.name] = field.value;
	});

	if(values.repeatPassword !== values.password)
	{
		alert('Passwords dont match');
		return false;
	}

	url = jQuery(this).attr('action');

	jQuery.ajax({
		type: 'POST',
		url: url,
		data: jQuery(this).serialize(),
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