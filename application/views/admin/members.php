<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
	
	<div id="profile-info"></div>

	<h3>Pending members</h3>
	<ul id="pending-member-list" class="collapsible" data-collapsible="accordion"></ul>

	<h3>Members</h3>
	<ul id="member-list" class="collection with-header"></ul>
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
      <div class="collapsible-header">{{ name }}</div>
      	<div class="collapsible-body">
      		<a href="#" id="accept-member" data-memberid="{{ id }}"><i class="material-icons">done</i>Accept</a>
      		<a href="#" id="decline-member" data-memberid="{{ id }}"><i class="material-icons">clear</i>Decline</a>
      		<a href="#" id="get-member-info" data-memberid="{{ id }}"><i class="material-icons">info</i>Info</a>
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