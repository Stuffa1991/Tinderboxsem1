<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>

	<div id="scheduleinfo" class="col s12">
		<h3>Places</h3>

	<form action="<?php  echo base_url('/admin/setPlace/')?>" method="POST" role="form" id="createPlaces" class="col s12">
		<div class="row">
			<div class="input-field col s6">
				<input name="name" id="name" type="text">
				<label for="name">Name</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Create place</button>
	</form>
</div>