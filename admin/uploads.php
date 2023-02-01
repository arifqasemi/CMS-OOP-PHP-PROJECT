<?php include("includes/header.php"); ?>

<?php
$massege="";
if(isset($_FILES['file'])){
   
    $photo = new Photos();
    // $photo->user_id = $_SESSION['user_id'];
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);
    if($photo->save()){
        $massege = "Photo was successfully uploaded";
    }else{
        // $massege = join('<br>',$photo->error);
    }
}
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
            Uploads
            <small>Subheading</small>
        </h1>

<!-- form Heading -->

<div class="row">
<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $massege; ?></h4>	
<form id="login-id" action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<input type="text" class="form-control" name="title" value="" placeholder="Image title">

</div>

<div class="form-group">
	<input type="file"  name="file" >
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Upload" class="btn btn-primary">

</div>


</form>

</div>
</div>
<!-- <div class="row">
    <div class="col-lg-12">
        <form action="upload.php" class="dropzone">

        </form>
    </div>
</div> -->
<!-- form footer -->

    </div>
</div>
<!-- /.row -->

</div>
         
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>