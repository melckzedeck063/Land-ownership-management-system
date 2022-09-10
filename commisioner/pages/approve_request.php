
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
             $commisioner = $row['email'];
            
         }
     }
 }

 
    

         ?>

<?php

