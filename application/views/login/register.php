  		
	  	<div class="row">
	  		<form action="<?php  echo base_url('/login/registerUser/')?>" method="POST" role="form" class="col s12 registerUserForm">
				<div class="row">
					<div class="input-field col s12">
						<input name="email" id="email" type="email" class="validate">
						<label for="email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input name="password" id="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
					<div class="input-field col s6">
						<input name="repeatPassword" id="repeatPassword" type="password" class="validate">
						<label for="repeatPassword">Repeat password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="name" id="name" type="text" class="validate">
						<label for="name">name</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>


