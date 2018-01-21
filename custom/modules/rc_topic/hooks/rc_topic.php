<?php 
require_once('custom/include/aws/aws-autoloader.php');
require_once('custom/include/utils.php');
use Aws\S3\S3Client;  
use Aws\Credentials\Credentials;

class RC_TopicHook {

function processRecord($bean,$event,$arguments) {
if($bean->filename!='') {
$bean->filename = '<a href="'.$bean->filename.'" target="_blank">Link</a>';
}
}

function afterSave($bean,$event,$arguments) {



if(!isset($bean->skip_hook) && isset($_FILES['attachment']) && $_FILES['attachment']['name']!="" && $_FILES['attachment']['error']=='0') {

//move_uploaded_file($_FILES['attachment']['tmp_name'],'upload/'.$bean->id);

global $sugar_config;


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");

/*
$bucket=$sugar_config['aws_bucket'];
$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);

$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>$sugar_config['aws_region'],'http' => ['verify' => false]));

*/
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

$filepath = "./upload/images/".$actual_image_name;

move_uploaded_file($tmp,$filepath);

$filepath = "/upload/images/".$actual_image_name;

$bean->filename  = $filepath;
$bean->skip_hook = true;
$bean->save();

}



}



}


}

}

?>
