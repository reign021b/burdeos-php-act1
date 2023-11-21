<?php
   session_start();

   include("connection.php");
   include("functions.php");

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!empty($email) && !empty($password))
      {

         $query = "select * from users where email = '$email' limit 1";
         $result = mysqli_query($con, $query);

         if($result)
         {
            if($result && mysqli_num_rows($result) > 0)
            {

               $user_data = mysqli_fetch_assoc($result);
               
               if($user_data['password'] === $password)
               {

                  $_SESSION['email'] = $user_data['email'];
                  header("Location: index.php");
                  die;
               }
            }
         }
         echo "<div style='background-color:red; color:white; text-align:center;'>Wrong email or password!</div>";
      }else
      {
         echo "<div style='background-color:red; color:white; text-align:center;'>Wrong email or password!</div>";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
   <title>Login</title>
</head>
<body>
   <div class="container">
         <div class="row">
            <div class="col-lg-10">
               <div class="page-header">
                  <h2 >Login</h2>
               </div>
               <form method="post">
                  <div class="form-group ">
                     <label>Email:</label>
                     <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                  </div>
                  <br>
                  <div class="form-group">
                     <label>Password:</label>
                     <input type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
                  </div>
                  <br>
                  <input type="submit" class="btn btn-primary" name="login" value="Login">
                  <br>
                  <br>
                  You don't have an account? <a href="signup.php" class="mt-3">Sign Up</a>
               </form>
            </div>
         </div>
      </div>
   

</body>
</html>