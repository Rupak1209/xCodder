
<?php
    $showAlert= false;
    $showError= false;
     $server="localhost";
     $username="root";
     $password="";
     $database="final";

     $conn = mysqli_connect($server,$username,$password,$database);

     if(!$conn)
     {
     
      
        die("Error".mysqli_connect_error());
     }
     $name =$_POST['name'];
     $age =$_POST['age'];
     $gender =$_POST['gender'];
     $email =$_POST['email'];
     $phone =$_POST['phone'];
     $technology =$_POST['technology'];

     $sql = "INSERT INTO `final` ( `username`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$technology', current_timestamp())";
     
     $result = mysqli_query($conn,$sql);
        if($result)
        {
            $showAlert=true;
        }
    
    else{
        $showError="fill the form correctly!!";
    }

    $conn->close();
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
           <strong>Sucess!</strong> thanks for your submission.
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
    </body>
    </html>