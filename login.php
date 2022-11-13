<?php
$login= false;
$showError= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partial/dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    
 
    
    $sql = "select * from projects where username ='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
        if($num==1)
        {
            $login=true;
            session_start();
            $_SESSION["loggedin"]=true;
            $_SESSION["username"]=$username;
            header("location:welcome1.html");
        }
    
    else{

      $showError="invalid credentials";
    }
  
}
    
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <?php
        if($login)
        {
            echo '<div class="alert alert-success warning alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> you are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($showError)
        {
            echo '<div class="alert alert-danger warning alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> '. $showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>

<div class="container">
        <h1 class="text-center">Welcome to our Login page</h1>

        <form action="/project/login.php" method="post">
    <div class="mb-3 col-md-6" >
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  

  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>