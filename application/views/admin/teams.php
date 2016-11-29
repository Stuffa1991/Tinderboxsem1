<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>
	<a href="#" id="add-team" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Create Team</a>

	<div class="teams">
		<div id="teaminfo" class="col s12">

			<h3>Teams</h3>

			<ul id="team-list" class="collapsible" data-collapsible="accordion"></ul>

		</div>
	</div>

	<div class="insertTeams hide">
		<form action="<?php  echo base_url('/admin/setTeam/')?>" method="POST" role="form" id="createTeam" class="col s12">
			<div class="row">
				<div class="input-field col s6">
					<input name="name" id="name" type="text">
					<label for="name">Name</label>
				</div>
				<div class="input-field col s6 places">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input name="teamleader" id="teamleader" type="text">
					<label for="teamleader">Team leader id</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Create Task</button>
		</form>
	</div>
</div>

<script id="teamlist" type="text/x-handlebars-template">
	<li class="collection-item">
		<div> {{ name }}
			<a href="#!" class="secondary-content"><i data-id="{{ id }}" class="material-icons">send</i></a>
		</div>
	</li>
</script>

<script id="team" type="text/x-handlebars-template">
	<li id="team-list">
      <div class="collapsible-header">{{ name }}</div>
      <div class="collapsible-body">{{ name }}</div>
    </li>
</script>