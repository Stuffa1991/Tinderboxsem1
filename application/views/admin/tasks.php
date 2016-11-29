<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>
	<h3>Task</h3>
	<form action="<?php  echo base_url('/admin/setTask/')?>" method="POST" role="form" id="createTasks" class="col s12">
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
				<input name="dateStart" id="dateStart" type="text">
				<label for="dateStart">Date start</label>
			</div>
			<div class="input-field col s6">
				<input name="dateEnd" id="dateEnd" type="text">
				<label for="dateEnd">Date end</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input name="memberTaskId" id="memberTaskId" type="text">
				<label for="memberTaskId">Member id</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Create Task</button>
	</form>

	<div id="taskinfo" class="col s12">
		<ul id="task-list" class="collection with-header">
			
		</ul>
	</div>
</div>


<script id="tasks" type="text/x-handlebars-template">
	
	<li class="collection-item"> {{ name }}<a href="#!" data-id="{{ id }}" class="deletePlace secondary-content"><i class="material-icons">delete</i></a></div></li>

</script>

<script id="place" type="text/x-handlebars-template">
	<select name="placeid" class="places-select">
	<option value="0" disabled selected>Place</option>
	    {{#each data}}
	    	<option value="{{ id }}">{{ name }}</option>
		{{/each}}
	</select>
</script>