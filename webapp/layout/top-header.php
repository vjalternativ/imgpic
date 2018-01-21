<div class="row" style="margin:0;margin-auto">
<div class="col-md-10 col-md-offset-1">


<div class="panel panel-info">
  <div class="panel-heading">
  <div class="row">
  <div class="col-md-2">
  <?php
  global $sugar_config;
  $home = $sugar_config['http_base_url'];
  if(isset($_SESSION['uid'])) {
  $home .= 'ip_user/feeds';
  }
  ?>
   <span class="h2" style="color:grey"><a href="<?php echo $home;?>"><img src="<?php echo $sugar_config['base_url'];?>webapp/img/imgpiclogo.jpg" width="100" /></a></span>
   </div>
   <?php
  if(isset($_SESSION['uid'])) {
	   loadContent('ip_user/views/searchbar.php');
	   } else {
	   
	   ?>
	   <div class="col-md-10">
	<a href="<?php echo $sugar_config['base_url'];?>ip_user/regstration" class="anchor-white"><button class="btn btn-danger pull-right" style="margin-right:5px;">SignUp</button></a>
	<a href="<?php echo $sugar_config['base_url'];?>ip_user/login" class="anchor-white"><button class="btn btn-primary pull-right" style="margin-right:5px;">Login</button></a>
	
	
	<a href="<?php echo $sugar_config['base_url'];?>topic/all" class="anchor-white"><button class="btn btn-primary pull-right" style="margin-right:5px;">Topics</button></a>
	
	<a href="<?php echo $sugar_config['base_url'];?>category/all" class="anchor-white"><button class="btn btn-primary pull-right" style="margin-right:5px;">Categories</button></a>
	
	<a href="<?php echo $sugar_config['base_url'];?>pic/recentPics" class="anchor-white"><button class="btn btn-primary pull-right" style="margin-right:5px;">Recent Pics</button></a>
	
	</div>
	   <?php
	   
	   }
	   ?>
  </div>
  </div>
  <div class="panel-body">
  <div id="infobox" class="alert alert-info hide">
  <strong id="infobox-type">Info!</strong> <span id="infobox-msg">Indicates a successful or positive action.</span>
  </div>