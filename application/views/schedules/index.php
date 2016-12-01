<script id="schedulesview" type="text/x-handlebars-template">
	<div class="container">
		<div class="row">
			<div class="col s12 schedule-tab">
				<ul class="tabs">
					<li class="tab col s6"><a class="active" id="7daystab" href="#7days">Next 7 days</a></li>
					<li class="tab col s6"><a href="#30days">Next 30 days</a></li>
				</ul>
			</div>
			<div id="7days" class="col s12 schedules-days">
				{{#each data}}
					<div class="row card-panel">
						<div class="col s2"> {{ day }}</div>
						<div class="col s10 right-align">{{ fromtime }} - {{ totime }}</div>
					</div>
				{{/each}}
			</div>
			<div id="30days" class="col s12 schedules-days" >
				
			</div>
		</div>
	</div>
</script>

<script id="schedulesmonth" type="text/x-handlebars-template">
	{{#each data}}
		<div class="row card-month">
			<div class="col s2"> {{ day }}</div>
			<div class="col s10 right-align"> {{ fromtime }}</div>
		</div>
	{{/each}}
</script>