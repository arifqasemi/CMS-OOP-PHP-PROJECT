<?php require_once("includes/header.php");if(!$session->signed_in()){ redirect('./includes/login.php');

}
$photos = Photos::get_user();?>

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
            Photos
            <small>Subheading</small>
            <p class="alert-success" ><?php echo $massege;?></p>

        </h1>
       
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Size</th>
                    <th>File</th>
                    <th>Comments</th>
                </tr>
                
            </thead>
            <tbody>
                <?php foreach($photos as $photo): ?>
                <tr>
                    <td style="width:30%"><img class="img-thumbnail " style="max-width: 40%" src="<?php echo $photo->picture_path();?>" alt="">
                    <div class="picture_link">
                        <a id="user_id" class="delete-btn" href="../admin/delete_photo.php?photo_id=<?php echo $photo->id;?>">Delete</a>
                        <a href="../photo.php?photo_id=<?php echo $photo->id;?>">View</a>
                        <a href="../admin/edite_photo.php?photo_id=<?php echo $photo->id;?>">Edit</a>
                    </div>
                    </td>
                        <td><?php echo $photo->id;?></td>
                        <td><?php echo $photo->title;?></td>
                        <td><?php echo $photo->size;?></td>
                        <td><?php echo $photo->filename;?></td>
                        <td><a href="photo_comment.php?photo_id=<?php echo $photo->id?>">
                            <?php 
                        $comments = Comment::find_the_comment($photo->id);

                        echo count($comments);
                        ?></a></td>
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