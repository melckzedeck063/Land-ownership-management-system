
<?php
session_start();

include('connect.php');

if(!$_SESSION['username']){
    header('Location: ../../login.php');
}

if($_SESSION['username']){
$user = $_SESSION['username'];
// die($user);
$select_user = "SELECT * FROM users WHERE email = '$user'";
$user_result = mysqli_query($conn, $select_user);
if(mysqli_num_rows($user_result) > 0){
    while($row = mysqli_fetch_assoc($user_result)){
        $user_type = $row['role'];
        // if($user_type === 'admin'){
        //     header('Location: ../pages/register.php');
        // }
    }
}
    if($user_type != "commisioner"){
    // header('Location: login.php');
    header('Location: ../../login.php');
    }

}

?>