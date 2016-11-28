<div class="row">
	<div class="col s12">
		
		<div id="teamleader-info"></div>

		<div>
			<ul id="schedules-info" class="collection"></ul>
		</div>

		<div>
			<ul id="news-info" class="collection"></ul>
		</div>

	</div>
</div>	

<script id="teamleader" type="x-tmpl-mustache">
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

<script id="schedules" type="x-tmpl-mustache">
	
	<li class="collection-item">Alvin</li>

</script>

<script id="news" type="x-tmpl-mustache">
	
	<li class="collection-item"> {{ title }} </li>

</script>