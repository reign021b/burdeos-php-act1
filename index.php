<?php  
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Name : <?php echo $user_data ['name']?></h5>
                     <p class="card-text">Email : <?php echo $user_data ['email']?></p>
                     <p class="card-text">Mobile : <?php echo $user_data ['mobile']?></p>
                     <a href="logout.php" class="btn btn-primary">Logout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>
</html>