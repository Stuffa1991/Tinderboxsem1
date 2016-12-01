<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
	
	<div class="col s12 schedule-tab">
		<ul class="tabs">
			<li class="tab col s6"><a class="active" href="#placeinfo">Places</a></li>
			<li class="tab col s6"><a href="#setplace">Create place</a></li>
		</ul>
	</div>
	
	<div id="placeinfo" class="col s12">
		<ul id="place-list" class="collection with-header"></ul>
	</div>

	<div id="setplace" class="col s12">
			<form action="<?=base_url('/admin/setPlace/')?>" method="POST" role="form" id="createPlaces" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input name="name" id="name" type="text">
					<label for="name">Name</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Create Place</button>
		</form>		
	</div>
</div>


<script id="places" type="text/x-handlebars-template">
	
	<li class="collection-item"> {{ name }}<a href="#!" data-id="{{ id }}" class="deletePlace secondary-content"><i class="material-icons">delete</i></a></div></li>

</script>

<script>

$(document).ready(function($) {
	
});

</script>