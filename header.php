<?php
$DBNAME = 'attendance';
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$PORT = 8080;
$connection = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME, $PORT || 80);
session_start();

if (!isset($_SESSION['email'])) {
   $currentPage = $_SERVER['PHP_SELF'];

   if (! strpos($currentPage, 'login') && !strpos($currentPage, 'signup')) {
       header('Location', 'login.php');
   }
} else {
    $currentPage = $_SERVER['PHP_SELF'];

    if (strpos($currentPage, 'login') || strpos($currentPage, 'signup')) {
        header('Location', 'index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Attendance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list.php">List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Student List
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="attended.php">Attended</a>
          <a class="dropdown-item" href="absent.php">Absent</a>
          <a class="dropdown-item" href="new-list.php">Create new List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="signup.php">Register</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
