<?php include("includes/header.php");if(!$session->signed_in()){ redirect('./includes/login.php');

}
$users = User::get_user();?>

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
            Users
            <p class="alert-success" ><?php echo $massege;?></p>
        </h1>
       <a href="add_users.php"class="btn btn-primary">Add Users</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Username</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                </tr>
                
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                <td ><?php echo $user->id;?></td>
                    <td style="width:30%;" ><img class="img-thumbnail " style="height:50%;width:20%;" src="<?php echo $user->image_path_placeholder();?>" alt="">
                    <td><?php echo $user->username;?>
                        <div class="picture_link">
                            <a class="delete-btn" href="../admin/delete_user.php?user_id=<?php echo $user->id;?>">Delete</a>
                            <a href="../admin/edite_user.php?user_id=<?php echo $user->id;?>">Edit</a>
                        </div>
                    </td>
                    <td><?php echo $user->firstname;?></td>
                    <td><?php echo $user->lastname;?></td>
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