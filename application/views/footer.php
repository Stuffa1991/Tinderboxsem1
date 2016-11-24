				</div> <!-- // id container -->

				<!-- Side menu -->
			    <ul id="slide-out" class="side-nav">
				    <li><div class="userView">
				      <div class="background">
				        <img src="http://placehold.it/300x150">
				      </div>
				      <a href="#!user"><img class="circle" src="http://lorempicsum.com/up/255/200/5"></a>
				      <a href="#!name"><span class="name">John Doe</span></a>
				      <a href="#!email"><span class="email">jdandturk@gmail.com</span></a>
				    </div></li>
				    <li><a href="#!"><i class="material-icons">edit_mode</i>Edit profile</a></li>
				    <li><div class="divider"></div></li>
				    <li><a class="subheader">Other pages</a></li>
				    <li>
				    	<a class="waves-effect" href="#!">
				    		<i class="material-icons">warning</i>
				    		Rules
				    	</a>
				    </li>
				    <li>
				    	<a class="waves-effect" href="#!">
				    		<i class="material-icons">info</i>
				    		Info
				    	</a>
				    </li>
				    <li>
				    	<a class="waves-effect" href="#!">
				    		<i class="material-icons">new_releases</i>
				    		News
				    	</a>
				   	</li>
				</ul>
				<!-- // Side menu -> -->

			</div> <!-- // class container -->
		</main>

		<footer class="page-footer">
	        <div class="container">
	            <div class="row">
	              	<div class="col s12">
	                	
	              		<div class="collection">
					        <a href="#!" class="collection-item active"><i class="material-icons">home</i>Home</a>
					        <a href="#!" class="collection-item"><i class="material-icons">person</i>Team</a>
					        <a href="#!" class="collection-item"><i class="material-icons">assignment</i>Schedules</a>
					        <a href="#!" class="collection-item"><i class="material-icons">face</i>Test</a>
					        <a href="#!" class="collection-item button-collapse" data-activates="slide-out">
			        			<i class="material-icons">menu</i>
			        			Menu
			        		</a>
					    </div>

	                </div>
	            </div>    
	        </div>
        </footer>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
		<!-- Moustache -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js" integrity="sha256-iaqfO5ue0VbSGcEiQn+OeXxnxAMK2+QgHXIDA5bWtGI=" crossorigin="anonymous"></script>
		<!-- Default js -->
		<script src="<?=base_url('public/js/default.js');?>"></script>
		

		<script id="teamleader" type="x-tmpl-mustache">
		Hello
		{{ name }} - {{ email }} - {{ phone }} - {{ mobile }}
		</script>
	</body>
</html>