<?php
ob_start();
session_start();


 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');


?>

<?php

$plot_area = $plot_size = $plot_status = $plot_no = $plot_owner =  "";
$plot_areaError =  $plot_sizeError = $plot_statusError = $plot_ownerError = "";

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
  width: 60%;
  margin: auto;
  border-radius : 5px;
}
    </style>
</head>
<body>
    <div class="plot-form">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

            <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='bg-success text-light text-center msg p-2 '>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light text-center msg p-2'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>
            <?php

            if(isset($_POST['edit'])){
                $plot = $_POST['plot_id'];

                $fetch_plot = " SELECT  * FROM plots  WHERE plot_id =  '$plot'";
                $fetch_results =  mysqli_query($conn, $fetch_plot);
                if(mysqli_num_rows($fetch_results) > 0){
                    while($rows =  mysqli_fetch_assoc($fetch_results)){
                        ?>

                        <div class="form-group">
                        <h4 class="display-4 text-success">Register Plot</h4>
                        <form action="" method="POST" class="needs-validation mt-3">

                        <input type="hidden" name="plot_id"  value=" <?= $rows['plot_id']  ?>">
                        <label for="plotuo">Plot Number</label>
                            <input type="text" class="form-control" value="<?= $rows['plot_no']  ?>" id="plot_area" name="plot_no" placeholder="Enter plot area" required  >
                            <div class="invalid-feedback">Please fill out this field</div>
                            <label for="plotarea">Plot Area</label>
                            <input type="text" class="form-control" value="<?= $rows['plot_area']  ?>" id="plot_area" name="plot_area" placeholder="Enter plot area" required  >
                            <div class="invalid-feedback">Please fill out this field</div>
                            
                            <hr class="mt-2">
                            <label for="plot_size">Plot Size</label>
                            <input type="text" class="form-control" value="<?= $rows['plot_size']  ?>" id="plot_size" name="plot_size" placeholder="Enter plot size" required  >
                            <div class="invalid-feedback">Please fill out this field</div>
                            
                            <hr class="mt-2">
                            <label for="plot_status">Plot Status</label>
                            <select name="plot_status" id="plot_status" class="form-control" required>
                                <option value="<?= $rows['plot_status']  ?>" > <?= $rows['plot_status'] ?> </option>
                                <option value="available">available</option>
                                <option value="owned">owned</option>
                            </select>
                            <div class="invalid-feedback">Please select plot status</div>
                            
                            <hr class="mt-2">
                            <label for="owner">Plot Owner</label>
                            <input type="text" class="form-control" value="<?= $rows['plot_owner']  ?>" name="owner" id="owner"  placeholder="Enter plot owner" required>
                            <div class="invalid-feedback">Please fill out this field</div>
                            
                            <hr class="mt-2">
                            <button type="submit" name="update" class="btn btn-success mr-4">Update</button>
                            <a href="plot_lists.php" class="btn btn-info ml-4"><i class="fas fa-arrow-circle-left"></i> Back</a>
                        </form>
                    </div>

                    <?php

                    }
                }
            }

            if(isset($_POST['update'])){
                $plot =  $_POST['plot_id'];
                $plot_area = $_POST['plot_area'];
                $plot_no = $_POST['plot_no'];
                $plot_size =  $_POST['plot_size'];
                $plot_status = $_POST['plot_status'];
                $plot_owner = $_POST['owner'];


                $update_query =  " UPDATE plots SET plot_no =  '$plot_no', plot_area = '$plot_area', plot_size = '$plot_size', plot_status =  '$plot_status', plot_owner =  '$plot_owner'  WHERE plot_id =  $plot  ";

                $output =  mysqli_query($conn, $update_query); 
                if($output == TRUE ){
                    $_SESSION['success'] = "Plot succesfully updated";
                    header('Location: plot_lists.php');
                 }
                 else{
                   
                   $_SESSION['status'] = "Sorry request failed please try again";
                   header('Location: edit_plot.php');
                 }
                
            }

          ?>
               

                
               
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <?php
 include('../includes/footer.php')
?>
