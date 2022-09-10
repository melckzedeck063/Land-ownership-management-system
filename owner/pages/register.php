
<?php
ob_start();
session_start();

 include('../includes/header.php');
//  include('../includes/sideNav.php');
 include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../includes//sideNav.css">

    <style>
        .msg{
            width : 60%;
            margin : auto;
            border-radius : 5px;
        }
        .link{
            font-size : 1.2em;
        }
    </style>
</head>

<?php

$fname = $mname = $lname = $gender = $email = $phone = $residence = $role = $password = $cpassword =$age =$nationality = "";
$fnameError =  $mnameError = $lnameError =  $genderError = $emailError = $phoneError = $residenceError = $roleError = $passwordError = $cpasswordError = $ageError = $nationalityError  = "";

?>

<body>
    <div>
        <div class="row">
            <div class="col-sm-2"></div>

            
            <div class="col-sm-8">
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
                <div class="card bg-light p-4">
                <div class="form-group mb-4">


                    <h4 class="display-4 text-success">Registration Form</h4>
                    <form action="" method="post" class="needs-validation mt-4">
                        <div class="row">
                            <div class="col">
                             <label for="firstname">Firstname</label>
                               <input type="text" id="firstname" name="firstname"  placeholder="Enter your firstname"   class="form-control" required >
                               <div class="invalid-feedback">Please fill out this field.</div>
                               <span class="text-danger"><?= $fnameError ?></span>
                             <hr class="mt-3">
                            </div>
                            <div class="col">
                                <label for="middlename">MiddleName</label>
                                <input type="text" id="surname" name="surname"  placeholder="Enter your surname" class="form-control" required >
                                <div class="invalid-feedback">Please fill out this field.</div>
                                <span class="text-danger"> <?=  $mnameError ?> </span>
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter your lastname" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"> <?= $lnameError  ?> </span>
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
                                <span class="text-danger"> <?= $genderError  ?> </span>
                                 <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="age">Birth Date</label>
                                <input type="date" class="form-control" name="dob" id="dob" required >
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"><?=  $ageError ?></span>
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="residence">Residence Address</label>
                                <input type="text" class="form-control" id="residence" name="residence"  placeholder="Enter your residence" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"> <?= $residenceError  ?> </span>
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"  id="email" name="email"  placeholder="Enter your email" required >
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"> <?= $emailError  ?> </span>
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="phone">Phone</label>
                                <input type="telephone" class="form-control" id="phone" name="phone"  placeholder="Enter your phone" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"> <?= $phoneError  ?> </span>
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col">       
                                <input type="hidden" name="role" value="user">                        
                                
                                <input type="hidden" name="nation" value="Tanzania">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password"  placeholder="Enter your password" class="form-control" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                                <span class="text-danger"> <?= $passwordError  ?> </span>
                                <hr class="mt-3">
                            </div>
                            <div class="col">                               
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm your password" required>
                                <div class="invalid-feedback">Please fill out this field</div>
                                <span class="text-danger"> <?= $cpasswordError  ?> </span>
                                <hr class="mt-3">
                            </div>
                        </div>
                         <button type="submit" name="save" class="btn btn-success mb-4 mr-4"> Register </button>
                         <a href="../../login.php" class="btn btn-info mb-4 ml-4"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                        </form>
                    
                        
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
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

    if(isset($_POST['save'])){
        if(empty($_POST['firstname'])){
            $fnameError = "Error firstname is required";
        }
        else{
            $fname = validate($_POST['firstname']);
        }
        if(empty($_POST['surname'])){
            $mnameError = "Error surname is required";
        }
        else{
            $mname =  validate($_POST['surname']);
        }

        if(empty($_POST['lastname'])){
            $lnameError = "Error lastname is required";
        }
        else{
            $lname = validate($_POST['lastname']);
        }
        if(empty($_POST['gender'])){
            $genderError =  "Error gender is required";
        }
        else{
            $gender =  validate($_POST['gender']);
        }
        if(empty($_POST['email'])){
            $emailError =  "Error email is required";
        }
        else{
            $email =  validate($_POST['email']);
        }
        if(empty($_POST['phone'])){
            $phoneError = "Error phone number is required";
        }
        else{
            $phone = validate($_POST['phone']);
        }
        if(empty($_POST['residence'])){
            $residenceError = "Error residence is required";
        }
        else{
            $residence =  validate($_POST['residence']);
        }
        if(empty($_POST['role'])){
            $roleError = "Error user role is required";
        }
        else{
            $role = validate($_POST['role']);
        }
        if(empty($_POST['password'])){
            $passwordError = "Error password is required";
        }
        else{
            $password =  validate(md5($_POST['password']));
        }
        if(empty($_POST['cpassword'])){
            $cpasswordError = "Error confirm password"; 
        }
        else{
            $cpassword =  validate(md5($_POST['cpassword']));
        }
        if(empty($_POST['dob'])){
            $ageError = "Error age is required";
        }
        else{
            $age =  validate($_POST['dob']);
        }
        if(empty($_POST['nation'])){
            $nationalityError = "Error nationality is required"; 
        }
        else{
            $nationality =  validate($_POST['nation']);
        }
   

    }

}

?>


<?php

if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($phone) && !empty($residence) && !empty($password) && !empty($role) && !empty($age) && !empty($nationality) ){

    if($password != $cpassword){
        $cpasswordError = "Error password do not match";
     echo  "<script> alert('password do not match please try again')</script>";
    }
    else{

        if(isset($_POST['save'])){
           
            $insert_query = "INSERT INTO users (fname, surname, lname, gender, user_dob, nationality, email, phone, residence, role , password ) 
            VALUES ( '$fname', '$mname', '$lname', '$gender', '$age', '$nationality', '$email', '$phone', '$residence', '$role', '$password' ) ";

            $results =  mysqli_query ($conn, $insert_query);
            if($results == TRUE ){
                $_SESSION['success'] = "You are succesfully registered";
                header('Location: plot_lists.php');
                
             }
             else{
               
               $_SESSION['status'] = "Sorry request failed please try again";
               header('Location: register.php');
             }
        }

    }

}

?>

    <?php
 include('../includes/footer.php')
?>
<!-- </body>
</html> -->