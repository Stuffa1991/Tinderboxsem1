<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>
	
	<a href="#" id="add-team" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Create Team</a>
	
	<div id="teaminfo" class="col s12">

		<h3>Teams</h3>

		<ul id="team-list" class="collapsible" data-collapsible="accordion"></ul>

	</div>
	

</div>

<script id="teamlist" type="x-tmpl-mustache">
	<li class="collection-item">
		<div> {{ name }}
			<a href="#!" class="secondary-content"><i data-id="{{ id }}" class="material-icons">send</i></a>
		</div>
	</li>
</script>

<script id="addteam" type="x-tmpl-mustache">
	<form id="submitTeam" action="<?=base_url('admin/setteam')?>" method="POST" role="form">
		<div class="row">
		
			<div class="input-field col s12">
				<input name="name" id="name" type="text" class="validate">
				<label for="name">Name</label>
			</div>

			<div class="input-field col s12">
				<select name="teamleader" id="teamleaders-select"></select>
			</div>

	        <button type="submit" class="btn btn-primary">Submit</button>
		</div>		
	</form>
</script>

<script id="teamleaders" type="x-tmpl-mustache">
	<option value="{{ teamleaderid }}">{{ name }}</option>
</script>

<script id="team" type="x-tmpl-mustache">
	<li id="team-list">
      <div class="collapsible-header">{{ name }}</div>
      <div class="collapsible-body">{{ name }}</div>
    </li>
</script>