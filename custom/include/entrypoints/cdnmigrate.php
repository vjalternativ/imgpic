<?php 

class CDNMigrate {
	
	function getImages() {
		global $db;
		
		$sql = "select id,link,thumbnail from rc_image left join cdnsync on id=imgid where deleted=0  and  link is not null and thumbnail is not null and imgid is null order by totalviews desc limit 50";
		
		$qry = $db->query($sql);
		$rows = array();
		while($row = $db->fetchByAssoc($qry)) {
			$rows[$row['id']] = $row;
		}
		return $rows;
	}
	
	function process() {
		global $db;		 
		$images = $this->getImages();
		
		foreach($images as $id=>$info) {
				$link = $info['link'];
				$thumb  = $info['thumbnail'];
				$path = $_SERVER["DOCUMENT_ROOT"].$link;
				$tpath = $_SERVER["DOCUMENT_ROOT"].$thumb;
				$url =  'https://www.imgpic.a2hosted.com/upload.php';
				$res = shell_exec("curl -X POST -F 'imgpic_image=@".$path."' ".$url);
				$resp = json_decode($res,1);
				if($resp['status'] ==1) {
				    $lurl = "https://www.imgpic.a2hosted.com/uploads/".$resp['name'];
				$res = shell_exec("curl -X POST -F 'imgpic_image=@".$tpath."' ".$url);
				$resp = json_decode($res,1);
				$and = "";
				if($resp['status'] ==1) {
				    $turl = "https://www.imgpic.a2hosted.com/uploads/".$resp['name'];
				    $and = ",thumbnail='".$turl."' ";
				    
				}
				$sql  ="update rc_image set link='".$lurl."' ".$and." where id='".$id."'";
				
				$db->query($sql);
				$sql = "insert into cdnsync values('".$id."')";
				$db->query($sql);
				
				
			}
				
		
		}
		
	}
	
	function createThumbnail($filename) {
		
		$filename_no_ext = reset(explode('.', $filename));
		$thumb = $filename_no_ext. '_thumb.jpg';
		if(preg_match('/[.](jpg)$/', $filename)) {
			$im = imagecreatefromjpeg( $filename);
		} else if (preg_match('/[.](gif)$/', $filename)) {
			$im = imagecreatefromgif( $filename);
			$thumb = $filename_no_ext. '_thumb.gif';
		} else if (preg_match('/[.](png)$/', $filename)) {
			$im = imagecreatefrompng( $filename);
			$thumb = $filename_no_ext. '_thumb.png';
		}
		$ox = imagesx($im);
		$oy = imagesy($im);
		$final_width_of_image = 211;
		$nx = $final_width_of_image;
		$ny = floor($oy * ($final_width_of_image / $ox));
		
		$nm = imagecreatetruecolor($nx, $ny);
		
		imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
		
		
		
		imagejpeg($nm, $thumb);
		return $thumb;
	}
	
}

$thumb = new CDNMigrate();
$thumb->process();
?>
