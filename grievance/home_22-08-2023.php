<?php
include 'database.php';
// include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css" >

</head>
<body>
 <header>
<nav class="navbar navbar-inverse , navbar" >
  <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">Grievance</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li ><a href="traking.php">complaint Status</a></li> 
          
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Signin</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <!-- <li><a href=""><span class="glyphicon glyphicon-user"></span> Admin panel</a></li> -->
        </ul>
  </div>
</nav>
 
<!-- <div class="sport_image">
  <img src="images/img.png" alt="sport_image_Navbar" class="img_sport">
</div> -->
</header> 
  <!-- **************************************-->
<div class="back-video">
<video autoplay loop plays-inline muted>
  <source src="images/Untitled design.mp4" type="video/mp4">
</video>

</div>
  <!-- **************************************-->
  <div class="container">
                <div class="container_1">

                    <h3 class='fa'>Total User Registered</h3>
                <?php
                    include "database.php";
                    $selectquery="SELECT count(*) as total from registration_table";
                    // $query=mysqli_query($con,$selectquery);
                    //while($res=mysqli_fetch_array($query));
                    $result=mysqli_query($con,$selectquery);
                    $data=mysqli_fetch_assoc($result);
                    
                    
                ?>
                    <div>
                    <h2 class='tt'><?php  echo $data['total']; ?></h2>
                    </div>
                </div>
                    <div class="container_1">

                    <h3 class='fb'>Total Grievance</h3>
                    <?php
                        include "database.php";
                        $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Accept'";
                        // $query=mysqli_query($con,$selectquery);
                        //while($res=mysqli_fetch_array($query));
                        $result=mysqli_query($con,$selectquery);
                        $data=mysqli_fetch_assoc($result);
                        
                    
                    ?>
                    <h2 class='tt'><?php  echo $data['total']; ?></h2>

                    </div>
            <div class="container_1">

            <h3 class='fc'>Grievance Resolved! </h3>

            <?php
                include "database.php";
                $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Accept'";
                // $query=mysqli_query($con,$selectquery);
                //while($res=mysqli_fetch_array($query));
                $result=mysqli_query($con,$selectquery);
                $data=mysqli_fetch_assoc($result);
                
            
            ?>
            <h2 class='tt'><?php  echo $data['total']; ?></h2>

            </div>
  </div>
  
  <!-- </div> -->

  <div class="sport_foot">
    <marquee class='mar' 	scrollamount = "25"   hspace = "20" vspace = "20" loop='100' styles='white-space:pre-line ;'>
  <img src="images/s4.jpg" alt="sport_image_Navbar" class="img_sport">
  <img src="images/s3.jpg" alt="sport_image_Navbar" class="img_sport">
  <img src="images/s2.jpg" alt="sport_image_Navbar" class="img_sport">
  <img src="images/s1.jpg" alt="sport_image_Navbar" class="img_sport">
  <img src="images/s5.jpg" alt="sport_image_Navbar" class="img_sport">
  </marquee>
</div>

  <footer  class="footers">
    <!-- <div class="footer"> -->
    <small>Copyright &copy; By Tarun Patidar</small>
    <!-- </div> -->
  </footer>





</body>
</html>