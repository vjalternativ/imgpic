<form class="standardForm darkWall" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/login" >

<div class="row" style="margin:0;">  
<div class="col-md-4 col-md-offset-4">

<div class="panel panel-info">
  <div class="panel-heading"><span class="h2" style="color:grey"><a href="<?php echo $sugar_config['base_url'];?>"><img src="<?php echo $sugar_config['base_url'];?>webapp/img/imgpiclogo.jpg" width="100" /></a></span>

  <span class="clearfix"></span>
  </div>
  <div class="panel-body">
  <div class="form-group">
  <div class="input-group">
  <a href="<?php echo $sugar_config['base_url'];?>fblogin/login" class="anchor-white">
 <button type="button" class="btn btn-primary form-control">Login with Facebook</button>
  </a>
  <span class="input-group-addon">F</span>
  
  </div>
  </div>
  
  <div class="form-group hide <?php echo $_REQUEST['block'];?>">
  <span class="form-control  input-group-addon"><?php echo $_REQUEST['error'];?></span>
  </div>
  
  <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Email</span>
  <input type="text" class="form-control" name="username_or_email" placeholder="Email" />
  </div>
  </div>
  
  
 
  
  <div class="form-group">
  <div class="input-group">
  <span class="input-group-addon">Password</span>
  <input type="password" class="form-control" name="password" placeholder="Password" />
  </div>
  </div>
  
  
   
  
  </div>
  <div class="panel-footer">
  <a href="<?php echo $sugar_config['base_url'];?>ipuser/password" class="forgotPassword">Forgotten your password?</a>
  <button class="btn btn-danger btn-md pull-right" type="submit">Login</button>
  <span class="clearfix"></span>
  </div>
</div>

</div>

</div>

</form>




