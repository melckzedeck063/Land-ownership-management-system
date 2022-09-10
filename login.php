
<?php

ob_start();
session_start();
 include('./admin/includes/header.php');
 include('./admin/includes/connect.php');


 $username = $pass ="";
 $passErr = $usernameErr = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title>login</title>
    <style>
        .msg{
            width :70%;
            border-radius : 5px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-5">
            <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success text-light text-center msg p-2 mb-3'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2 mb-3'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>
                <div class="card p-4 bg-light">
                <div class="form-group mt-3 mb-4">
                    <h4 class="text-center text-success"><i class="fas fa-lock"></i></h4>
                    <h4 class="display-5 text-center text-success">Sign In</h4>
                    <form action="" method="POST" class="needs-validation">
                        <label for="username">Username</label>
                        <input type="email" id="username" name="username"  placeholder="Enter your username" class="form-control" required >
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <hr class="mt-4">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"  placeholder="Enter your password" class="form-control" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <hr class="mt-4">
                         <button type="submit" name="login" class="btn btn-primary mb-4 mr-4"> Login </button>
                         <a href="./index.php" class="btn btn-info mb-4 ml-4"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </form>
                    <p class="text-primary">You don't have an account? <a href="./owner/pages/register.php"> <b class="ml-2">Sign Up</b></a> </p>

                    <div class="mt-4 mb-4">
                        
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        if(isset($_POST['login'])){
            if(empty($_POST['username'])){
                $usernameErr = "Error username is required";
            }
            else{
                $username = validate($_POST['username']);
            }
            if(empty($_POST['password'])){
                $passErr = "Error password is required";
            }
            else{
                $pass =  validate(md5($_POST['password']));
            }
        }

    }

    ?>

    <?php

    if(isset($_POST['login'])){
        if(!empty($username) && !empty($pass)){

           $login_query = "SELECT * FROM users WHERE email = '$username' AND password = '$pass' " ;
           $login_result = mysqli_query($conn, $login_query);
           
           if(mysqli_num_rows($login_result) > 0 ){
               while($row = mysqli_fetch_assoc($login_result) ){
                   if($row['role'] == 'admin'){
                       $_SESSION['username'] =  $username ;
                       header('Location: ./admin/pages/dashboard.php');
                       exit();
                    // echo  "login success";
                   }
                   if($row['role'] == 'user') {
                       $_SESSION['username'] = $username;
                       header('Location: ./owner/pages/docs.php');
                   }
                   if($row['role'] == 'commisioner'){
                       $_SESSION['username'] = $username;
                       header('Location: ./commisioner/pages/plot_lists.php');
                   }
                   if($row['role'] == 'bursar'){
                    $_SESSION['username'] = $username;
                    header('Location: ./bursar/pages/request_list.php');
                }
                   
               }
           }
           else{
               $_SESSION['status'] = "Invalid username or password";
               header('Location: login.php');
           }

        }
        else{
            $_SESSION['status'] = "Username and password is required";
            header('Location: login.php');
        }
    }

?>


    <?php
 include('./admin/includes/footer.php')
?>
<!-- </body>
</html> -->