


<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<?php

@include'config.php';

session_start();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email ='$email' && password ='$pass'";
    
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_array($result); 
       
       if($row['user_type'] == 'admin'){
           $_SESSION['admin_name'] = $row['name'];
           header('location:admin_page.php');

       }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');
    }

    }else{
        $error[] = 'incorrect email or password!';
     
    }

}; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <!-- customer link with css style -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <form action="" method="post">
    <div class="header">
    <h2>Student Billing Management System</h2>
        </div>    
        <img  class="img-eye" src="index.jpeg" alt="my logo">
            <h4>Login now</h4>
        <?php
        
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <input type="email" name="email" required placeholder="Enter your Email">
        <input type="password" name="password" id="myInput" required placeholder="Enter your Password">
        <input type="checkbox" class="click" onchange="document.getElementById('myInput').type = this.checked ? 'text' : 'password'">
        Show password
        <input type="submit" name="submit" value="login now" class="form-btn">
        <a href="#">Forgot your password?</a>
        <p>Don't have an account? <a href="register_form.php">Register now</a> </p>
    </form>
</div>
    
</body>
</html>