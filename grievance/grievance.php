<?php session_start(); include 'database.php';  error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comman.css">
    <style>.aa{background-color: rgb(190, 190, 190); }</style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse , navbar" >
        <div class="container-fluid">
          <div class="navbar-header"><a class="navbar-brand" href="">Grievance</a></div>
          <ul class="nav navbar-nav"><li ><a href="index.php">Home</a></li></ul>
          <ul class="nav navbar-nav"><li ><a href="traking.php">complaint Status</a></li> </ul>
          <ul class="nav navbar-nav navbar-right"><li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li></ul>
        </div>
      </nav> 
      <div class="sport_image"><img src="images/img.png" alt="sport_image_Navbar" class="img_sport"></div>
    </header>
    <div class="container">
      <div class="title">Grievance</div>
      <div class="content">
        <form action="grievance.php" method="post" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details ">First Name</span>
              <input type="text" placeholder="" required name="fname" readonly  value="<?php echo $_SESSION['print_fname'] ; ?>"  class="aa">
            </div>
            <div class="input-box">
              <span class="details ">Last Name</span>
              <input type="text" placeholder="Enter your Last Name" required name="lname" readonly value="<?php echo $_SESSION['print_lname']  ; ?> " class="aa">
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" placeholder="Enter your email" required  name="email"  readonly value="<?php echo $_SESSION['print_email'] ; ?>" class="aa">
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="tel" placeholder="Enter your number" required name="mobile" readonly value="<?php echo $_SESSION['print_mobile'] ; ?>"class="aa">
            </div>
            <div class="input-box">
              <span class="details">Postal Code</span>
              <input type="number" placeholder="Enter Pin Code" required name="pincode"readonly value="<?php echo $_SESSION['print_pincode']; ?>" class="aa">
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <textarea readonly  class="textarea aa" rows="4" cols="50" placeholder="Enter Full Address" required  name="Address"> <?php echo $_SESSION['print_address'] ; ?> </textarea>                  
            </div>
            <div class="input-box">
              <span class="details">Description<span class="star">*</span></span>
              <textarea  class="textarea" id="description" rows="10" cols="50"   name="Description" style="width: 639px; height: 105px;"></textarea> 
              <p id="errors_description" class="field_erros"></p>                  
            </div>
          </div>
          <div class="button"><input type="submit" value="Submit" name="submit"></div>
        </form>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
<?php
  $sql_DATAS = "SELECT * FROM grievance_table ORDER BY id DESC LIMIT 1";
  $result_DATAS = mysqli_query($con, $sql_DATAS);
  $row = mysqli_fetch_assoc($result_DATAS);
  if(!empty($row['ref_no'])){$x=$row['ref_no']+1; }else{$x = 12345678; }  
  if(isset($_POST['submit'])){
    $fname=testt($_POST['fname']);
    if($fname==''){header("Location: login.php");}else{
    $lname=testt($_POST['lname']);
    $email=testt($_POST['email']);
    $mobile=testt($_POST['mobile']);
    $pincode=testt($_POST['pincode']);
    $Address=testt($_POST['Address']); 
    $Description=testt($_POST['Description']);  
    if(empty($Description)){ ?><script>
      const inputElement  = document.getElementById('description');
      const errorElement  = document.getElementById('errors_description');
      errorElement.textContent = '';
      const inputValue = inputElement.value;
      if (inputValue === ''){errorElement.textContent = 'Description field is required'; }</script> <?php
    }else{
      $ins="INSERT INTO `grievance_table`(`First_name`, `Last_name`, `email`, `mobile`, `Description`,`Status`,`ref_no`) VALUES (' $fname','$lname','$email',' $mobile','$Description','Pending','$x')";
      $res=mysqli_query($con,$ins);
      if($res){
        $query="SELECT * FROM `grievance_table` WHERE `Description`='$Description' and `email`='$email'";            
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1){           
          $fetch_email = mysqli_fetch_assoc($result);
          $_SESSION['print_id'] = $fetch_email['ref_no'];
        } ?><script>
        alert("Complaint Has Been Successfully delivered  please note your refrence number : <?php echo $_SESSION['print_id'] ;  ?>");</script><?php
      }else{die("your Complaint is NOT Recored!");}  
    }   
  }
}
  function testt($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>