<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>

	<div id="scheduleinfo" class="col s12">
		<h3>Schedules</h3>

	<form action="<?php  echo base_url('/admin/setSchedule/')?>" method="POST" role="form" id="createSchedule" class="col s12">
		<div class="row">
			<div class="input-field col s6">
				<input name="memberScheduleId" id="memberScheduleId" type="text">
				<label for="memberScheduleId">Member id</label>
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
		<button type="submit" class="btn btn-primary">Create schedule</button>
	</form>
</div>