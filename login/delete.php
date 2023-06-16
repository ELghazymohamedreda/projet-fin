<?php
include 'lavageesManager.php';
 
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $lavageesManager =  new lavageDelete($id);
    $result = $lavageesManager->delete_lavage($connect);
    if($result){
        header('location:admin.php');
    }
    
}

?>