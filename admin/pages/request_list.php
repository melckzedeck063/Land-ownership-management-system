
<?php

ob_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');




 $name = $address = $date = $agree = $plot_no = $user = $plot_own = $purpose = $onwership  = "";
 $nameErr = $addressErr = $dateErr= $agreeErr = $plot_noErr = $userErr = $plot_ownErr = $purposeErr = $onwershipErr  = "";

 if($_SESSION['username']){
    $user =  $_SESSION['username'];
     $select_user ="SELECT * FROM users WHERE email = '$user'";
     $user_result = mysqli_query($conn, $select_user);
     if(mysqli_num_rows($user_result) > 0){
         while($row = mysqli_fetch_assoc($user_result)){
             $user_id = $row['user_id'];
             $Cname = $row['fname']." ". $row['surname']. " " . $row['lname'];
            
         }
     }
 }

 $select_request =  " SELECT * FROM ro_request ";
 $request_output =  mysqli_query($conn, $select_request);
 if(mysqli_num_rows($request_output) > 0){
     while($row =  mysqli_fetch_assoc($request_output)){
         $plot = $row['plot_no'];
         $check_plot =  " SELECT * FROM plots WHERE plot_id = '$plot' ";
         $plot_result =  mysqli_query($conn, $check_plot);
         if(mysqli_num_rows($plot_result) > 0 ){
             while($row =  mysqli_fetch_assoc($plot_result)){
                 $plot_no = $row['plot_no'];
                 $plot_size = $row['plot_size'];
                 $plot_area = $row['plot_area'];
             }
         }
        }
    }

    $select_request =  " SELECT * FROM ro_request ";
 $request_output =  mysqli_query($conn, $select_request);
 if(mysqli_num_rows($request_output) > 0){
     while($row =  mysqli_fetch_assoc($request_output)){
         $userId = $row['user_id'];
    $select_user ="SELECT * FROM users WHERE user_id = '$userId'";
    $user_result = mysqli_query($conn, $select_user);
    if(mysqli_num_rows($user_result) > 0){
        while($row = mysqli_fetch_assoc($user_result)){
            $user_email = $row['email'];
            
           
        }
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
            width : 50%;
            margin : auto ;
            border-radius : 5px;
        }
    </style>
</head>
<body>
    

<div class="container-fluid">
    <div class="row">

    <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success  text-light text-center msg p-2 mb-3'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2 mb-3'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>
         
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-light">
                        <tr>
                        <th>#</th>
                        <th>Plot No</th>
                        <th>Request From</th>
                        <th>Purpose</th>
                        <th>Date Requested</th>
                        <th>Control No</th>
                        <th>Amount</th>
                        <th>Payment Status </th>
                        <th>Date Paid</th>
                        <th>Request Status</th>
                        <th>approved By</th>
                        <th>Approval Date</th>
                        <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php

                           
                            $select_request =  " SELECT * FROM ro_request";
                            $request_output =  mysqli_query($conn, $select_request);
                            if(mysqli_num_rows($request_output) > 0){
                                while($row =  mysqli_fetch_assoc($request_output)){
                                    $plots = $row['plot_no'];
                                    $userID = $row['user_id'];
                                    $request =  $row['request_id'];
                                    ?>
                                    <tr>
                                        <?php
                                        ?>
                                        <td> <?= $row['request_id'] ?> </td>
                                        <td> <?= $row['plot_num'] ?> </td>
                                        <td> <?= $row['name']  ?> </td>
                                        <td> <?= $row['purpose']  ?> </td>
                                        <td> <?= $row['date_created'] ?> </td>
                                        <td> <?= $row['control_no'] ?> </td>
                                        <?php
                                        $payment =  " SELECT * FROM payment WHERE request_id = '$request'";
                                        $payment_results = mysqli_query($conn, $payment);
                                        if(mysqli_num_rows($payment_results) > 0){
                                            while($rows = mysqli_fetch_assoc($payment_results)){
                                                ?>
                                                <td><?= $rows['amount'] ?></td>
                                                <td> <?= $rows['payment_status'] ?> </td>
                                                <td><?= $rows['created_at'] ?></td>
                                                <?php
                                            }
                                        } 
                                        else{
                                            ?>
                                            <td> none </td>
                                            <td> none </td>
                                            <td> none </td>
                                            <?php
                                        }
                                        ?>
                                        <td> <?= $row['request_status'] ?> </td>
                                        <td> <?=  strtoupper($row['approved_by']) ?> </td>
                                        <td> <?=  $row['approved_date'] ?> </td>
                                        <td>
                                            
                                            <form action="" method="post">
                                                <input type="hidden"  name="req_id"  value="<?=  $row['request_id'] ?>" > 
                                                <button name="approve" class="btn btn-success">Approve</button>
                                            </form>
                                        </td>
                                        <td><form action="" method="post">
                                                <input type="hidden"  name="req_id"  value="<?=  $row['request_id'] ?>" >
                                                <input type="hidden"  name="user_id"  value="<?=  $row['name'] ?>" >
                                                <input type="hidden"  name="plot_no"  value="<?=  $row['plot_num'] ?>" >
                                                <button onClick=" javascript : return confirm('Are you sure you want to disapprove this request'); " name="disapprove" class="btn btn-warning">Disapprove</button>
                                            </form></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden"  name="req_id"  value="<?= $row['request_id'] ?>">
                                                <button onClick=" javascript : return confirm('Are you sure you want to delete this item'); " name="delete" class="btn btn-danger ml-3">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
</div>


<?php
// ================== APPROVING REQUEST  ================================== 
if(isset($_POST['approve'])){
    $requestId = $_POST['req_id'];
    $userEmail = $_POST['user_id'];
    $plot_no = $_POST['plot_no'];
    $date =  date("Y-m-d h:i:s");

    // CHECK  IS THE STATUS HAS BEEN APPROVED 
    $check_status = " SELECT * FROM ro_request WHERE request_id = '$requestId' ";
    $status_result = mysqli_query($conn, $check_status);
    if(mysqli_num_rows($status_result) > 0){
        while($row = mysqli_fetch_assoc($status_result)){
            $status = $row['request_status'];
        }
    }

    $select_owner ="SELECT * FROM users WHERE email = '$userEmail'";
    $owner_result = mysqli_query($conn, $select_owner);
    if(mysqli_num_rows($user_result) > 0){
        while($row = mysqli_fetch_assoc($owner_result)){
            $user = $row['email'];
            $name = $row['fname']." ". $row['surname']. " " . $row['lname'];    
        }
    }

   
    if($status != 'accepted'){
        echo $status;
     $update_plot = " UPDATE plots SET plot_status = 'owned', plot_owner = '$name' WHERE plot_no = '$plot_no' ";
     $plot_update = mysqli_query($conn, $update_plot);

    $update_query = " UPDATE ro_request SET payment_status = 'paid', request_status = 'accepted', approved_by = '$Cname', approved_date = '$date'  WHERE request_id = '$requestId' ";

    $update_results =  mysqli_query($conn, $update_query);
    if($update_results){
        $_SESSION['success'] = "request approved succesfully";
        header("Location: request_list.php");
        echo "success";
     }
     else{
       $_SESSION['success'] = "Request failed please try again";
       echo "something went wrong";
       header("Location: request_list.php");
     }
    }
    else{
        $_SESSION['success'] = "Request has already been approved! thank you";
       header("Location: request_list.php");
    }
    

}

?>
<?php
   // ================== DISAPPROVING REQUEST  ================================== 
if(isset($_POST['disapprove'])){
    $requestId = $_POST['req_id'];
    $userEmail = $_POST['user_id'];
    $plot_no = $_POST['plot_no'];
    
     // CHECK  IS THE STATUS HAS BEEN APPROVED 
     $check_status = " SELECT * FROM ro_request WHERE request_id = '$requestId' ";
     $status_result = mysqli_query($conn, $check_status);
     if(mysqli_num_rows($status_result) > 0){
         while($row = mysqli_fetch_assoc($status_result)){
             $status = $row['request_status'];
         }
     }

     if($status != 'pending'){
     $update_plot = " UPDATE plots SET plot_status = 'available', plot_owner = 'not assigned' WHERE plot_no = '$plot_no' ";
     $plot_update = mysqli_query($conn, $update_plot);
     
    $update_query = " UPDATE ro_request SET payment_status = 'pending', request_status = 'pending', approved_by = 'NO' , approved_date = '0000-00-00 00:00:00'  WHERE request_id = '$requestId' ";

    $update_results =  mysqli_query($conn, $update_query);
    if($update_results){
        $_SESSION['success'] = "request disapproved succesfully";
        header("Location: request_list.php");
        echo "success";
     }
     else{
       $_SESSION['success'] = "Request failed please try again";
       echo "something went wrong";
       header("Location: request_list.php");
     }

     }
     else{
        $_SESSION['success'] = "Request has already been disapproved! thank you";
        header("Location: request_list.php");
     }
    

}

?>

<?php
// ================== DELETING REQUEST REQUEST  ================================== 

if(isset($_POST['delete'])){
    $reqId =  $_POST['req_id'];
    $delete_query =  "DELETE FROM ro_request WHERE request_id = '$reqId' ";

    $delete_results = mysqli_query($conn, $delete_query);

    if($delete_result == TRUE){
      echo " <script>
      confirm('Are sure you want to delete the record');
    </script>";
      $_SESSION['success'] = "request deleted succesfully";
     header("Location: request_list.php");
  }
  else{
    $_SESSION['success'] = "Request failed please try again";
    header("Location: request_list.php");
  }

}

?>


<?php

// // ================== DISAPPROVING REQUEST  ================================== 
// if(isset($_POST['disapprove'])){

//     $requestId = $_POST['req_id'];
//     $userEmail = $_POST['user_id'];
//     $plot_no = $_POST['plot_no'];
    

//      $update_plot = " UPDATE plots SET plot_status = 'available', plot_owner = 'not assigned' WHERE plot_no = '$plot_no' ";
//      $plot_update = mysqli_query($conn, $update_plot);
     
//     $update_query = " UPDATE ro_request SET payment_status = 'pending', request_status = 'pending', approved_by = 'NO' , approved_date = '0000-00-00 00:00:00'  WHERE request_id = '$requestId' ";

//     $update_results =  mysqli_query($conn, $update_query);
//     if($update_results){
//         $_SESSION['success'] = "request disapproved succesfully";
//         header("Location: request_list.php");
//         echo "success";
//      }
//      else{
//        $_SESSION['success'] = "Request failed please try again";
//        echo "something went wrong";
//        header("Location: request_list.php");
//      }


// }

?>

<?php
 
 include('../includes/footer.php');

?>