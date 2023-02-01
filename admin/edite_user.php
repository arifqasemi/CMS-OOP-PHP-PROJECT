<?php require_once("includes/header.php");
require_once("includes/photo_library.php"); ?>
<?php if(!$session->signed_in()){redirect("login.php");}?>
<?php


  $users = User::get_by_id($_GET['user_id']);
 
  if (isset($_POST['Edite'])){
           if($users){
        $users->username = $_POST['username'];
        $users->firstname = $_POST['firstname'];
        $users->lastname = $_POST['lastname'];
        $users->password = $_POST['password'];
        // $users->save();

        if(empty($_FILES['user_image'])){
            $user->save();
        }
        else{
        // $users->save();
        $users->set_image($_FILES['user_image']);
        $users->save_user_image();
        redirect("edite_user.php?user_id=$users->id");
        }

  
           }
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
           Edite Users
            <small>Subheading</small>
        </h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
    <div class="form-group">
            <input type="file" name="user_image"  value="">
        </div>
        <div class="form-group">
        <label for="Caption">username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $users->username;?>">
        </div>
        <div class="form-group">
            <label for="Caption">firstname</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo $users->firstname;?>" >
        </div>
        <div class="form-group">
            <label for="Caption">lastname</label>
            <input type="text" name="lastname" class="form-control" value="<?php echo $users->lastname;?>" >
        </div>
        <div class="form-group">
            <label for="Caption">password</label>
            <input type="text" name="password" class="form-control" value="<?php echo $users->password;?>" >
        </div>
        <div class="info-box-update pull-left ">
      <a type="submit" name="Edite" value="Update" class="btn btn-primary btn-lg " href="users.php">Update</a>
      <a  id="user_id" value="Delete" class="btn btn-danger btn-lg" href="delete_user.php?user_id=<?php echo $users->id;?>">Delete</a>
    </div>
    </div>
</form>
<div class="col-md-4 user_imag_box">
<a href="" data-toggle="modal" data-target="#photo-library"><img class="img-thumbnail" style="width:60vh; height:46vh;" src="<?php echo $users->image_path_placeholder();?>" alt=""></a>
</div>
 </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
 
  <?php include("includes/footer.php"); ?>



 