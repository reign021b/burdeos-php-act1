<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email))
        {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<div style='background-color:red; color:white; text-align:center;'>This email already exists.</div>";
            } else {
                if(!empty($name) && !empty($mobile) && !empty($email) && !empty($password))
                {
                    $query = "insert into users (name, mobile, email, password) values ('$name', '$mobile','$email', '$password')";
                    
                    mysqli_query($con, $query);
                    header("Location: login.php");
                    die;
                }
            }
        }else
        {
            echo "<div style='background-color:red; color:white; text-align:center;'>Please enter some valid information!</div>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Sign Up</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" pattern="[A-Za-z\s]+" title="Name must be alphabetical characters (both lower and upper case) and spaces only" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Mobile Number:</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" pattern="(\+)?[0-9]{6,}" title="Mobile number should be in numerical characters and a minimum of 6 digits" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" title="Please input valid email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" name="signup" value="Signup">
                        <br>
                        <br>
                        Already a member?<a href="login.php" class="mt-3">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>