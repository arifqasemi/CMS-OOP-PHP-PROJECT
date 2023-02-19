<?php
require_once("admin/includes/init.php");
 include("includes/header.php"); 

require_once "admin/includes/comment.php";

$photos = Photos::get_by_id($_GET['photo_id']);


if(isset($_POST['submit'])){
    $body = trim($_POST['body']);
    $author = trim($_POST['author']);
    
    $new_comment = Comment::create_comment($photos->id,$author,$body);
    if($new_comment && $new_comment->save()){
        redirect("photo.php?photo_id={$photos->id}");
    }

}

$comments = Comment::find_the_comment($photos->id);

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photos->title;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Arif Qasemi</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2021 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" style="width:100%;" src="admin/image/<?php echo $photos->filename;?>" >

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photos->caption;?></p>
                <p><?php echo $photos->description;?></p>


                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <?php foreach($comments as $comment):?>
                    <div class="media-body">
                        <h4 class="media-heading">
                        <?php echo $comment->author;?><small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body;?>  
                    </div>
                </div>
                 <?php endforeach;?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                 
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
          

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
