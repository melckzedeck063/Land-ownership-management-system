
<?php
ob_start();
 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
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
    <div class="plot_list">
        <div class="table table-responsive">
            <h4 class="display-4 text-success">Plots List</h4>

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

            <table class="table table-borderd">
                <thead class="bg-success text-light">
                <tr>
                    <th>#</th>
                    <th>Plot No</th>
                    <th>Plot Area</th>
                    <th>Plot Size</th>
                    <th>Plot Status</th>
                    <th>Owner</th>
                    <th>Registered</th>
                   
                </tr>
            </thead>

                <tbody>
                      <?php
                      $fetch_plots = " SELECT * FROM plots ";
                      $fetch_results = mysqli_query($conn, $fetch_plots);
                      if(mysqli_num_rows($fetch_results) > 0){
                          while($rows = mysqli_fetch_assoc($fetch_results)){
                              ?>

                              <tr>
                                  <td><?php echo $rows['plot_id'] ?></td>
                                  <td><?= $rows['plot_no'] ?></td>
                                  <td><?= $rows['plot_area'] ?></td>
                                  <td><?= $rows['plot_size'] ?></td>
                                  <td><?= $rows['plot_status'] ?></td>
                                  <td><?= strtoupper( $rows['plot_owner']) ?></td>
                                  <td><?= $rows['date_created'] ?></td>
                                  
                              </tr>

                              <?php

                          }
                      }

                      if(isset($_POST['delete'])){
                          $plot =  $_POST['plot_id'];

                          $delete_query =  " DELETE FROM plots WHERE plot_id =  '$plot' ";
                          $delete_results = mysqli_query($conn, $delete_query);

                          if($delete_result == TRUE){
                            echo " <script>
                            confirm('Are sure you want to delete the record');
                          </script>";
                            $_SESSION['success'] = "plot deleted succesfully";
                           header("Location: plot_lists.php");
                        }
                        else{
                          $_SESSION['success'] = "Request failed please try again";
                          header("Location: plot_lists.php");
                        }

                      }

                      ?>
                </tbody>
            </table>
            <br>
            <!-- <a class="btn btn-info" href="register_plot.php">Register Plot</a> -->
        </div>
    </div>


    <?php
 include('../includes/footer.php')
?>