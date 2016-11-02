		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form action="/tinderbox/login/index" method="POST" role="form">
						<legend>Form title</legend>
						<?php echo validation_errors(); ?>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="email" placeholder="Input field" required autofocus>
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Input field" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>


