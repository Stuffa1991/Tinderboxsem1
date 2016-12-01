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
	<div id="show-teamleader" data-member-id="{{memberid}}" class="card horizontal">
	  	<div class="card-image">
	    	<img src="http://lorempicsum.com/simpsons/75/75/1">
	  	</div>
	  	<div class="card-stacked">
	    	<div class="card-content">
	    		<p>Team leader</p>
	    		<h5>{{ name }}</h5>

	    		<i class="material-icons">keyboard_arrow_right</i>
	   		</div>
	  	</div>
	</div>
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

<script id="teammemberDashboard" type="text/x-handlebars-template">
	<div class="team card">
	    <div class="team card-content">
	    	<p class="center">
	    		<img class="circle" src="http://placehold.it/120x120">
	    	</p>
	    	<div class="col s12 center">
	    		<h4>{{ name }}</h4>
	    	</div>
	      	
	      	<h5>Email: {{ email }} 
		      	<a class="btn-floating btn">
			      <i class="large material-icons">email</i>
			    </a>
			</h5>
	     	<h5>Mobile: {{ mobile }} 
	     		<a class="btn-floating btn">
			      <i class="large material-icons">phone</i>
			    </a>
	     	</h5>
	    </div>
	</div>
	<a href="#!" id="backDashboard" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
</script>