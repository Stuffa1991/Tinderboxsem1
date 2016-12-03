<script id="infoview" type="text/x-handlebars-template">

	<div class="row">
				
		<h4>Info</h4>

		<div>
			<ul id="info-list" class="collapsible" data-collapsible="accordion"></ul>
		</div>

	</div>

</script>
	
<script id="info" type="text/x-handlebars-template">
    <li>
      <div class="collapsible-header"><div class="left"><i class="tiny material-icons">keyboard_arrow_down</i></div>{{ title }}</div>
      <div class="collapsible-body"><p>{{ text }}</p></div>
    </li>
</script>