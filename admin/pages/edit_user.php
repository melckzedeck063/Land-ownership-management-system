<?php
ob_start();
session_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../includes/sideNav.css">

    <style>
        .msg{
            width : 60%;
            margin : auto;
            border-radius : 5px;
        }
    </style>
</head>

<?php



$fname = $mname = $lname = $gender = $email = $phone = $residence = $role = $password = $cpassword = "";

//  ============== FETCHING USER DATA FROM THE DATABASE =====================================
  

?>

<body>
    <div>
        <div class="row">
            <div class="col-sm-2"></div>

            
            <div class="col-sm-8">
                <div class="form-group mb-4">

                <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success text-light text-center msg p-2'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }

                

          ?>
                 
                 <h4 class="display-4 text-success">Registration Form</h4>
                 <?php

                      if(isset($_POST['edit'])){
                      $userId = $_POST['user_id'];

                    $fetch_users = " SELECT *  FROM  users WHERE user_id = '$userId'";
                    $fetch_results = mysqli_query($conn, $fetch_users);
                    if(mysqli_num_rows($fetch_results) > 0){
                    while($rows = mysqli_fetch_assoc($fetch_results)){
                   ?>
                    <form action="" method="post" class="needs-validation mt-4">
                        <div class="row">
                            <input type="hidden" name="userId" value="<?=  $rows['user_id'] ?>">
                            <div class="col">
                             <label for="firstname">Firstname</label>
                               <input type="text" id="firstname" name="firstname" value="<?= $rows['fname'] ?>" placeholder="Enter your firstname"   class="form-control" required >
                               <div class="invalid-feedback">Please fill out this field.</div>
                               
                             <hr class="mt-3">
                            </div>
                            <div class="col">
                                <label for="middlename">MiddleName</label>
                                <input type="text" id="surname" name="surname"  value="<?= $rows['surname'] ?>"  placeholder="Enter your surname" class="form-control" required >
                                <div class="invalid-feedback">Please fill out this field.</div>
                                
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" value="<?= $rows['lname'] ?>" id="lastname" name="lastname"  placeholder="Enter your lastname" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                               
                                <hr class="mt-3">
                            </div>
                            <div class="col">
                                <label for="gender">Gender</label>
                                <div class="form-check mt-3">
                                <label class="form-check-label">
                                    <span class="mr-3 ml-2">                                       
                                        <input  type="radio" class="form-check-input radio" value="male"  name="gender">Male
                                    </span>
                                    <span class="ml-3">                                       
                                        <input type="radio" class="form-check-input" value="female"  name="gender">Female
                                    </span>
                                </label>
                                </div>
                                
                                 <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="age">Birth Date</label>
                                <input type="date" class="form-control" value="<?= $rows['user_dob'] ?>" name="dob" id="dob" required >
                                <div class="invalid-feeback">Please fill out this field</div>
                            </div>
                            <div class="col">
                                <label for="nation">Nationality</label>
                                <select name="nation" id="nation" class="form-control">
                                    <option value="<?=  $rows['nationality'] ?>"><?= $rows['nationality']  ?></option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Nigeria">Nigeria</option>
                                </select>
                                <div class="invalid-feedback">Please select your country</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"  value="<?= $rows['email'] ?>" id="email" name="email"  placeholder="Enter your email" required >
                                <div class="invalid-feedback">Please fill out this field</div>
                                
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="phone">Phone</label>
                                <input type="telephone" class="form-control" value="<?= $rows['phone'] ?>" id="phone" name="phone"  placeholder="Enter your phone" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                               
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">                               
                                <label for="residence">Residence Address</label>
                                <input type="text" class="form-control" id="residence" value="<?= $rows['residence'] ?>" name="residence"  placeholder="Enter your residence" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="<?= $rows['role'] ?>"><?= $rows['role'] ?></option>
                                    <option value="user">user</option>
                                    <option value="commisioner">commisioner</option>
                                    <option value="admin">admin</option>
                                </select>
                                <div class="invalid-feedback">Please select user role</div>
                                
                                <hr class="mt-3">
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password"  placeholder="Enter your password" class="form-control" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                                
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm your password" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                
                                <hr class="mt-3">
                            </div> -->
                        </div>
                         <button type="submit" name="update" class="btn btn-success mb-4 mr-4"> Update </button>
                         <a href="users_list.php" class="btn btn-info mb-4 ml-4">Back</a>
                    </form>
                 <?php
                    }
                }
            }
                ?>

                <?php

                if(isset($_POST['update'])){
                    $user_id =  $_POST['userId'];
                    $fname =  $_POST['firstname'];
                    $mname =  $_POST['surname'];
                    $lname = $_POST['lastname'];
                    $gender = $_POST['gender'];
                    $email = $_POST['email'];
                    $phone =  $_POST['phone'];
                    $residence =  $_POST['residence'];
                    $role = $_POST['role'];


                   $update_query =  " UPDATE users SET fname='$fname', surname = '$mname', lname='$lname', gender='$gender', email = '$email', phone = '$phone', residence = '$residence', role='$role' WHERE user_id = '$user_id' " ;

                   $output = mysqli_query($conn, $update_query);
                    if($output == TRUE){
                       $_SESSION['success'] = "Your data has been updated";
                       header("Location: users_list.php");
                    }
                     else{
                       $_SESSION['success'] = "Request failed please try again";
                       header("Location: edit_user.php");

                    }
                }

                ?>

                    <div class="mt-4 mb-4">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

    <?php
 include('../includes/footer.php')
?>