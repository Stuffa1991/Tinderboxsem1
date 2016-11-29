<script id="teamlist" type="text/x-handlebars-template">

	<div class="row">
		<div class="col s12">
				
			<h4>Team</h4>

			<div>
				<ul id="team-list" class="collection with-header"></ul>
			</div>

		</div>
	</div>

</script>

<script id="team" type="text/x-handlebars-template">
	
	<li class="collection-item">
		<div>
			<a class="memberinfo" data-member-id="{{ memberid }}">{{ name }}<i class="material-icons secondary-content">keyboard_arrow_right</i></a>
		</div>
	</li>
 
</script>

