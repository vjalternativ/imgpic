<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php 
  if(isset($_REQUEST['meta-title']) && $_REQUEST['meta-title']!="") {
  echo $_REQUEST['meta-title'];
  } ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php 
  if(isset($_REQUEST['meta-title']) && $_REQUEST['meta-title']!="") {
  ?>
<meta name="title" content="<?php echo $_REQUEST['meta-title'];?>">
<?php } ?>
  
  <?php 
  if(isset($_REQUEST['meta-desc']) && $_REQUEST['meta-desc']!="") {
  ?>
<meta name="description" content="<?php echo $_REQUEST['meta-desc'];?>">
<?php } 

if(isset($_REQUEST['meta-image'])) {
global $sugar_config;
?>

<meta property="og:image" content="<?php echo $sugar_cofig['site_url'].$_REQUEST['meta-image'];?>" />

 <?php 
 }
 
  if(isset($_REQUEST['meta-keywords']) && $_REQUEST['meta-keywords']!="") {
  ?>
<meta name="keywords" content="<?php echo $_REQUEST['meta-keywords'];?>">
<?php } 


?>


  <link rel="stylesheet" href="<?php echo $sugar_config['http_base_url'];?>webapp/style/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $sugar_config['http_base_url'];?>custom/include/font-awesome/css/font-awesome.min.css">
  
<link rel="stylesheet" href="<?php echo $sugar_config['base_url'];?>webapp/style/custom.css">
<script>
var base_url = '<?php echo $sugar_config['base_url'];?>';
<?php if(isset($_SESSION['username'])) {
?>
var sessionusername = '<?php echo $_SESSION['username'];?>';
<?php
}
?>
</script>


<link rel="icon" type="image/png"   href="<?php echo $sugar_config['base_url'];?>webapp/img/favicon.ico">


</head>
<body style="background:#E6E6E6">
<br />
<br />

