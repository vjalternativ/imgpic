<?php

class customViewDetail extends ViewDetail{

function display() {
if($this->bean->link != '') { 
$this->bean->link = '<a href="'.$this->bean->link.'" target="_blank">'.$this->bean->link.'</a>';
}
parent::display();
}


}
?>