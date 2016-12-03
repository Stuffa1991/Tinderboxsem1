  		
	  	<div id="container" class="row">
	  		<form action="<?php echo base_url('/login/registerUser/')?>" method="POST" role="form" class="col s12 registerUserForm">
				<div class="row">
					<div class="input-field col s12">
						<input name="email" id="email" type="email" class="validate" required>
						<label for="email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input name="password" id="password" type="password" class="validate" required>
						<label for="password">Password</label>
					</div>
					<div class="input-field col s6">
						<input name="repeatPassword" id="repeatPassword" type="password" class="validate" required>
						<label for="repeatPassword">Repeat password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="name" id="name" type="text" class="validate" required>
						<label for="name">name</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
			</form>
			<div class="col s12">
				<p>Return to login screen - <a href="<?php echo base_url('/login/')?>">Click here</a></p>
			</div>
		</div>


