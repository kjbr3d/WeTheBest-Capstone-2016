
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
		    	<div class="navbar-header">
		        	<p class="navbar-brand">Connect U</p>
		      	</div>
		      	<ul class="nav navbar-nav">
		        	<li role="presentation"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					<li role="presentation"><a href="Scholarship.php"><span class="glyphicon glyphicon-globe"></span> Scholarships</a></li>
					<li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					      <span id = "blogs"class="glyphicon glyphicon-pencil" aria-hidden="true">Blogs</span></span><span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" id = "the_blogs">
							<li><a href = "blog/index.php?page=yourblogs">Your Blogs</a></li>
							<li><a href = "blog/index.php?page=home">All Blogs</a></li>
							<li><a href = "blog/index.php?page=timeline">Your Timeline</a></li>
							<li><a href = "blog/index.php?page=publicprofiles">Bloggers</a></li>
						</ul>
					</li>
		      	</ul>
		      	<ul class="nav navbar-nav navbar-right">
					<li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					      <span id = "my_notify"class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span><span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" id = "notification_list"></ul>
					</li>
		        	<li class = "presentation"><a href="logout.php"> <span class="glyphicon glyphicon-off"></span>Logout</a></li>
		      	</ul>
		    </div>
		</nav>
