<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .title{
            position: absolute;
            top : 50%;
            left : 30%
        }
    </style>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"> <h3>Granted Right Of Occupancy System</h3> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
         <li class="nav-item">
        <a class="nav-link" href="./owner/pages/docs.php">Conditions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Sign In</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Sign Up</a>
      </li> -->
    </ul>
  </div>
</nav>
    </div>
    <div class="container-fluid">
        <img src="./images/elephant-2683007_1920.jpg" width="100%" height = "30%" alt="">
        <h4 class="display-4 text-center mt-4 title">
        Get Your Occupational Right
        </h4>
        
       <div class="row mt-4 mb-4">
           <div class="col">
               <div class="card">
                   <div class="card-header">
                       <h5 class="display-5">Commissioner One</h5>
                   </div>
                   <div class="card-body">
                       Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium reprehenderit ipsum eos eum aliquam modi exercitationem adipisci, dicta magnam corporis accusamus? Praesentium repellendus molestiae sint ut, culpa ipsa necessitatibus! Eius.
                   </div>
               </div>
           </div>
           <div class="col">
               <div class="card">
                   <div class="card-header">
                       <h5 class="display-5">Commissioner Two</h5>
                   </div>
                   <div class="card-body">
                       Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium reprehenderit ipsum eos eum aliquam modi exercitationem adipisci, dicta magnam corporis accusamus? Praesentium repellendus molestiae sint ut, culpa ipsa necessitatibus! Eius.
                   </div>
               </div>
           </div>
           <div class="col">
               <div class="card">
                   <div class="card-header">
                       <h5 class="display-5">Bursar</h5>
                   </div>
                   <div class="card-body">
                       Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium reprehenderit ipsum eos eum aliquam modi exercitationem adipisci, dicta magnam corporis accusamus? Praesentium repellendus molestiae sint ut, culpa ipsa necessitatibus! Eius.
                   </div>
               </div>
           </div>
       </div>
    </div>
    
</body>
</html>

<?php
include('./admin/includes/footer.php')
?>