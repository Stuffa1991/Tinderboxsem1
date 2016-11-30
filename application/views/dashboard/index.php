<script id="dashboard" type="text/x-handlebars-template">
	<div class="row">
			
		<div id="teamleader-info"></div>
		
		<div>
			<h4>Schedules</h4>
			<ul id="schedules-info" class="collection"></ul>
		</div>
		
		<div>
			<h4>News</h4>
			<ul id="news-info" class="collapsible" data-collapsible="accordion"></ul>
			    
		</div>

	</div>
</script>

<script id="teamleader" type="text/x-handlebars-template">
	<div class="card horizontal">
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

<script id="schedules" type="text/x-handlebars-template">
	
	<li class="collection-item">{{ fromtime }} - {{ totime }}</li>

</script>

<script id="staff" type="text/x-handlebars-template">
	
	<li>
      <div class="collapsible-header">{{ title }}</div>
      <div class="collapsible-body"><p>{{ text }}</p></div>
    </li>

</script>