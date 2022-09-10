<?php
ob_start();
 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');



 $name =  $plot_no = $control_no = $card_no = $cvc_no = $amount = $email = $phone = "";
 $nameErr =  $plot_noErr = $control_noErr = $card_noErr = $cvc_noErr = $amountErr = $emailErr = $phoneErr = "";
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
            $telephone =  $row['phone'];
        }
    }
}



    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../includes//sideNav.css">
<style>
    .msg{
        border-radius: 5px;
        width: 60%;
        margin: auto;
    }
    .progress{
            background: green;
            padding: 0.5em;
            height: 22px;
            width: 200px;
            /* margin-left : -3em; */
        }
        .round{
            padding: 1em;
            color : white;
            width: 50px;
            margin-top: -1em;
            margin-left:-0.3em;
            margin-right: -0.3em;
            background: teal;
            border-radius : 50%;
        }
        .prog{
            list-style : inline-flex;
        }
    </style>

</head>
<body>
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-8">
            <div class="card bg-light p-4">
            <!-- <div class="row ml-3">
                      
                      <nav class="navbar responsive">
                          <ul class="nav">
                              <li class="nav-item progress"></li>
                              <li class="nav-item round bg-info text-center"><i class="fas fa-check"></i></li>
                              <li class="nav-item  progress"></li>
                              <li class="nav-item round bg-info text-center"><i class="fas fa-check"></i></li>
                          </ul>
                      </nav>
              </div> -->

                <h5 class="display-5 mb-4 text-success text-center"> Step Two Payment Details</h5>
                <div class="form-group">
                    <?php
                    if(isset($_POST['next'])){
                        $control =  $_POST['control'];
                        // echo $control . " request id <br/>";
                    
                    
                    $check_plot =  " SELECT * FROM ro_request WHERE request_id = '$control' ";
                    $plot_result =  mysqli_query($conn, $check_plot);
                    if(mysqli_num_rows($plot_result) > 0 ){
                        while($row =  mysqli_fetch_assoc($plot_result)){
                            ?>

                            <form action="" method="POST" class="needs-validation">
                                <input type="hidden" name="request_id" value=<?= $row['request_id'] ?>>
                                <input type="hidden" name="user" value=<?= $row['user_id'] ?>>
                                <div class="row">
                                    <div class="col">
                                        <label for="name">Plot_no</label>
                                        <input type="text" placeholder="Enter your name" readonly value=<?= $row['plot_num'] ?> required name="plot_no" class="form-control">
                                        <span class="invalid-feedback">
                                            Please fill out this input is required
                                        </span>
                                        <hr class="mt-3">
                                    </div>
                                    <div class="col">
                                        <label for="plot">Control_no</label>
                                        <input type="text" placeholder="Enter Plot size" readonly value=<?= $row['control_no'] ?> name="control_no" required class="form-control">
                                        <span class="invalid-feedback">
                                            Please fill out this input is required
                                        </span>
                                        <hr class="mt-3">
                                    </div>
                                </div>
        
                                    <div class="row">
                                        <div class="col">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value=<?= $username ?> required placeholder="Enter your email" class="form-control">
                                            <span class="invalid-feedback">
                                                Please fill out this field is required
                                            </span>
                                            <hr class="mt-3">
        
                                        </div>
                                        <div class="col">
                                            <label for="email">Telephone</label>
                                            <input type="tel" name="phone" value=<?= $telephone ?> required placeholder="Enter your telephone" class="form-control">
                                            <span class="invalid-feedback">
                                                Please fill out this field is required
                                            </span>
                                            <hr class="mt-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Enter your name" required name="name" class="form-control" >
                                        <span class="invalid-feedback">
                                            Please fill out this input is required
                                        </span>
                                        <hr class="mt-3">
                                        </div>
                                        <div class="col">
                                        <label for="plot">Amount</label>
                                            <input type="text" value="5000" readonly placeholder="Eg. 5000" name="amount" required class="form-control">
                                            <span class="invalid-feedback">
                                                Please fill out this input is required
                                            </span>
                                            <hr class="mt-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="card">Card No</label>
                                            <input type="text" name="card_no" size="12" placeholder="eg. 3256737876332" required class="form-control">
                                            <span class="invalid-feedback">
                                                Please fill out this field is required
                                            </span>
                                            <hr class="mt-3">
                                        </div>
                                        <div class="col">
                                            <label for="card">CVC No</label>
                                            <input type="text" name="cvc_no" size="3" placeholder="eg. 325" required class="form-control">
                                            <span class="invalid-feedback">
                                                Please fill out this field is required
                                            </span>
                                            <hr class="mt-3">
                                        </div>
                                    </div>
                                
                                <button type="submit" name="save" class="btn btn-success pl-2 pr-2">Submit</button>
                                <a href="plot_request.php" class="btn btn-info ml-4">  <i class="fas fa-arrow-circle-left"></i> Back</a>
                            </form>


                            <?php
                        }
                        }
                    }
                    ?>
            </div>
    </div>
        </div>
        <div class="col"></div>
    </div>
</body>
</html>

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
          $nameErr = "Your name is required";
      }
      else{
          $name =  validate($_POST['name']);
      }

      if(empty($_POST['plot_no'])){
        $plot_noErr = "Plot number is required";
    }
    else{
        $plot_no =  validate($_POST['plot_no']);
    }

    if(empty($_POST['amount'])){
        $amountErr = "Payment amount is required";
    }
    else{
        $amount =  validate($_POST['amount']);
    }

    if(empty($_POST['control_no'])){
        $control_noErr = "Control_no is required";
    }
    else{
        $control_no =  validate($_POST['control_no']);
    }
    if(empty($_POST['email'])){
        $emailErr = "Your email is required";
    }
    else{
        $email =  validate($_POST['email']);
    }

    if(empty($_POST['phone'])){
        $phoneErr = "Your phone is required";
    }
    else{
        $phone =  validate($_POST['phone']);
    }

    if(empty($_POST['card_no'])){
        $card_noErr = "Your card_no is required";
    }
    else{
        $card_no =  validate($_POST['card_no']);
    }

    if(empty($_POST['cvc_no'])){
        $cvc_noErr = "Your cvc_no is required";
    }
    else{
        $cvc_no =  validate($_POST['cvc_no']);
    }

    $userId =  $_POST['user'];
    $request_id = $_POST['request_id'];


  }
}

// echo $name . " <br/>";
// echo $plot_no . " <br/>";
// echo $email . " <br/>";
// echo $phone . " <br/>";
// echo $userId . " <br/>";
// echo $plot_selected . " <br/>";
// echo $card_no . " <br/>";
// echo $cvc_no . " <br/>";
// echo $request_id . " <br/>";

if( !empty($name) && !empty($plot_no) && !empty($phone) && !empty($userId)  && !empty($email) && !empty($amount) && !empty($card_no) && !empty($cvc_no) && !empty($control_no) ){

    if(isset($_POST['save'])){

        $make_payment = "INSERT INTO payment ( name, plot_no, email, phone, request_id, user_id, card_no, cvc_no, amount, control_no, payment_status )
          VALUES ( '$name', '$plot_no', '$email', '$phone', '$request_id', '$userId', '$card_no', '$cvc_no', '$amount', '$control_no', 'paid' ) " ;
          $output = mysqli_query($conn, $make_payment );

          if($output){
            $_SESSION['success'] = "request sent succesfully";
            header('Location: ./my_request.php');
        }
        else{
            $_SESSION['status'] = "Sorry request failed please try again!";
            // echo "request failed";
            header('Location: payment.php');
        }

    }
    

}


?>

<?php
 include('../includes/footer.php')
?>
