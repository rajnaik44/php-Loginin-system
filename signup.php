<?php
    $showAlert = false;
    $showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
include("partials/_dbconnect.php");
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
// $exists = false;

//check weather username already exits
$existsql = "SELECT * FROM users where username = '$username'";
$result = mysqli_query($conn, $existsql); 
$numexitrow = mysqli_num_rows($result);
if($numexitrow > 0){
  // $exists = true;
  $showError = "usename already exist";
}
else{
  // $exists = false;


if($cpassword == $password ){
  $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if($result){
      $showAlert = true;
 
    }
}else{
  $showError = "password do not match ";
}
}}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require("partials/_nav.php"); 
    ?>

    <?php    
    if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> You account has been created and you can login. <a href="/logInSystem/login.php">Log In</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    <?php    
    if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>alert!</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>


    <div class="container col-md-5 ">
        <h1 class="text-center">Signup to our website</h1>
  
    <form action="/logInSystem/signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">UserName</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" maxlength="255" class="form-control" name="password" id="password" >
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control"name="cpassword" id="cpassword">
    <div id="ccpassword" class="form-text">Make sure to type the same password</div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>