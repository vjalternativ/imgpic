<?php 
require_once('custom/include/aws/aws-autoloader.php');
require_once('custom/include/utils.php');
use Aws\S3\S3Client;  
use Aws\Credentials\Credentials;

class RC_ImageHook {

function processRecord($bean,$event,$arguments) {
if($bean->link!='') {
$bean->link = '<a href="'.$bean->link.'" target="_blank">Link</a>';
}

if($bean->name == "" && $bean->description=="") {
$bean->name= "No Name";
} else if($bean->name =="") {
$bean->name=substr($bean->description,0,15)."..";
}





}


function afterDelete($bean,$event,$arguments) {
        $link  = substr($bean->link,1);
        unlink($link);        
}

function afterSaveold($bean,$event,$arguments) {



if(!isset($bean->skip_hook) && isset($_FILES['attachment']) && $_FILES['attachment']['name']!="" && $_FILES['attachment']['error']=='0') {

//move_uploaded_file($_FILES['attachment']['tmp_name'],'upload/'.$bean->id);

global $sugar_config;


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
$bucket=$sugar_config['aws_bucket'];
#$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);

#$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>$sugar_config['aws_region'],'http' => ['verify' => false]));


$name = $_FILES['attachment']['name'];
$size = $_FILES['attachment']['size'];
$tmp = $_FILES['attachment']['tmp_name'];
$ext = getExtension($name);

if(in_array($ext,$valid_formats))
{
// File size validation
if($size<(1024*1024))
{

$actual_image_name = $bean->id.".".$ext;

move_uploaded_file($tmp,'/upload/images/'.$actual_image_name);

/*
$result = $s3Client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $actual_image_name,
    'SourceFile'   => $tmp,
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    
));
*/
#$bean->link  = $result['ObjectURL'];
$bean->link  = '/upload/images/'.$actual_image_name;
$bean->skip_hook = true;
$bean->save();

}



}



}


}

}

?>
