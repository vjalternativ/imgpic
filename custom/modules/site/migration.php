<?php
//Print_r($vjconfig['basepath']);
ini_set("display_errors",1);
error_reporting(E_ALL);
class demo1{

	function __construct() {
		global $db;
		
		$fields = array();
		
$table = "rc_topic";
$link = "link";
$sql = "select id,link from rc_image where ischecked=0";
		$data = array();
		
		//$result = mysqli_query($this->con,$sql) or die("Query Failed :".$sql."<br />".mysqli_error($this->con));
		if ($result = $db->query($sql)) {
			while($row=$db->fetchByAssoc($result)){
				
				$data[$row['id']] = $row['link'];
				$filename=explode('/',$row['link']);
				$filename=$filename[count($filename)-1];
				
				if($filename){
				$path='upload/images/';
				$localfilePath= $path.$filename;
				
				
				$image = file_get_contents($row['link']);
				if(file_put_contents($localfilePath, $image)) {
				
				$sql = "update rc_image set link ='".$localfilePath."' , ischecked=1 where id='".$row['id']."'";
				$db->query($sql);    
				
				}
				//$qry= 'Update '.$table.' set '.$newlink.'='.'"'.$localfilePath.'", '.$ischecked.'=1 where '.$link.'="'.$field.'"';
				//mysqli_query($this->con,$qry);
				}
				
				
			}
			
			
			
				
		}
	}		
}
	$np=new demo1();
	
	?>
