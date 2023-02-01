<?php
 include("includes/header.php");
if(!$session->signed_in()){ redirect('./includes/photo.php');}


if(empty($_GET['photo_id'])){
    redirect('../admin/photo.php');
}

$photo = Photos::get_by_id($_GET['photo_id']);
if($photo){
    $photo->delete_photo();
    $session->masseage("the {$photo->filename} is deleted successfully!");
    redirect('../admin/photo.php');

}else{
    redirect('../includes/photo.php');


}