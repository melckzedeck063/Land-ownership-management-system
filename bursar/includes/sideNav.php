<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="sideNav.css">
 

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Bursar Dashboard</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <!-- <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div> -->
        <?php
        if($_SESSION['username']){
          $user =  $_SESSION['username'];
           $select_user ="SELECT * FROM users WHERE email = '$user'";
           $user_result = mysqli_query($conn, $select_user);
           if(mysqli_num_rows($user_result) > 0){
               while($row = mysqli_fetch_assoc($user_result)){
                   $user_id = $row['user_id'];
                   $user = $row['email'];
                   $name = $row['fname']." ". $row['surname']. " " . $row['lname'];
                   
                  
               }
           }
       }
        ?>
        <div class="user-info">
          <span class="user-name">
            <strong><?= strtoupper($name) ?></strong> <br>
            <?= $user ?>  
          </span>
          <span class="user-role">Bursar</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!-- <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div> -->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <!-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Dashboard 1
                    <span class="badge badge-pill badge-success">Pro</span>
                  </a>
                </li>
                <li>
                  <a href="#">Dashboard 2</a>
                </li>
                <li>
                  <a href="#">Dashboard 3</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="sidebar-dropdown">
            <a href="#">
            <i class="fas fa-list"></i>
              <span>Ro Book</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="../pages/plot_lists.php">Land Plots</a>
                </li>
                <li>
                  <a href="../pages/register_plot.php">Register Plot</a>
                </li>
              </ul>
            </div>
          </li> -->
         

          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-book"></i>
              <span>Requests</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a href="../pages/request_list.php">Received Requests</a>
                </li>
                <!-- <li>
                  <a href="../pages/plot_request.php"> Send Request </a>
                </li> -->
                
              </ul>
            </div>
          </li>


          <li class="header-menu">
            <span>Extra</span>
          </li>
          <!-- <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
               <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li> -->
          <!-- <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li> -->
          <li>
            <a href="profile.php">
            <i class="fa fa-cog"></i>
            <span>Profile</span>
            <span class="badge-sonar ml-2 mt-2"></span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <!-- <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a> -->
      <!-- <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a> -->
      <a href="#">
        <form action="../includes//logout.php" method="post">
          <button type="submit" name="logout" onClick="javascript: return confirm('You want to logout');"  class="btn btn-warning"> <i  class="fas fa-sign-out-alt"></i> </button>
        </form>
         
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
       <!-- <h2>Pro Sidebar</h2>
      <hr> -->
      <div class="row">
        <div class="form-group col-md-12">
          <?php
        // include('../pages/register.php')
          ?>
          <!-- <p>This is a responsive sidebar template with dropdown menu based on bootstrap 4 framework.</p>
          <p> You can find the complete code on <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
              Github</a>, it contains more themes and background image option</p>
        </div>
        <div class="form-group col-md-12">
          <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=star&count=true&size=small" frameborder="0" scrolling="0" width="90px" height="30px"></iframe>
          <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=fork&count=true&size=small" frameborder="0" scrolling="0" width="90px" height="30px"></iframe>
        </div>
        <div class="form-group col-md-12">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">New !</h4>
            <p>New react pro sidebar library is now available on <a href="https://www.npmjs.com/package/react-pro-sidebar" target="_blank">npm</a> <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank">
                <img alt="GitHub stars" src="https://img.shields.io/github/stars/azouaoui-med/react-pro-sidebar?style=social" />
              </a></p>
            <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank" class="btn btn-sm btn-primary mr-2">
              Github</a>
            <a href="https://azouaoui-med.github.io/react-pro-sidebar" target="_blank" class="btn btn-sm btn-success">
              Demo</a> -->

         
      <!-- <h5>More templates</h5>
      <hr>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="card rounded-0 p-0 shadow-sm">
            <img src="https://user-images.githubusercontent.com/25878302/58369568-a49b2480-7efc-11e9-9ca9-2be44afacda1.png" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center">
              <h6 class="card-title">Angular Pro Sidebar</h6>
              <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
              <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="card rounded-0 p-0 shadow-sm">
            <img src="https://user-images.githubusercontent.com/25878302/58369258-33f20900-7ef8-11e9-8ff3-b277cb7ed7b4.PNG" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center">
              <h6 class="card-title">Angular Dashboard</h6>
              <a href="https://github.com/azouaoui-med/lightning-admin-angular" target="_blank" class="btn btn-primary btn-sm">Github</a>
              <a href="https://azouaoui-med.github.io/lightning-admin-angular/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>
        </div>
      </div>
      <hr> -->

     