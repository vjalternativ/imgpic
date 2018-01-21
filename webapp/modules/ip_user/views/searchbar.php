  <div class="col-md-4">
  
  <div class="form-group">
  <div class="input-group">
  <form action="/search/" method="GET" name="search">
  <input type="text" class="form-control" />
  </form>
  <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
  </div>
  </div>
  </div>
  
  
  <div class="col-md-6">
  <a href="<?php echo $sugar_config['base_url'].$_SESSION['username'];?>">
  <button type="button" class="btn btn-info pull-right">Profile</button>
  </a>
  	<a href="<?php echo $sugar_config['base_url'];?>topic/all" class="anchor-white">
	<button class="btn btn-primary pull-right" style="margin-right:5px;">Topics</button>
	</a>
	<a href="<?php echo $sugar_config['base_url'];?>category/all" class="anchor-white">
	<button class="btn btn-primary pull-right" style="margin-right:5px;">Categories</button>
	</a>
	<a href="<?php echo $sugar_config['base_url'];?>pic/recentPics" class="anchor-white">
	<button class="btn btn-primary pull-right" style="margin-right:5px;">Recent Pics</button>
	</a>
	<a href="<?php echo $sugar_config['base_url'];?>pic/popularPics" class="anchor-white"><button class="btn btn-primary pull-right" style="margin-right:5px;">Popular Pics</button></a>
	<div class="clearfix"></div>
  </div>