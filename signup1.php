<?php
$showAlert= false;
$showError= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partial/dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $Cpassword=$_POST["Cpassword"];
 
    $exists=false;
    $existsSql="SELECT * FROM `projects` WHERE username='$username'";
    $result=mysqli_query($conn,$existsSql);
    $numExistRow=mysqli_num_rows($result);
    if($numExistRow>0)
    {
      $showError="user already exists";
    }
    else{
    if(($password == $Cpassword))
    {
        $sql="INSERT INTO `projects` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $showAlert=true;
        }
    }
    else{

      $showError="password do not match";
    }
}
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signnup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <?php
        if($showAlert)
        {
           echo '<div class="alert alert-success warning alert-dismissible fade show" role="alert">
           <strong>Sucess!</strong> Your account is now created. you can login now.
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
        <h1 class="text-center">signup</h1>

        <form action="/project/signup1.php" method="post">
    <div class="mb-3 col-md-6" >
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 col-md-6">
    <label for="Cpassword" class="form-label">Conferm Password</label>
    <input type="password" class="form-control" id="Cpassword" name="Cpassword">
    <div id="emailHelp" class="form-text">Make sure you entered password is same.</div>
  </div>

  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>