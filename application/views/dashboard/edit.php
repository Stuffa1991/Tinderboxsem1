<script id="editview" type="text/x-handlebars-template">
	<div class="row">
			
		<h4>Edit profile</h4>

		<form action="<?php echo base_url('/dashboard/editMember/')?>" method="POST" role="form" class="col s12 editUserForm">
			<div class="row">
				<div class="input-field col s12">
					<input name="name" id="name" type="text" class="validate" value="{{ name }}">
					<label for="name">Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="email" id="email" type="text" class="validate" value="{{ email }}">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="phone" id="phone" type="text" class="validate" value="{{ phone }}">
					<label for="phone">Phone</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="mobile" id="mobile" type="text" class="validate" value="{{ mobile }}">
					<label for="mobile">Mobile</label>
				</div>
			</div>
			
			<div class="row">
				<div class="input-field col s12">
					<input name="password" id="password" type="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div class="input-field col s12">
					<input name="repeatPassword" id="repeatPassword" type="password" class="validate">
					<label for="repeatPassword">Repeat password</label>
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		
	</div>
</script>