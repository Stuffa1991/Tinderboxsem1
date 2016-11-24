<div class="row">
	<a href="<?=base_url('admin/')?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Back</a>
	
	<ul id="member-list" class="collection with-header">
		
	</ul>
</div>

<script id="members" type="x-tmpl-mustache">
	<li class="collection-item">
		<div> {{ name }} - {{ mobile }}
			<a href="#!" class="secondary-content"><i data-id="{{ id }}" class="material-icons">send</i></a>
		</div>
	</li>
</script>

