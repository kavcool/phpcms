<nav class = "navbar navbar-inverse">
	<div class = "container-fluid">
	  <div class = "navbar-header">
	  <a href="#" class = "navbar-brand">TechTomorrow</a>	
	  </div>
		 <ul class = "nav navbar-nav">
		    <li><a href="index.php" class = "active">Home</a></li>
		    <li><a href="#" >About Us</a></li>
		    <li><a href="#">Contact Us</a></li>	
		 </ul>
		 <ul class = "nav navbar-nav navbar-right">
		 	<li><a href="register.php" ><span class = "glyphicon glyphicon-user"></span>&nbsp;Sign Up</a></li>
		 	<li><a href="login.php" ><span class = "glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
         </ul>
		 <form class="navbar-form navbar-left" action = "search.php" method = "post">
           <div class="input-group">
              <input type="text" class="form-control" name = "search" placeholder="Search">
              <div class="input-group-btn">
                 <button class="btn btn-default" type="submit">
                 <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
           </div>
         </form> 
	</div>
</nav>