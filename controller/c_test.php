<?php
  
  if(isset($_GET['act'])){
    switch($_GET['act']){
        case 'chitiet':
            include_once('View/Home/chitietsach.php');
            break;

    }
}