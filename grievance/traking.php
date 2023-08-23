<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Status </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>footer.footers {position: fixed;left: 0;bottom: 0;}</style>
  </head>
  <body>
    <?php include 'database.php'; include 'header.php'; ?>
    <div class="container">
      <div class="title">Grievance Status</div>
      <div class="content">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box" id="iid">                   
              <input type="number" placeholder="Enter Reference Number" required name="fname" >              
            </div>
          </div>
          <div class="button" id="btn_hide"><input type="submit" value="Check Status 1" name="submit_1" ></div>
        </form>
        <form action="" method="post">
          <div class="user-details">
            <?php if(isset($_POST['submit_1'])){
            $name=$_POST['fname'];
            $sql="SELECT * FROM `grievance_table` WHERE `ref_no`='$name'  ";
            $querry= mysqli_query($con,$sql);
            $row=mysqli_num_rows($querry);
            if($row){$res=mysqli_fetch_array($querry)?><script> 
              var select_id  = document.getElementById('iid');  
              var btn_id  = document.getElementById('btn_hide');  
              select_id.style.display = 'none';
              btn_id.style.display = 'none';</script>                
              <div class="input-box"><input type="number"  name="ref_ids" value="<?php  echo $res['ref_no']; ?>"></div>
              <div class="input-box"><input type="tel" placeholder="Enter Reference Number" required name="mobile"></div>
          </div>
          <div class="button"><input type="submit" value="Check Status 2" name="submit_2"></div><?php 
          }else{ ?><script>alert("enter correct refrence number !!!! "); </script><?php }}  ?>
        </form>         
      </div>
    </div>
    </div>
    <?php if(isset($_POST['submit_2'])){
    $ref_ids=$_POST['ref_ids'];
    $mobile_no=$_POST['mobile'];
    $sql="SELECT * FROM `grievance_table` WHERE `ref_no`='$ref_ids' AND `mobile` = '$mobile_no' ";
    $querry= mysqli_query($con,$sql);
    $rows=mysqli_num_rows($querry);
    if($rows){?>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Tracking ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">email ID</th>      
            <th scope="col">Mobile Number</th>      
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while($ress=mysqli_fetch_array($querry)){ ?>
          <tr>
            <td><?php  echo $ress['ref_no']; ?></td>
            <td><?php  echo $ress['First_name']; ?></td>
            <td><?php  echo $ress['Last_name']; ?></td>
            <td><?php  echo $ress['email']; ?></td>
            <td><?php  echo $ress['mobile']; ?></td>                                     
            <td><?php  echo $ress['Status']; ?></td>                                              
          </tr><?php }}
          else{ ?> <script> alert("Mobile Number is Incorrect !!!!!"); </script><?php } } ?>                
        </tbody> 
      </table>
    </div>
    <?php include 'footer.php';  ?>
  </body>
</html>