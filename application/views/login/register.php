		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form action="<?php  echo base_url('/login/registerUser/')?>" method="POST" role="form">
						<legend>Form title</legend>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="email" placeholder="Email" required autofocus>
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							<label for="repeatPassword">Repeat Password</label>
							<input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat password" required>
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="name" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>


