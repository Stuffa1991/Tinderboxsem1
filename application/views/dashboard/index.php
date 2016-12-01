<script id="dashboard" type="text/x-handlebars-template">
	<div class="row">
			
		<div id="teamleader-info"></div>
		
		<div>
			<h4>Schedules</h4>
			<ul id="schedules-info" class="collection"></ul>
		</div>
		
		<div>
			<h4>Info from staff</h4>
			<ul id="staff-info" class="collapsible" data-collapsible="accordion"></ul>
		</div>

	</div>
</script>

<script id="teamleader" type="text/x-handlebars-template">
	<div id="show-teamleader" data-member-id="{{member-id}}" class="card horizontal">
	  	<div class="card-image">
	    	<img src="http://placehold.it/100x100">
	  	</div>
	  	<div class="card-stacked">
	    	<div class="card-content">
	    		<p>Team leader</p>
	    		<h4>{{ name }}</h4>
	      		<p>Email: {{ email }}</p>
	      		<p>Mobile: {{ mobile }}</p>
	   		</div>
	  	</div>
	</div>
</script>

<script>
	$('#show-teamleader').click(function(){
		var id = $(this).data('member-id');

		console.log(id);
	});
</script>

<script id="schedules" type="text/x-handlebars-template">
	
	<li class="collection-item">
	<div class="row">
		<div class="col s6">
			{{ day }}
		</div>
		<div class="col s6 right-align">
			{{ fromtime }} - {{ totime }}
		</div>
	</div>
	</li>

</script>

<script id="staff" type="text/x-handlebars-template">
	
	<li>
      <div class="collapsible-header">{{ title }} <div class="right">{{ date }}</div></div>
      <div class="collapsible-body"><p>{{ text }}</p></div>
    </li>

</script>