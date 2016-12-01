			
				<!-- Side menu -->
			    <ul id="slide-out" class="side-nav">
				    <li>
				    	<div class="userView">
				      		<div class="background">
				        		<img src="http://placehold.it/300x150">
				      		</div>
						    <a href="#!user"><img class="circle" src="http://lorempicsum.com/up/255/200/5"></a>
						    <a href="#!name"><span class="name">John Doe</span></a>
						    <a href="#!email"><span class="email">jdandturk@gmail.com</span></a>
				    	</div>
				    </li>
				    <li>
				    	<a id="edit-view" href="#!"><i class="material-icons">edit_mode</i>Edit profile</a>
				    </li>
				    <li>
				    	<div class="divider"></div>
				    </li>
				    <li>
				    	<a class="subheader">Other pages</a>
				    </li>
				    <li>
				    	<a id="rules-view" class="waves-effect" href="#!">
				    		<i class="material-icons">warning</i>
				    		Rules
				    	</a>
				    </li>
				    <li>
				    	<a id="info-view" class="waves-effect" href="#!">
				    		<i class="material-icons">info</i>
				    		Info
				    	</a>
				    </li>
				    <li>
				    	<a id="news-view" class="waves-effect" href="#!">
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
					        <a id="dashboard-view" href="#!" class="collection-item active"><i class="material-icons">home</i>Home</a>
					        <a id="team-view" href="#!" class="collection-item"><i class="material-icons">person</i>Team</a>
					        <a id="schedule-view" href="#!" class="collection-item"><i class="material-icons">assignment</i>Schedules</a>
					        <a id="info-view" href="#!" class="collection-item"><i class="material-icons">info</i>Info</a>
					        <a id="" href="#!" class="collection-item button-collapse" data-activates="slide-out">
			        			<i class="material-icons">menu</i>
			        			Menu
			        		</a>
					    </div>

	                </div>
	            </div>    
	        </div>
        </footer>
		<!-- Tiny Mce -->
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
 	    <!-- Tinymce End -->
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
		<!-- Handlebars -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.js" integrity="sha256-AunHBHi07QREz6ipU5g+CgOItzHsewdmK9Zn1WgWvyw=" crossorigin="anonymous"></script>
		<!-- MomentJS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment.js" integrity="sha256-7zrgeFEiubUoz8Fsa0TnbWWDPYTu7sZp7BJef2ayeWI=" crossorigin="anonymous"></script>
		<!-- Default js -->
		
		<script src="<?=base_url('public/js/bootstrap-material-datetimepicker.js');?>"></script>
		<script>
		var siteUrl = '<?=base_url('');?>';
		</script>

		<?php if ($this->uri->segment(1) == 'admin'){ ?>
	
		<script src="<?=base_url('public/js/admin.js');?>"></script>

		<?php }else{ ?>
		
		<script src="<?=base_url('public/js/default.js');?>"></script>

		<?php } ?>	
	

	</body>
</html>