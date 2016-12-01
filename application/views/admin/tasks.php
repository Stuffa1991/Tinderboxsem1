<div class="row taskPage">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>

	<div class="col s12 schedule-tab">
		<ul class="tabs">
			<li class="tab col s6"><a class="active" href="#taskinfo">Task</a></li>
			<li class="tab col s6"><a href="#settask">Create task</a></li>
		</ul>
	</div>
	
	<div id="taskinfo" class="col s12">
		<ul id="task-list" class="collection with-header">

		</ul>
	</div>

	<div id="settask" class="col s12">
		<form action="<?php  echo base_url('/admin/setTask/')?>" method="POST" role="form" id="createTasks" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input name="name" id="name" type="text">
					<label for="name">Name</label>
				</div>

				<div class="input-field col s12 places">
				</div>
			
				<div class="input-field col s12">
					<input name="dateStart" id="dateStart" type="text">
					<label for="dateStart">Date start</label>
				</div>
				<div class="input-field col s12">
					<input name="dateEnd" id="dateEnd" type="text">
					<label for="dateEnd">Date end</label>
				</div>
			
				<div class="input-field col s12">
					<input name="memberTaskId" id="memberTaskId" type="text">
					<label for="memberTaskId">Member id</label>
				
				
				<button type="submit" class="btn btn-primary">Create Task</button>
				
			</div>	
			
		</form>
	</div>
</div>

<script id="tasks" type="text/x-handlebars-template">
	{{#each data}}
	<li class="collection-item"> {{ name }}
		<a href="#!" data-id="{{ id }}" class="deleteTask secondary-content">
			<i class="material-icons">delete</i>
		</a>
	</li>
	{{/each}}
</script>