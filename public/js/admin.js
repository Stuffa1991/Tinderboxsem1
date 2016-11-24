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

	loadMembersView(siteUrl);

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
 * Method to load infos
 */
function loadMembersView(siteUrl)
{
	$.ajax({
	    type: 'GET',
	    url: siteUrl + 'admin/getmembers/',
		contentType: 'application/json',
		success: function(data, status, response)
		{	
			$.each(data, function(key, val) {
				var template = $('#members').html();
				Mustache.parse(template);   // optional, speeds up future uses
				var rendered = Mustache.render(template, {id: val.id, name: val.name, mobile: val.mobile});
				$('#member-list').append(rendered);
			});
			
		}
	});
}

/*
 * Info form
 */
$('#submitInfo').submit(function(e) {
	e.preventDefault();

	var data = $(this).serializeArray();
	var values = serializeForm(data); 

	url = $(this).attr('action');

	jQuery.ajax({
		type: 'POST',
		url: url,
		data: jQuery(this).serialize(),
		success: function(data, status, response) {
			var dataString = JSON.stringify(data);
		}
	});
});