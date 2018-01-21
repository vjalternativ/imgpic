<?php

class customViewDetail extends ViewDetail{

function display() {
if($this->bean->filename != '') { 
$this->bean->filename = '<a href="'.$this->bean->filename.'" target="_blank">'.$this->bean->filename.'</a>';
}
parent::display();
}


}
?>