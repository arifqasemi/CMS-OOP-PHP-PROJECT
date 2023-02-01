<?php
 include("includes/header.php");
if(!$session->signed_in()){ redirect('./includes/users.php');}


if(empty($_GET['user_id'])){
    redirect('../admin/users.php');
}

$user = User::get_by_id($_GET['user_id']);
if($user){
    $user->delete();
    // $user->delete_user_photo();
    unlink('../admin/image/'.$user->user_image);
    redirect('../admin/users.php');
    $session->masseage('the user is deleted successfully!');
}else{
    redirect('../includes/users.php');


}