<?php include 'database.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/welcome.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="container">
      <div class="container_1">
        <h3 class='fa'>Total User Registered</h3>
        <?php 
        include "database.php";
        $selectquery="SELECT count(*) as total from registration_table";
        $result=mysqli_query($con,$selectquery);
        $data=mysqli_fetch_assoc($result);?>
        <div><h2 class='tt'><?php  echo $data['total']; ?></h2></div>
      </div>
      <div class="container_1">
        <h3 class='fb'>Total Grievance</h3>
        <?php
        include "database.php";
        $selectquery="SELECT count(*) as total from grievance_table";
        $result=mysqli_query($con,$selectquery);
        $data=mysqli_fetch_assoc($result);?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
      </div>
      <div class="container_1">
        <h3 class='fc'>Total Grievance resolved</h3>
        <?php
        include "database.php";
        $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Accept' OR Status='Reject'";
        $result=mysqli_query($con,$selectquery);        
        $data=mysqli_fetch_assoc($result); ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
      </div>
    </div>
    <div class="sport_foot">
      <marquee class='mar' 	scrollamount = "25"   hspace = "20" vspace = "20" loop='100' >
        <img src="images/s4.jpg" alt="sport_image_Navbar" class="img_sporttt">
        <img src="images/s3.jpg" alt="sport_image_Navbar" class="img_sporttt">
        <img src="images/s2.jpg" alt="sport_image_Navbar" class="img_sporttt">
        <img src="images/s1.jpg" alt="sport_image_Navbar" class="img_sporttt">
        <img src="images/s5.jpg" alt="sport_image_Navbar" class="img_sporttt">
      </marquee>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>