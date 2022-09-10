<?php

ob_start();

 include('../includes//protect.php');
 include('../includes/header.php');
 include('../includes/sideNav.php');

$nida  = $surname = $primary = $mother = $dob = $village = "";

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
    .progress{
        background: green;
        padding: 0.5em;
        height: 22px;
        width: 200px;
        /* margin-left : -3em; */
    }
    .msg{
            width :70%;
            border-radius : 5px;
            margin: auto;
        }
    .round{
        padding: 1em;
        color : white;
        width: 50px;
        margin-top: -1em;
        margin-left:-0.3em;
        margin-right: -0.3em;
        border-radius : 50%;
    }
    .prog{
        list-style : inline-flex;
    }
</style>
</head>
<body>
    <div class="container">

    <div class="row">
        <div class="col"></div>
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

          <div class="card bg-light p-4 mt-2">
              <div class="row ml-2">
                 
                    <div class="col-sm-12">                       
                        <nav class="navbar responsive">
                            <ul class="nav">
                                <li class="nav-item progress"></li>
                                <li class="nav-item round bg-info text-center"><i class="fas fa-check"></i></li>
                                <li class="nav-item bg-dark progress"></li>
                                <li class="nav-item bg-dark round bg-info text-center"><i class="fas fa-check"></i></li>
                            </ul>
                        </nav>
                    </div>
                 
              </div>

            
                <h5 class="display-5 text-center text-success mb-4">Step One Confirm Your Nationality</h5>
                <div class="form-group">
                    <form action="" method="POST" class="needs-validation mt-4">
                        <div class="row">
                            <div class="col">
                                <label for="Nida No">Nida No</label>
                                <input type="text" name="nida" required placeholder="Enter your nida number" class="form-control">
                                <span class="invalid-feedback">Please fill out this input</span>
                                <hr class="mt-3">
                            </div>
                            <div class="col">
                                <label for="Surname">Surname</label>
                                <input type="text" name="surname" placeholder="Enter your surname" required class="form-control">
                                <span class="invalid-feedback">Please fill out this input</span>
                                <hr class="mt-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="Primary school">Primary school</label>
                                <input type="text" name="primary" placeholder="Enter primary school name" required class="form-control">
                                <span class="invalid-feedback">Please fill out this field</span>
                                <hr class="mt-3">
                            </div>
                            <div class="col">
                                <label for="Mother's Fullname">Mother's Fullname</label>
                                <input type="text" name="mother" placeholder="Enter mother's fullname" required class="form-control">
                                <span class="invalid-feedback">Please fill out this field</span>
                                <hr class="mt-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                             <label for="Mother dob">Mother dob</label>
                             <input type="date" name="dob"  required class="form-control">
                             <span class="invalid-feedback">Please fill out this field</span>
                             <hr class="mt-3">
                            </div>
                            <div class="col">
                             <label for="Village">Village</label>
                             <input type="text" name="village" placeholder="Enter your vaillage" required class="form-control">
                             <span class="invalid-feedback">Please fill out this field</span>
                             <hr class="mt-3">
                            </div>
                        </div>

                        <button name="next" class="btn btn-success">Next</button>


                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

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
  if(isset($_POST['next'])){
    if(!empty($_POST['nida'])){
        $nida =  validate($_POST['nida']);
    }
    if(!empty($_POST['surname'])){
        $surname =  validate($_POST['surname']);
    }
    if(!empty($_POST['primary'])){
        $primary = validate($_POST['primary']);
    }
    if(!empty($_POST['mother'])){
        $mother =  validate($_POST['mother']);
    }
    if(!empty($_POST['dob'])){
        $dob = $_POST['dob'];
    }
    if(!empty($_POST['village'])){
        $village = validate($_POST['village']);
    }
  }
}


if(isset($_POST['next'])){
    if(!empty($nida) || !empty($surname)  || !empty($dob) || !empty($primary) || !empty($village) || !empty($mother) ){
        
$login_query = "SELECT * FROM nationality WHERE nida_no = '$nida' AND mname = '$surname' AND mother_name = '$mother' AND mother_dob = '$dob' AND primary_school = '$primary' AND village = '$village' " ;
$login_result = mysqli_query($conn, $login_query);

if(mysqli_num_rows($login_result) > 0 ){
    while($row = mysqli_fetch_assoc($login_result) ){
        $_SESSION['success'] = "Data entered match succesfully. Proceed with your request";
            header('Location: ./plot_request.php');
    }
}
else{
    $_SESSION['status'] = "Data entered do not match. Please try again";
    header('Location: ./nationality.php');
}
    }
}





 include('../includes/footer.php')
?>
