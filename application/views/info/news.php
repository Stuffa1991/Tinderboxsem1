<script id="newsview" type="text/x-handlebars-template">

	<div class="row">
				
		<h4>News</h4>

		<div>
			<ul id="news-list" class="collapsible" data-collapsible="accordion"></ul>
		</div>

	</div>

</script>
	
<script id="news" type="text/x-handlebars-template">
    <li>
      <div class="collapsible-header">{{ title }}</div>
      <div class="collapsible-body"><p>{{ text }}</p></div>
    </li>
</script>