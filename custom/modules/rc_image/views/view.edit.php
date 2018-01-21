<?php

class customViewEdit extends ViewEdit{

function display() {
if(empty($this->bean->id)) {

die('you can not upload image from here');
}

$this->ev->defs['templateMeta']['form']['enctype'] = 'multipart/form-data';
parent::display();
}


}
?>
