<?php  require_once("init.php");?>
<?php

if($session->signed_in()){
    
}

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);



$user = User::verify_user( $username,$password);
    if($user){
        $session->logined($user);
        redirect('../index.php');
    }else{
        $massegealert = 'password or username is incorrect';
    }

}else{
    $username = "";
    $password ="";
    $massegealert = "";
}

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
<p class="alert-danger" ><?php echo  $massegealert;?></p>
<p class="alert-success" ><?php echo $massege;?></p>

<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">

</div>
<div class="text-center">
    <p>Not a member? <a href="sign_in.php">Register</a></p>
</div>
</form>

</div>
</div>

</body>
</html>


