<?php

ob_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');


 if($_SESSION['username']){
    $user =  $_SESSION['username'];
     $select_user ="SELECT * FROM users WHERE email = '$user'";
     $user_result = mysqli_query($conn, $select_user);
     if(mysqli_num_rows($user_result) > 0){
         while($row = mysqli_fetch_assoc($user_result)){
             $user_id = $row['user_id'];
             $name = $row['fname']. " ". $row['surname']. " " . $row['fname'];
            
         }
     }
 }

 $select_request =  " SELECT * FROM ro_request WHERE user_id =  '$user_id' ";
 $request_output =  mysqli_query($conn, $select_request);
 if(mysqli_num_rows($request_output) > 0){
     while($row =  mysqli_fetch_assoc($request_output)){

         $plot = $row['plot_no'];
         $date =  $row['approved_date'];
         $commissioner = $row['approved_by'];
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
    <link rel="stylesheet" href="../includes//sideNav.css">
    <title>Document</title>
    <style>
        @media print{
  body *{
    visibility: hidden;
  }
  .print-conatainer, .print-container * {
    visibility: visible;
  }
}
    </style>
</head>
<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col"></div>
            <div class="col-sm-10">
                <div class="print-container">
                <div class="card bg-light p-4">
                <h3 class="text-success text-center">THE UNITED REPUBLIC OF TANZANIA</h3>
                <h4 class="text-success text-center mb-4"> CERTIFICATE OF PLOT OCCUPANCY </h4>

                <div class="row mt-3">
                    <div class="col-sm-3">
                    <div style="" class="card">
                            <!-- <div class="card-header"> -->
                                <img style="width: 100%;  height: 170px" src="../images/3207d-nhif.jpg" alt="">
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-sm-3">
                    <div style="" class="card">
                            <!-- <div style="" class="card-header"> -->
                                <img style="width: 100%; height: 170px; " src="../images/images (6).jpg" alt="">
                            <!-- </div> -->
                        </div>
                        </div>
                    </div>
                    <hr class="mb-3">

                    <div class="row">
                            <div class="col"></div>
                            <div class="col-sm-8 m-4 ">
                        <h3 style="font-family: fantasy;" class="text-center">THIS IS CERTIFY THAT</h3>
                        <h5 class="text-center text-success mt-2"><?= strtoupper($name) ?>
                            <hr style="margin-top: -0.05em;" ></h5>
                        <!-- <hr> -->
                        <p>Has been granted a right of occupancy of a plot number <b class="ml-2 mr-2 text-success"><?= strtoupper($plot_no) ?></b>   of size <b class="ml-2 mr-2 text-success"><?= strtoupper($plot_size) ?></b> located at <b class="ml-2 mr-2 text-success"> <?= strtoupper($plot_area) ?> </b> on <b class="ml-2 mr-2 text-success"> <?= strtoupper($date) ?> </b> </p>
                        
                    </div>
                    <div class="col"></div>
                </div>

                <div class="row">
                            <div class="col">
                                <b> <?= strtoupper($commissioner) ?> </b> <br>
                                    <!-- SINGNATURE : m.james  -->
                                    <hr>
                                    Land Commisioner
                               
                            </div>
                            <div class="col"></div>
                            <div class="col">
                                   <b> PROF: AHMAD JUMA KHALFAN </b>
                                    
                                    <hr>
                                    Executive Officer
                                
                            </div>
                        </div>

                </div>
                </div>
                <button onClick ="window.print()" style="width: 25%; margin-left: auto;" class="btn btn-success mt-2 btn-block">Download Certificate</button>
            </div>
            <div class="col"></div>
        </div>
   

</body>
</html>

<?php
 
 include('../includes/footer.php');

?>