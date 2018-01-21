<form class="standardForm darkWall" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/signup">

<div class="row" style="margin:0;">  
<div class="col-md-4 col-md-offset-4">

<div class="panel panel-info">
  <div class="panel-heading"><span class="h2" style="color:grey"><a href="<?php echo $sugar_config['base_url'];?>"><img src="<?php echo $sugar_config['base_url'];?>webapp/img/imgpiclogo.jpg" width="100" /></a></span>
  <button class="btn btn-primary pull-right" type="button"><a href="<?php echo $sugar_config['base_url'];?>ip_user/login" class="anchor-white">Login</a></button>
  <span class="clearfix"></span>
  </div>
  <div class="panel-body">
  <div class="form-group">
  <div class="input-group">
 <button type="button" class="btn btn-primary form-control"> <a href="<?php echo $sugar_config['base_url'];?>fblogin/login" class="anchor-white">Login with Facebook</a></button>
  <span class="input-group-addon">F</span>
  
  </div>
  </div>
  
  <div class="form-group hide <?php echo $_REQUEST['block'];?>">
  <span class="form-control  input-group-addon"><?php echo $_REQUEST['error'];?></span>
  </div>
  
  <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Email</span>
  <input type="text" class="form-control" name="email" placeholder="Email" />
  </div>
  </div>
  
  
 
  <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Username</span>
  <input type="text" name="username" class="form-control" placeholder="Username" />
  </div>
  </div>
  <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Password</span>
  <input type="password" class="form-control" name="password" placeholder="Password" />
  </div>
  </div>
  
  
   <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Gender</span>
  <span class="input-group-addon"><input type="radio" value="male" checked="checked" name="gender" /></span>
  <span class="input-group-addon">Male</span>
  <span class="input-group-addon"><input type="radio" value="female" name="gender" /></span>
  <span class="input-group-addon">Female</span>
  </div>
  </div>
  
  </div>
  <div class="panel-footer">
  
  <button class="btn btn-danger btn-md pull-right" type="submit">Sign Up</button>
  <span class="clearfix"></span>
  </div>
</div>

</div>

</div>

</form>