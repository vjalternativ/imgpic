<?php phpinfo();die;?>
<form name="xyz" method="post" enctype="multipart/form-data" >

<input type="file" name="attachment" />
<input type="submit" name="submit" value="go" />
</form>

<?php
require_once 'custom/include/utils.php';
require_once('custom/include/aws/aws-autoloader.php');
require_once('config_override.php');
use Aws\S3\S3Client;  
use Aws\Credentials\Credentials;
if(isset($_FILES['attachment']) && $_FILES['attachment']['name']!="" && $_FILES['attachment']['error']=='0') {
global $sugar_config;


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
$bucket=$sugar_config['aws_bucket'];
$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);

$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>'ap-south-1','http' => ['verify' => false]));


$name = $_FILES['attachment']['name'];
$size = $_FILES['attachment']['size'];
$tmp = $_FILES['attachment']['tmp_name'];
$ext = getExtension($name);
$id="12";
if(in_array($ext,$valid_formats))
{

// File size validation
if($size<(1024*1024))
{
$actual_image_name = $id.".".$ext;
echo $tmp;

$result = $s3Client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $actual_image_name,
    'SourceFile'   => $tmp,
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    
));
echo "<pre>";
print_r($result['ObjectURL']);
die("vj");
return $result['ObjectURL'];
}

}


}

?>
