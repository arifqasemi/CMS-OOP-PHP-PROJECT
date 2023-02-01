<?php  require_once("init.php");?>
<?php

$user = new User();

if(isset($_POST['Register'])){
   $user->username =trim($_POST['username']);
    $user->firstname = trim($_POST['firstname']);
    $user->lastname =trim ($_POST['lastname']);
    $user->password = trim($_POST['password']);
    if($user->save()){
     
        redirect('login.php');
        $session->masseage('your account created successfully!');
    }

}


$username ='';
$password ='';
$firstname ='';
$lastname = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="javascript">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Sign in</title>
</head>
<body>

<div class="container mt-5 pt-6">

<div class="row">

<div class="col-12 col-ms-8 col-md-6 m-auto">

<form  action="" method="post" enctype="multipart/form-data">
    <div class=" ">
        <div class="form-group">
            <label for="password">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
            
        </div>
        <div class="form-group">
            <label for="password">Firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo htmlentities($firstname); ?>">
            
        </div>
        <div class="form-group">
            <label for="password">Lastname</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo htmlentities($lastname); ?>">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
            
        </div>
        <div class="info-box-update pull-left ">
        <input type="submit" name="Register" value="Register" class="btn btn-primary btn-lg ">
    </div>
    </div>
</form>

</div>
</div>

</body>
</html>


