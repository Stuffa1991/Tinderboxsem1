<script id="rulesview" type="text/x-handlebars-template">

	<div class="row">
				
		<h4>Rules</h4>

		<div>
			<ul id="rules-list" class="collapsible" data-collapsible="accordion"></ul>
		</div>

	</div>

</script>
	
<script id="rules" type="text/x-handlebars-template">
    <li>
      <div class="collapsible-header">{{ title }}</div>
      <div class="collapsible-body"><p>{{ text }}</p></div>
    </li>
</script>