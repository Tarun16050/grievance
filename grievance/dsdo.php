<?php session_start(); include'database.php'; error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSDO Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>footer.footers {position: fixed;left: 0;bottom: 0;}</style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse , navbar" >
        <div class="container-fluid">
          <div class="navbar-header"><a class="navbar-brand" href="">Grievance</a></div>
          <ul class="nav navbar-nav"><li ><a href="index.php">Home</a></li> </ul>
          <ul class="nav navbar-nav"><li ><a href="traking.php">complaint Status</a></li> </ul>
          <ul class="nav navbar-nav navbar-right"><li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li></ul>
        </div>
      </nav> 
      <div class="sport_image">
        <div class="dsdo_information">
          name  <?php echo str_repeat('&nbsp;', 14).':&nbsp &nbsp'.$_SESSION['print_fnames'].' '.$_SESSION['print_lnames'];?> <br>
          Gender<?php echo str_repeat('&nbsp;', 12).':&nbsp &nbsp'.$_SESSION['print_genders'];?> <br>
          Date of Birth <?php echo str_repeat('&nbsp;', 1).':&nbsp &nbsp'.$_SESSION['print_dobs'];?><br>
          Mobile no <?php echo str_repeat('&nbsp;', 7).':&nbsp &nbsp'.$_SESSION['print_mobiles'];?><br>  
          Email <?php echo str_repeat('&nbsp;', 14).':&nbsp &nbsp'. $_SESSION['print_emails'];?><br>
        </div>
        <img src="images/img.png" alt="sport_image_Navbar" class="img_sport">
      </div>
    </header>
    <?php if(empty($_SESSION['print_fnames'])){header("Location: login.php");}else{?>      
    <div class="container_table">
      <h1> Grievance Table</h1>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Grievance ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">email ID</th>      
            <th scope="col">Mobile Number</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php               
            $sql="SELECT * FROM `grievance_table` WHERE `Status`='Pending' ";
            $querry= mysqli_query($con,$sql);
            $row=mysqli_num_rows($querry);
            if( $row)
            { $s_no=0;
              while($res=mysqli_fetch_array($querry))
              { $s_no++; 
          ?>
          <tr>
            <td><?php  echo $s_no  ; ?></td>
            <td><?php  echo $res['ref_no']; ?></td>
            <td><?php  echo $res['First_name']; ?></td>
            <td><?php  echo $res['Last_name']; ?></td>
            <td><?php  echo $res['email']; ?></td>
            <td><?php  echo $res['mobile']; ?></td>
            <td><?php  echo $res['Description']; ?></td>
            <td><?php  echo $res['Status']; ?></td>                                              
            <td><button class="fa fa-check-square-o btn_fa" onclick="checkAccept(<?php  echo $res['id']; ?>)" title="Accept" style="font-size:20px;">
                <button class="fa fa-times-circle btn_fa" onclick="checkDelete(<?php  echo $res['id']; ?>)" title="Reject" style="font-size:23px;">
            </td>
          </tr>
          <?php }}else{ ?> <h3 style="color: red;"> Grievance records are not available </h3> <?php }}?>
        </tbody> 
      </table>
    </div>
    <?php include 'footer.php'; ?>
  </body>
  <script type="text/javascript">
    function checkDelete(x) {
      var y = confirm('Are you sure Reject the complaint... ?');
      if(y){        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "reject.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(){
          if (xhr.readyState === 4 && xhr.status === 200){window.location.href = "dsdo.php";} 
          else if (xhr.readyState === 4) {console.log("Error updating status"); }
        };
        xhr.send("id=" + x);
      }
    }
    function checkAccept(x)    {
      var y = confirm('Are you sure Accept the complaint... ?');
      if(y){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "accept.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(){
          if (xhr.readyState === 4 && xhr.status === 200){window.location.href = "dsdo.php";} 
          else if (xhr.readyState === 4) {console.log("Error updating status");}
        };
        xhr.send("id=" + x);
      }
    }
  </script>
</html>
