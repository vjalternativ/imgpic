<?php


function alias_encode($name) {

  $string = str_replace(' ', '-', $name); // Replaces all spaces with hyphens.
  
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
return strtolower($string);

} 

function getExtension($str) 
{
$ext ="";
$array = explode('.',$str);
$count = count($array);
if($count > 1) {
$ext = $array[$count-1];
$extarray = explode('?',$ext);
$ext = $extarray[0];
}
return $ext;
}

function sendInstantMail($emailTemp) {

		$emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        $mail->setMailerForSystem();
        $mail->IsHTML(true);
        $mail->From = $defaults['email'];
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->Subject = from_html($emailTemp->subject);
       
            $mail->Body_html = from_html($emailTemp->body_html);
        //    $mail->Body = from_html($emailTemp->body);
			$mail->Body = from_html($emailTemp->body_html);
			
    	
		
		$mail->prepForOutbound();
        $hasRecipients = false;
		$mail->AddAddress($emailTemp->to);

		$result['status'] = @$mail->Send();
        if ($result['status'] == true)
        {
            $emailObj->team_id = 1;
            $emailObj->to_addrs = '';
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject ;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = null;
            $emailObj->from_addr = $mail->From;
            $emailObj->parent_type = 'User';
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = '1';
            $emailObj->created_by = '1';
            $emailObj->status = 'sent';
            $emailObj->save();
         
        }
	return $result['status'];

}


function getDomainName($str) {
$domain = "";
if($str!="") {

$string = explode('/',$str);
if(isset($string[2])) {
$domain = $string[2];
}
}

return $domain;

}


?>