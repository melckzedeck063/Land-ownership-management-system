<?php
ob_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');




 $name = $address = $date = $agree = $plot_no = $user = $plot_own = $purpose = $onwership  = "";
 $nameErr = $addressErr = $dateErr= $agreeErr = $plot_noErr = $userErr = $plot_ownErr = $purposeErr = $onwershipErr  = "";
 $control_no = rand(440000000000, 449999999999);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes//sideNav.css">
    <title>Document</title>
</head>
<body>
    
<div class="fluid-container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

        <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success  text-light text-center msg p-2'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>

           <div class="form-group">
               <h4 class="display-5 text-success mt-2">RO Request Form</h4>
               <form action="" method="POST" class="needs-validation mt-3">
                   <div class="row">
                       <div class="col">                           
                           <label for="name">Your Name / Company</label>
                           <input type="text" name="name" id="name" placeholder="Enter your name or Company" class="form-control" required>
                           <div class="invalid-feedback">Please fill out this input</div>
                           <hr class="mt-3">
                       </div>
                       <div class="col">
                           <label for="adress">Address</label>
                           <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" required>
                           <div class="invalid-feedback">Please fill out this field</div>
                           <hr class="mt-3">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                       <label for="plot">Plot Number</label>
                       <input list="plot_no" name="plot_no" class="form-control">
                       <datalist id="plot_no">
                       
                       <?php
                               $available = "available";
                               $select_plot = " SELECT  plot_status, plot_no, plot_id FROM plots WHERE plot_status = '$available'" ;
                               $status_result = mysqli_query($conn, $select_plot);
                               if(mysqli_num_rows($status_result) > 0){
                                   while($rows = mysqli_fetch_assoc($status_result)){
                                       $plots = $rows['plot_no'];
                                       echo "<option value='$plots'> $plots </option>";
                                       
                                   }
                               }
                               ?>
                        </datalist>
                        <div class="invalid-feedback">Please select plot number</div>
                           <hr class="mt-3">
                       </div>
                       
                      
                       <div class="col">
                           <label for="purpose">Plot For?</label>
                           <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Enter yout purpose"required >
                           <div class="invalid-feedback">Please fill out this field</div>
                           <hr class="mt-3">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <label for="owner">Do you own any plot</label>
                           <select name="own" id="own" required class="form-control" required>
                               <option value="">Select your option</option>
                               <option value="yes">Yes</option>
                               <option value="no">No</option>
                           </select>
                           <div class="invalid-feedback">Please select an answer</div>
                           <hr class="mt-3">
                       </div>
                       <div class="col">
                           <label for="plot_own">Enter your plot number</label>
                           <input type="text" class="form-control" name="plot_own" id="plot_own" placeholder="Enter number of the plot you own" required >
                           <div class="invalid-feedback">Please fill out this field</div>
                           <hr class="mt-3">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <label for="agree">Agreenment</label> <br>
                           <input type="checkbox" name="agree" id="agree" placeholder="Confirm that you agree"  required> I agree to the terms and and condition
                           <div class="invalid-feedback">Please fill out this field</div>
                           <hr class="mt-3">
                       </div>
                       <div class="col">
                           <label for="date">Date</label>
                           <input type="date" name="date" class="form-control" required>
                           <div class="invalid-feedback">Please select date</div>
                           <hr class="mt-3">
                       </div>
                   </div>
                   <button name="save" class="btn btn-info mr-4">Submit</button>
                   <a href="request_list.php" class="btn btn-info ml-4">  <i class="fas fa-arrow-circle-left"></i> Back</a>
               </form>
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
    
    if(empty($_POST['name'])){
        $nameErr = "Error name is required";
    }
    else {
        $name =  validate($_POST['name']);
    }
    if(empty($_POST['address'])){
        $addressErr = "Error address is required";
    }
    else{
        $address = validate($_POST['address']);
    }
    if(empty($_POST['plot_no'])){
        $plot_noErr =  "Error plot no is required";
    }
    else{
        $plot_no = $_POST['plot_no'];
    }
    if(empty($_POST['purpose'])){
        $purposeErr = "Error purpose is required";
    }
    else{
        $purpose =  validate($_POST['purpose']);
    }
    if(empty($_POST['own'])){
        $onwershipErr = "Error choice is required";
    }
    else{
        $onwership =  validate($_POST['own']);
    }
    if(empty($_POST['plot_own'])){
        $plot_ownErr = "Error plot no is required";
    }
    else{
        $plot_own =  $_POST['plot_own'];
    }
    if(empty($_POST['agree'])){
        $agreeErr =  "Error you need to confirm";
    }
    else{
        $agree = validate($_POST['agree']);
    }
    if(empty($_POST['date'])){
        $dateErr = "Error date is required";
    }
    else{
        $date = $_POST['date'];
    }
  }
}

?>

<?php
if($_SESSION['username']){
   $user =  $_SESSION['username'];
    $select_user ="SELECT * FROM users WHERE email = '$user'";
    $user_result = mysqli_query($conn, $select_user);
    if(mysqli_num_rows($user_result) > 0){
        while($row = mysqli_fetch_assoc($user_result)){
            $user_id = $row['user_id'];
            $username = $row['email'];
           
        }
    }
}

  $check_plot =  " SELECT * FROM plots WHERE plot_no = '$plot_no' ";
  $plot_result =  mysqli_query($conn, $check_plot);
  if(mysqli_num_rows($plot_result) > 0 ){
      while($row =  mysqli_fetch_assoc($plot_result)){
          $plot_selected = $row['plot_id'];
          $plot = $row['plot_no'];
      }
  }


if( !empty($name) && !empty($address) && !empty($agree) && !empty($plot_no) && !empty($plot_own) && !empty($user_id) && !empty($date) && !empty($purpose) && !empty($onwership) && !empty($control_no) ){

    if(isset($_POST['save'])){
  
        $request_query =  " INSERT INTO ro_request ( user_address, plot_no, plot_num, user_id, name, purpose, plot_owned, control_no, payment_status, request_status, approved_by) VALUES( '$address', '$plot_selected', '$plot', '$user_id', '$username', '$purpose', '$plot_own', '$control_no', 'pending', 'pending', 'No') ";
        
        $request_result =  mysqli_query($conn, $request_query);
        if($request_result){
            $_SESSION['success'] = "request sent succesfully";
            header('Location: plot_request.php');
        }
        else{
            $_SESSION['status'] = "Sorry request failed please try again!";
            header('Location: plot_request.php');
        }
    }

}

?>


<?php
 include('../includes/footer.php')
?>