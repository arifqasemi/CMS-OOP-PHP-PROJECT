<?php
 include("includes/header.php");
if(!$session->signed_in()){ redirect('./includes/photo.php');}


if(empty($_GET['comment_id'])){
    redirect('../admin/comment.php');
}

$comment = Comment::get_by_id($_GET['comment_id']);
if($comment){
    $comment->delete();
    $session->masseage("the comment with id {$comment->id} is deleted successfully!");
    redirect('../admin/comment.php');
}else{
    redirect('../includes/comment.php');


}