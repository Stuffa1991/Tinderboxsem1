		<?php if($this->session->memberid && $this->uri->segment(1) != 'admin') { ?>
				<!-- Side menu -->
			    <ul id="slide-out" class="side-nav">
				    <li>
				    	<div class="userView">
				      		<div class="background">
				        		<img src="http://placehold.it/300x150">
				      		</div>
						    <a href="#!user"><img class="circle" src="http://lorempicsum.com/up/255/200/5"></a>
						    <a href="#!">
						    	<span class="name"><?=$this->session->name;?></span>
						    </a>
						    <a href="#!">
						    	<span class="email"><?=$this->session->email;?></span>
						    </a>
				    	</div>
				    </li>
				    <li>
				    	<a id="edit-view" href="#!"><i class="material-icons">edit_mode</i>Edit profile</a>
				    </li>
				    <li>
				    	<div class="divider"></div>
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

					<?php if($this->session->role == 'admin') { ?>

						<li>
					    	<div class="divider"></div>
					    </li>
						<li>
					    	<a id="logout" class="waves-effect" href="<?= base_url() .'admin';?>">
					    		<i class="material-icons">settings</i>
					    		Admin panel
					    	</a>
					   	</li>	

					<?php } ?>

				   	<li>
				    	<div class="divider"></div>
				    </li>
				    <li>
				    	<a id="logout" class="waves-effect" href="<?= base_url() .'login/logout';?>">
				    		<i class="material-icons">exit_to_app</i>
				    		Log out
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
						        <a id="dashboard-view" href="#!" class="collection-item waves-effect waves-light active"><i class="material-icons">home</i><p>Home</p></a>
						        <a id="team-view" href="#!" class="collection-item waves-effect waves-light"><i class="material-icons">person</i><p>Team</p></a>
						        <a id="schedule-view" href="#!" class="collection-item waves-effect waves-light"><i class="material-icons">assignment</i><p>Schedules</p></a>
						        <a id="info-view" href="#!" class="collection-item waves-effect waves-light"><i class="material-icons">message</i><p>Messages</p></a>
						        <a id="sidenav-view" href="#!" class="collection-item button-collapse" data-activates="slide-out">
				        			<i class="material-icons">menu</i>
				        			<p>Menu</p>
				        		</a>
						    </div>

		                </div>
		            </div>    
		        </div>
	        </footer>
        	
		<?php } ?>

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
		
		<?php if ($this->uri->segment(2) == 'schedules'){ ?>
			<!--  Load admin function for schedules-->
			<script>

			$(document).ready(function($) {
				loadSchedulesView(siteUrl);
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'members'){ ?>
			<!--  Load admin function for members-->
			<script>

			$(document).ready(function($) {
				loadMembersView(siteUrl);
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'teams'){ ?>
			<!--  Load admin function for teams-->
			<script>

			$(document).ready(function($) {
				loadTeamsView(siteUrl);
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'tasks'){ ?>
			<!--  Load admin function for tasks-->
			<script>

			$(document).ready(function($) {
				loadTaskView(siteUrl);
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'places'){ ?>
			<!--  Load admin function for Places-->
			<script>

			$(document).ready(function($) {
				loadPlaceView(siteUrl);
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'dashboard'){ ?>
			<!--  Load function for dashboard-->
			<script>

			$(document).ready(function($) {
				loadDashboardOnLoad(siteUrl);
				document.title = 'Dashboard';
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(1) == 'login' || $this->uri->segment(1) == ''){ ?>
			<!--  Load function for login-->
			<script>

			$(document).ready(function($) {
				hideLoad();
				document.title = 'Login';
			});

			</script>
		<?php } ?>

		<?php if ($this->uri->segment(2) == 'register' && $this->uri->segment(1) == 'login'){ ?>
			<!--  Load function for login-->
			<script>

			$(document).ready(function($) {
				hideLoad();
				document.title = 'Register';
			});

			</script>
		<?php } ?>
	</body>
</html>