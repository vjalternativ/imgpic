<?php
function redirect($path) {
global $sugar_config;
header("Location:".$sugar_config['base_url'].$path);
}
function call($method, $parameters, $url = '',$printResponse=false)
    {
	global $sugar_config;
		if($url =='') {
		$url = $sugar_config['rest_url'];
		}
		//die(html_entity_decode(http_build_query($parameters)));
		
		ob_start();
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

        
$result = curl_exec($ch);

        curl_close($ch);
ob_end_flush();

$output = ob_get_clean();




 /*       ob_start();
		
        $curl_request = curl_init();
        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, http_build_query($parameters));

        $result = curl_exec($curl_request);
	*/		

        //$result = explode("\r\n\r\n", $result, 2);
		if($printResponse) {
		return $output;
		}
		
		$output = json_decode($output,1);
		return $output;
       }
	
	function loadContent($url) {
	global $sugar_config;

	$url = 'webapp/modules/'.$url;
	if(!file_exists($url)) {
	die('file not found'.$url);
	}
	require $url;
	}
function display($url) {

	$url = 'webapp/modules/'.$url;
	if(!file_exists($url)) {
	die('file not found');
	} else {
	$_REQUEST['display'][] = $url;
	}
} 





	
?>