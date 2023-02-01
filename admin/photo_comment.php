<?php include("includes/header.php");if(!$session->signed_in()){ redirect('./includes/login.php');

}

if(empty($_GET['photo_id'])){
    redirect("photo.php");
}

$comments = Comment::find_the_comment($_GET['photo_id']);
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Visite Home Page</a>
            </div>
            <!-- Top Menu Items -->
            <?php include("includes/top-nav.php"); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side-nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">


        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Photo Comments
            
        </h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Body</th>
                 
                </tr>
                
            </thead>
            <tbody>
                <?php foreach($comments as $comment): ?>
                <tr>
                <td><?php echo $comment->id;?>
                    <td><?php echo $comment->author;?>
                        <div class="picture_link">
                            <a href="../admin/delete_comment.php?comment_id=<?php echo $comment->id;?>">Delete</a>
                        </div>
                    </td>
                    <td><?php echo $comment->body;?></td>
             </tr>
             <?php endforeach;?>
            </tbody>
        </table>



    </div>
</div>
<!-- /.row -->

</div>
         
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>