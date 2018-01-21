<?php

class customViewEdit extends ViewEdit{

function display() {


$this->ev->defs['templateMeta']['form']['enctype'] = 'multipart/form-data';
parent::display();
}


}
?>