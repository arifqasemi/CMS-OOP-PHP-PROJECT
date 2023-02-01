<?php
include "init.php";


$user = new User();


if(isset($_POST['image_name'])){

    $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);


}



if(isset($_POST['photo_id'])){
    Photos::display_sidebar_details($_POST['photo_id']);

    // $user->ajax_save_user_image($_POST['photo_id']);


}