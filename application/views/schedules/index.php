

<script id="schedulesview" type="text/x-handlebars-template">
	<div class="container">
		<div class="row">
			<div class="col s12 schedule-tab">
				<ul class="tabs">
					<li class="tab col s6"><a class="active" id="7daystab" href="#7days">Next 7 days</a></li>
					<li class="tab col s6"><a href="#30days">Next 30 days</a></li>
				</ul>
			</div>
			<div class="col s12" id="7days">
				{{#each data}}
					<div class="row card-panel schedule-farver">
						<div class="col s6"> {{ day }}</div>
						<div class="col s6 right-align">{{ fromtime }}</div>
					</div>
				{{/each}}
			</div>
			<div class="col s12" id="30days">
				
			</div>
		</div>
	</div>
</script>

<script id="schedulesmonth" type="text/x-handlebars-template">
	{{#each data}}
		<div class="row card-month schedule-farver">
			<div class="col s6"> {{ day }}</div>
			<div class="col s6 right-align"> {{ fromtime }}</div>
		</div>
	{{/each}}
</script>