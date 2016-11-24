<div class="row">
<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>
	<form id="submitInfo" action="<?=base_url('admin/setinfo')?>" method="POST" role="form">
		<div class="row">
			<div class="input-field col s12">
				<select name="info">
					<option value="" selected>Choose your option</option>
					<option value="info">Info</option>
					<option value="rule">Rule</option>
					<option value="news">News</option>
					<option value="staff">Staff</option>
				</select>
			</div>

			<div class="input-field col s12">
				<input name="title" id="title" type="text" class="validate">
				<label for="title">Title</label>
			</div>

			<div class="input-field col s12">
	          	<textarea name="text" id="textarea" class="materialize-textarea validate"></textarea>
	          	<label for="textarea">Text</label>
	        </div>
	        <button type="submit" class="btn btn-primary">Submit</button>
		</div>		
	</form>
</div>