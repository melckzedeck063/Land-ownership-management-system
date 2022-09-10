<?php
ob_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../includes//sideNav.css">
</head>
<body>
    
<div class="container-fluid">
    <div class="row mb-4">
        <div class="card-columns mb-4">
            <div class="card shadow-bg bg-info">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $checkPlotsNo =  " SELECT * FROM plots ";
                    $checkResults =  mysqli_query($conn, $checkPlotsNo);
                    $rowsNum =  mysqli_num_rows($checkResults);
                       
                    ?>
                    <h3 class="text-center display-4"><?= $rowsNum ?></h3>
                        Registered Plots
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-success">
                <div class="row pt-4  pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $checkUnsassigned =  " SELECT * FROM plots WHERE plot_status = 'owned' ";
                    $unassignedResults =  mysqli_query($conn, $checkUnsassigned);
                    $assigned = mysqli_num_rows($unassignedResults);
                       
                    ?>
                    <h3 class="text-center display-4"><?=  $assigned  ?></h3>
                        Assigned Plots
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-primary">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php 

$checkUnsassigned =  " SELECT * FROM plots WHERE plot_status = 'available' ";
$unassignedResults =  mysqli_query($conn,$checkUnsassigned);
    $row = mysqli_num_rows($unassignedResults);
   
?>
<h3 class="text-center display-4"> <?= $row ?></h3>
                        Unassigned Plots
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="row mb-4">
        <div class="card-columns mb-4">
            <div class="card shadow-bg bg-info">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $checkRequests =  " SELECT *  FROM ro_request ";
                    $requestResult =  mysqli_query($conn, $checkRequests);
                    $total = mysqli_num_rows($requestResult);
                    ?>
                    <!-- <h4 class="text-light display-5 text-center">Received Requests</h4> -->
                    <h3 class="text-center display-4"><?= $total ?></h3>
                   
                        Received Requests
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-success">
                <div class="row pt-4  pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $acceptedRequest  = " SELECT *  FROM ro_request WHERE request_status = 'accepted'";
                    $accepted =  mysqli_query($conn, $acceptedRequest);
                    $acceptedNo =  mysqli_num_rows($accepted)
                    ?>
                    <h3 class="text-center display-4"> <?= $acceptedNo ?> </h3>
                        Accepted Requests
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-primary">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $pendingRequest =  " SELECT * FROM ro_request WHERE request_status =  'pending' ";
                    $pending =  mysqli_query($conn, $pendingRequest);
                    $pendingNo =  mysqli_num_rows($pending);
                    ?>
                    <h3 class="text-center display-4"> <?= $pendingNo ?> </h3>
                        Pending Requests
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-4">
        <div class="card-columns mb-4">
            <div class="card shadow-bg bg-info">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $checkRequests =  " SELECT *  FROM users ";
                    $requestResult =  mysqli_query($conn, $checkRequests);
                    $total = mysqli_num_rows($requestResult);
                    ?>
                    <!-- <h4 class="text-light display-5 text-center">Received Requests</h4> -->
                    <h3 class="text-center display-4"><?= $total ?></h3>
                   
                        Registered Users
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-success">
                <div class="row pt-4  pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $acceptedRequest  = " SELECT *  FROM users WHERE role != 'user'";
                    $accepted =  mysqli_query($conn, $acceptedRequest);
                    $internalUsers =  mysqli_num_rows($accepted)
                    ?>
                    <h3 class="text-center display-4"> <?= $internalUsers ?> </h3>
                        Internal Users
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="card shadow-bg bg-primary">
                <div class="row pt-4 pb-4 pl-3">
                    <div class="col-sm-4 bg-warning text-light text-center pt-2 pb-2">
                        <h3 class="display-3"><i class="fas fa-list"></i></h3>
                    </div>
                    <div class="col text-light">
                    <?php
                    $pendingRequest =  " SELECT * FROM users WHERE role =  'user' ";
                    $pending =  mysqli_query($conn, $pendingRequest);
                    $externalUsers =  mysqli_num_rows($pending);
                    ?>
                    <h3 class="text-center display-4"> <?= $externalUsers ?> </h3>
                        External Users
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
 include('../includes/footer.php')
?>