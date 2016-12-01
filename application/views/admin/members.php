<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
	
	<div class="col s12 schedule-tab">
		<ul class="tabs">
			<li class="tab col s6"><a class="active" href="#seemembers">Members</a></li>
			<li class="tab col s6"><a href="#seepending">Pending</a></li>
		</ul>
	</div>
	
	<div id="seemembers" class="col s12">
		<ul id="member-list" class="collection with-header"></ul>
	</div>

	<div id="seepending" class="col s12">
		<ul id="pending-member-list" class="collapsible" data-collapsible="accordion"></ul>
	</div>
	
</div>

<script id="memberinfo" type="text/x-handlebars-template">
	<div class="userView">
      	<div class="background">
        	<img src="http://placehold.it/300x150">
      	</div>
      	<a href="#!user"><img class="circle" src="http://lorempicsum.com/up/255/200/5"></a>
      	<a href="#!name"><span class="name">{{ name }}</span></a>
      	<a href="#!email"><span class="email">jdandturk@gmail.com</span></a>
    </div>
</script>	

<script id="pending-members" type="text/x-handlebars-template">
	<li>
      <div class="collapsible-header">{{ name }} <i class="material-icons right">arrow_drop_down</i></div>
      	<div class="collapsible-body">
      		<div class="member-options">
      			<a href="#" id="accept-member" data-memberid="{{ id }}"><i class="material-icons">done</i>Accept</a>
      		</div>
      		<div class="member-options">
      			<a href="#" id="decline-member" data-memberid="{{ id }}"><i class="material-icons">clear</i>Decline</a>
      		</div>
      		<div class="member-options">
      			<a href="#" id="get-member-info" data-memberid="{{ id }}"><i class="material-icons">info</i>Info</a>
      		</div>
      	</div>
    </li>
</script>

<script id="members" type="text/x-handlebars-template">
	<li class="collection-item">
		<div> {{ name }} - {{ mobile }}
			<a href="#!" class="secondary-content"><i data-id="{{ id }}" class="material-icons">send</i></a>
		</div>
	</li>
</script>

<script>

	$(document).ready(function($) {
		
	});

</script>