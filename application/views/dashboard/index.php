<script id="dashboard" type="text/x-handlebars-template">
	<div class="row">
		<div class="col s12">
			
			<div id="teamleader-info"></div>
			
			<div>
				<h4>Schedules</h4>
				<ul id="schedules-info" class="collection"></ul>
			</div>
			
			<div>
				<h4>News</h4>
				<ul id="news-info" class="collection"></ul>
			</div>

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
	    		<p>Team leader - {{ name }}</p>
	      		<p>{{ email }} - {{ mobile }}</p>
	   		</div>
	  	</div>
	</div>
</script>

<script id="schedules" type="text/x-handlebars-template">
	
	<li class="collection-item">{{ fromtime }} - {{ totime }}</li>

</script>

<script id="news" type="text/x-handlebars-template">
	
	<li class="collection-item">{{ title }}</li>

</script>