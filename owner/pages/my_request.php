
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
             $name = $row['fname']. " ". $row['surname']. " " . $row['lname'];
            
         }
     }
 }

 $select_request =  " SELECT * FROM ro_request WHERE user_id =  '$user_id' ";
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
        .onyo{
            font-size : 1.1em;
            font-weight : 500;
        }
        .msg{
        border-radius: 5px;
        width: 50%;
        margin: auto;
    }
    </style>
</head>
<body>
    

<div class="container-fluid">
    <div class="row">
    <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success text-center text-light msg p-2'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-center text-light msg p-2'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>

            <div class="table table-responsive mt-2">
                <table class="table table-bordered">
                    <thead class="bg-success text-light">
                        <tr>
                        <th>#</th>
                        <th>Plot No</th>
                        <th>Plot Size</th>
                        <th>Plot Area</th>
                        <th>Date Requested</th>
                        <th>Control No</th>
                        <th>Amount</th>
                        <th>Payment Status </th>
                        <th>Date Paid</th>
                        <th>Request Status</th>
                        <th>Approved</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php

                            

                            $select_request =  " SELECT * FROM ro_request WHERE user_id =  '$user_id' ";
                            $request_output =  mysqli_query($conn, $select_request);
                            if(mysqli_num_rows($request_output) > 0){
                                while($row =  mysqli_fetch_assoc($request_output)){
                                   $request = $row['request_id']
                                   
                                    ?>
                                    <tr>
                                        <td> <?= $row['request_id'] ?> </td>
                                        <td> <?= $plot_no ?> </td>
                                        <td> <?= $plot_size  ?> </td>
                                        <td> <?= $plot_area  ?> </td>
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
                                        
                                        <td> <?=  $row['approved_date'] ?> </td>
                                        <?php
                                         $payment =  " SELECT * FROM payment WHERE request_id = '$request'";
                                         $payment_results = mysqli_query($conn, $payment);
                                         if(mysqli_num_rows($payment_results) > 0){
                                             while($rows = mysqli_fetch_assoc($payment_results)){
                                                 ?>
                                                 <td>                                                    
                                                     <button class="btn btn-success">Done</button>
                                                    </td>
                                                 <?php
                                             
                                             }
                                         } 
                                         else{
                                             ?>
                                         <td>
                                             <form action="./payment.php" method="post">
                                                 <input type="hidden" name="control" value=<?= $row['request_id'] ?> >
                                                 <button type="submit" name="next" class="btn btn-success">Proceed to payment</button>
                                             </form>
                                         </td>
                                             <?php
                                         }
                                        ?>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        
                    </tbody>
                </table>
                
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card ">
                            <div class="card-header bg-success text-light text-center">
                                <h5 class=" " >Welcome   <?=  strtoupper(  $name) ?> </h5>
                            </div>
                            <div class="card-body">
                                <!-- We kindly requset you to keep waiting while your request is on process
                                we will notify you soon once your request is processed   -->
                               
                                </div>
                                <?php
                                 $check_status = " SELECT * FROM ro_request WHERE user_id = '$user_id' ";
                                  $results =  mysqli_query($conn, $check_status);
                                  if(mysqli_num_rows($results) > 0){
                                      while($rows = mysqli_fetch_assoc($results)){
                                          if($rows['request_status'] == 'accepted'){
                                             ?>
                                             <p class="pl-3 pr-3 pt-1 pb-3">Congratulations your request has been accepted. Please wait the certified copy will be sent to you </p>
                                             <a style=" width: 40%; margin: auto; " href="./certificate.php" class="btn btn-info mb-4">Get Certificate</a>
                                             <?php
                                          }
                                          else{

                                              $select_request =  " SELECT * FROM payment WHERE user_id =  '$user_id' ";
                                              $request_output =  mysqli_query($conn, $select_request);
                                              if(mysqli_num_rows($request_output) > 0){
                                                  while($row =  mysqli_fetch_assoc($request_output)){
                                                     
                                                          if($row['payment_status'] ==='paid'){
                                                            ?>
                                                            <p class="pl-3 pr-3 pt-1 pb-3">Your payment have been received succesfully. Please keep visiting your profile for more updates</p>
             
                                                            <?php  
                                                          }
                                                        }
                                                        
                                                    }
                                                    else{
                                                        ?>
                                                       <p class="text-danger pl-3 pr-3 pt-1 pb-3">                                    
                                                       Please make payment through the provided control number so as to fasten your request.
                                                       If the control number is missing please contact us <br>
                                                    </p>
                                                    <?php
                                                }
                                             
                                             
                                             }
                                         }
                                         ?>
                                     
                                <?php
                                }
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
</div>


<?php
 
 include('../includes/footer.php');

?>