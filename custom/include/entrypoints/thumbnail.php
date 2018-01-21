<?php 

class ThumbnailGenerator {
	
	function getImages() {
		global $db;
		
		$sql = "select id,link from rc_image where deleted=0 and  link is not null and thumbnail is null order by totalviews desc limit 100";
		$qry = $db->query($sql);
		$rows = array();
		while($row = $db->fetchByAssoc($qry)) {
			$rows[$row['id']] = $row['link'];
		}
		return $rows;
	}
	
	function process() {
		global $db;		 
		$images = $this->getImages();
		foreach($images as $id=>$link) {
				$link = substr($link,1);
				$thumb  =  $this->createThumbnail($link);
				$thumb = '/'.$thumb;
				$sql  ="update rc_image set thumbnail='".$thumb."' where id='".$id."'";
				$db->query($sql);
		
		}
		
	}
	/*
	function generateThumbnail($img, $width=100, $height=50, $quality = 90)
	{
		if (is_file($img)) {
			$imagick = new Imagick(realpath($img));
			$imagick->setImageFormat('jpeg');
			$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
			$imagick->setImageCompressionQuality($quality);
			$imagick->thumbnailImage($width, $height, false, false);
			$filename_no_ext = reset(explode('.', $img));
			if (file_put_contents($filename_no_ext . '_thumb' . '.jpg', $imagick) === false) {
				throw new Exception("Could not put contents.");
			}
			return $filename_no_ext."_thumb.jpg";
		}
		else {
			throw new Exception("No valid image provided with {$img}.");
		}
	}
	*/
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

$thumb = new ThumbnailGenerator();
$thumb->process();
?>
