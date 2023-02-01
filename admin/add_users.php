<?php include("includes/header.php"); ?>
<?php if(!$session->signed_in()){redirect("login.php");}?>
<?php


  $users = new User();
 
    if (isset($_POST['Add']))
        {
        $users->set_image($_FILES['file']);
        $users->username = $_POST['username'];
        $users->firstname = $_POST['firstname'];
        $users->lastname = $_POST['lastname'];
        $users->password = $_POST['password'];
        // $users->save();
        $users->save_user_image();
        redirect('users.php');
        $session->masseage('the user is added successfully!');
        }

?>
 
 
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
 
 
 
            <?php include("../admin/includes/top-nav.php"); ?>
 
 
 
 
 
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 
 
 
        <?php include("../admin/includes/side-nav.php"); ?>
 
 
 
        
            <!-- /.navbar-collapse -->
        </nav>
 
 
 
 
<div id="page-wrapper">


<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           Add Users
            <small>Subheading</small>
        </h1>
<form  action="" method="post" enctype="multipart/form-data">
    <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
	 <input type="file"  name="file" >
        </div>
        <div class="form-group">
        <label for="Caption">username</label>
            <input type="text" name="username" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="Caption">firstname</label>
            <input type="text" name="firstname" class="form-control" value="" >
        </div>
        <div class="form-group">
            <label for="Caption">lastname</label>
            <input type="text" name="lastname" class="form-control" value="" >
        </div>
        <div class="form-group">
            <label for="Caption">password</label>
            <input type="password" name="password" class="form-control" value="" >
        </div>
        <div class="info-box-update pull-left ">
        <input type="submit" name="Add" value="Add" class="btn btn-primary btn-lg ">
    </div>
    </div>
</form>
        </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
 
  <?php include("includes/footer.php"); ?>