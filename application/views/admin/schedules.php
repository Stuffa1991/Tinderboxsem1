<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
	
	<div class="col s12 schedule-tab">
		<ul class="tabs">
			<li class="tab col s6"><a class="active" href="#scheduleinfo">Schedules</a></li>
			<li class="tab col s6"><a href="#setschedules">Create schedules</a></li>
		</ul>
	</div>

	<div id="scheduleinfo" class="col s12"></div>

	<div id="setschedules" class="col s12">
		
		<form action="<?php  echo base_url('/admin/setSchedule/')?>" method="POST" role="form" id="createSchedule" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input name="memberScheduleId" id="memberScheduleId" type="text">
					<label for="memberScheduleId">Member id</label>
				</div>
			
				<div class="input-field col s12">
					<input name="dateStart" id="dateStart" type="text">
					<label for="dateStart">Date start</label>
				</div>
				
				<div class="input-field col s12">
					<input name="dateEnd" id="dateEnd" type="text">
					<label for="dateEnd">Date end</label>
				</div>

				<button type="submit" class="btn btn-primary">Create schedule</button>
			</div>
			
		</form>
	</div>
		

	
</div>