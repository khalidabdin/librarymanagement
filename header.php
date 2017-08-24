<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/showhint.js"></script>
    <script type="text/javascript" src="../js/validate_matching.js"></script>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

     <link rel="icon" type="image/png" href="logoLibrary.PNG"/>
     <link href = "mainstyle.css" rel = "stylesheet">
    <link href = "form.css" rel = "stylesheet">
    
     <style>
         div ul li a:hover{
             background-color: cornflowerblue;
         }
        .navbar-brand:hover{
             background-color: cornflowerblue;
         }
         
         footer{
          background-color: #006fff;
	      margin-top: 8.8%;
             position:fixed;
	       
	       bottom:0;
	       left:0;
        }
    
     </style>

</head>

<body>
<body background="logoLibrary2.PNG">
<!--NavBar-->
<div class="container" style="margin-top: 3%">
<nav class="navbar navbar-toggleable-md fixed-top navbar-light bg-primary" id="top-bar">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="../html/index.php" style="color: floralwhite">
    <img src ="logoLibrary.PNG" width="30" height="30" class="d-inline-block align-top" alt="Logo pic">
    Z.U.L.</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" style="font-weight: bold; color: floralwhite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../html/adminLogin.php" style="font-weight: bold; font-size: 120%">Administrator Login</a>
          <a class="dropdown-item" href="../html/clientLogin.php" style="font-weight: bold; font-size: 120%">Student Login</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../html/aboutUs.php" style="color: floralwhite">About Us<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../html/accessibility.php" style="color: floralwhite">Accessibility <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../html/contactUs.php" style="color: floralwhite">Contact Us<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>