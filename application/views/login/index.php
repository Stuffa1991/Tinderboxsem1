	
		<div id="container" class="row">
			<form action="<?php echo base_url('/login/loginAjax')?>" method="POST" role="form" class="col s12 loginUserForm">
				<div class="row">
					<div class="input-field col s12">
						<input type="email" id="username" name="email" class="validate" required>
						<label for="username">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="validate" required>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<button type="submit" class="btn btn-primary center">Login</button>
					</div>
				</div>
			</form>
			<div class="col s12">
				<p>Not signed up yet? <a href="<?php echo base_url('/login/register')?>">Click here</a></p>
			</div>
		</div>