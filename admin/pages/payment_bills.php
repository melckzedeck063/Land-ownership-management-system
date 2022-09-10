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
<div class="plot_list container-fluid">
        <div class="table table-responsive">
            <h4 class="display-4 text-success">Generated Bills</h4>
            <table class="table table-borderd">
                <thead class="bg-success text-light">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Plot No</th>
                    <th>Amount</th>
                    <th>Card NO</th>
                    <th>CVC NO</th>
                    <th>Control NO</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th colspan="2" >Action</th>
                </tr>
            </thead>

                <tbody>

                <?php 
                $fetch_users = " SELECT *  FROM  payment ";
                $fetch_results = mysqli_query($conn, $fetch_users);
                if(mysqli_num_rows($fetch_results) > 0){
                    while($rows = mysqli_fetch_assoc($fetch_results)){
                        ?>

<tr>
                        <td> <?=  $rows['id']  ?> </td>
                        <td> <?=  $rows['name']  ?> </td>
                        <td> <?=  $rows['email']  ?> </td>
                        <td> <?=  $rows['phone']  ?> </td>
                        <td> <?=  $rows['plot_no']  ?> </td>
                        <td> <?= $rows['amount'] ?> </td>
                        <td> <?= $rows['card_no'] ?> </td>
                        <td> <?=  $rows['cvc_no']  ?> </td>
                        <td> <?= $rows['control_no'] ?> </td>
                        <td> <?=  $rows['payment_status']  ?> </td>
                        <td> <?=  $rows['created_at'] ?> </td>
                        <td> 
                            <form action="edit_user.php" method="post" >
                                <input type="hidden" name="user_id" value="<?= $rows['user_id'] ?>" >
                            <button  class="btn btn-warning " name="edit">Edit</button>
                            </form>
                        </td>
                        <td>            
                            <form action="" method="post">   
                                <input type="hidden"  name="user_id" value=" <?= $rows['user_id'] ?> " >                            
                                <button onClick='javascript: return confirm("Are you sure you want to delete this record");' name="delete" class="btn btn-danger">Delete</button>
                            </form>                
                        </td>
                    </tr>


                <?php
                //     }
                // }

                // if(isset($_POST['delete'])){
                //     $user = $_POST['user_id'];
                   
                //     $delete_query =  "DELETE FROM users where user_id =  '$user'";
                
                //     $delete_result = mysqli_query($conn, $delete_query);
                //     if($delete_result == TRUE){
                //       echo " <script>
                //       confirm('Are sure you want to delete the record');
                //     </script>";
                //       $_SESSION['success'] = "User deleted succesfully";
                //      header("Location: users_list.php");
                //   }
                //   else{
                //     $_SESSION['success'] = "Request failed please try again";
                //     header("Location: users_list.php");
                  }
                
                }

                ?>
                
                </tbody>
            </table>
</body>
</html>

<?php
 include('../includes/footer.php')
?>