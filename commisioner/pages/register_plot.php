
<?php
ob_start();

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
  border-radius: 5px;
  width: 60%;
  margin: auto;
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
                      echo "<div class='bg-success text-light msg p-2'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='bg-danger text-light msg p-2'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>

                <div class="form-group">
                    <h4 class="display-4 text-success">Register Plot</h4>
                    <form action="" method="POST" class="needs-validation mt-3">
                        <label for="plotarea">Plot Area</label>
                        <input type="text" class="form-control" id="plot_area" name="plot_area" placeholder="Enter plot area" required  >
                        <div class="invalid-feedback">Please fill out this field</div>
                        <span class="text-danger"> <?php echo $plot_areaError ?> </span>
                        <hr class="mt-2">
                        <label for="plot_size">Plot Size</label>
                        <input type="text" class="form-control" id="plot_size" name="plot_size" placeholder="Enter plot size" required  >
                        <div class="invalid-feedback">Please fill out this field</div>
                        <span class="text-danger"> <?php echo $plot_sizeError ?> </span>
                        <hr class="mt-2">
                        <label for="plot_status">Plot Status</label>
                        <select name="plot_status" id="plot_status" class="form-control" required>
                            <option value="">Select status</option>
                            <option value="available">available</option>
                            <option value="owned">owned</option>
                        </select>
                        <div class="invalid-feedback">Please select plot status</div>
                        <span class="text-danger"> <?php echo $plot_statusError ?> </span>
                        <hr class="mt-2">
                        <label for="owner">Plot Owner</label>
                        <input type="text" class="form-control" name="owner" id="owner"  placeholder="Enter plot owner" required>
                        <div class="invalid-feedback">Please fill out this field</div>
                        <span class="text-danger"> <?php echo $plot_ownerError ?> </span>
                        <hr class="mt-2">
                        <button type="submit" name="save" class="btn btn-success mr-4">Register</button>
                        <a href="plot_lists.php" class="btn btn-info ml-4"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </form>
                </div>
                
               
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>


<?php


$plot = rand(10000,19999);

if($_SERVER["REQUEST_METHOD"] === "POST"){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST["save"])){
    if(empty($_POST["plot_area"])){
      $plot_areaError = "Error plot area is required";
    }
    else{
      $plot_area = validate($_POST["plot_area"]);
    }
    if(empty($_POST["plot_size"])){
      $plot_sizeError = "Error plot size is required";
     }
     else{
      $plot_size  = validate( $_POST["plot_size"]);
    }
    if(empty($_POST["plot_status"])){
      $plot_statusError = "Error plot status is required";
    }
    else{
       $plot_status = validate($_POST["plot_status"]);
    }
    if(empty($_POST['owner'])){
        $plot_owner = "Error plot owner is required";
    }
    else {
        $plot_owner =  validate($_POST['owner']);
    }
    if($plot){
        $plot_no = "P.".$plot;
    }
}   
}

    ?>
<?php

if(!empty($plot_area) && !empty($plot_no) && !empty($plot_size) && !empty($plot_status) && !empty($plot_owner) ){
 
    if(isset($_POST['save'])){

   $insert_query =  " INSERT INTO  plots( plot_no, plot_area, plot_size, plot_status, plot_owner )
                      VALUES ( '$plot_no', '$plot_area', '$plot_size', '$plot_status', '$plot_owner' )" ;

                 $results = mysqli_query($conn, $insert_query);
                 if($results ){
                    $_SESSION['success'] = "New plot succesfull added";
                    header('Location: register_plot.php');
                 }
                 else{
                   
                   $_SESSION['status'] = "Sorry request failed please try again";
                   header('Location: register_plot.php');
                 }
                    


 }
}
// else{
//    $_SESSION['status'] = "Sorry all inputs are required please try again";
// }
?>
    <?php
 include('../includes/footer.php')
?>