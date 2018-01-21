<div class="text-center">
<ul class = "pagination pagination-lg">
<?php if($_REQUEST['prevurl']!='#') { ?>
   <li class = "previous"><a href = "<?php echo $_REQUEST['prevurl'];?>">&larr; Prev</a></li>
   <?php } 
   
   foreach($_REQUEST['pagelist'] as $page) {
   ?>
   <li class="<?php if($_REQUEST['page']==$page || $_REQUEST['pageindex']==$page) echo 'active';?>"><a href = "<?php echo $_REQUEST['pagingurl'].$page;?>"><?php echo $page;?></a></li>
   <?php
   
   
   }
   if($_REQUEST['nexturl']!='#') {
   ?>
   <li class = "next"><a href = "<?php echo $_REQUEST['nexturl'];?>">Next &rarr;</a></li>
<?php } ?>
</ul>
</div>