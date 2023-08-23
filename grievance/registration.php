<?php include 'database.php'; 
  if(isset($_REQUEST['email'])){  
    $error_emails='';
    $email = isset($_REQUEST['email']) ? stripslashes($_REQUEST['email']) : '' ;      
    if(!empty($email)){ $email = mysqli_real_escape_string($con, $email); }
    $sql = "SELECT * FROM registration_table WHERE email = '$email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) { $error_emails = 'email is allredy register';} 
  }
  if(isset($_POST['submit']))  {
    $error = [];
    $fname=testt($_POST['fname']);
    $lname=testt($_POST['lname']);
    $DOB=testt($_POST['DOB']);
    $gender=testt($_POST['gender']);
    $User_type=testt($_POST['user_type']);
    $District=testt($_POST['District']);
    $Block=testt($_POST['Block']);
    $Vilage=testt($_POST['Vilage']);
    $pincode=testt($_POST['pincode']);
    $Address=testt($_POST['Address']); 
    $mobile=testt($_POST['mobile']);
    $email=testt($_POST['email']);
    if(isset($email) && empty($email)){ $error['email'] = "Please enter your email"; }
    else{$sql = "SELECT * FROM registration_table WHERE email = '$email'";
        $result = $con->query($sql);
        if($result->num_rows > 0) {  $error['email'] = "email is allready register "; } }
    $psw=testt($_POST['psw']);
    $cpsw=testt($_POST['cpsw']);
    $image=$_FILES['image'];
    $opt='Select Option';
    $filename=$image['name'];//file name 
    $filerror=$image['error'];//error check
    $filetemp=$image['tmp_name'];//tempary store
    $fileext=explode('.',$filename);
    $filelowext=strtolower(end($fileext));
    $extention=array('png','jpg','jpeg','jfif');  
    if(!in_array($filelowext,$extention)){$error['image'] = "Only used png,jpg,jpeg,jfif ";}
    if(empty($error)){
      if(in_array($filelowext,$extention)){        
        $jagah='images/'.$filename;
        move_uploaded_file($filetemp,$jagah); 
      }
      $ins="INSERT INTO `registration_table`(`First_name`, `Last_name`, `DOB`, `gender`, `User_type`, `District`, `Block`, `Vilage`, `pincode`, `Address`, `mobile`, `email`, `password`, `image`) VALUES ('$fname','$lname','$DOB','$gender','$User_type','$District','$Block','$Vilage','$pincode','$Address','$mobile','$email','$psw','$jagah')";
      $res=mysqli_query($con,$ins);
      if($res){?><script>alert("Registration Has Been Successfully ");</script><?php }
      else{ ?><script>alert("Your From is not Submitted ");</script><?php }  }
  }
  function testt($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comman.css">
  </head>
  <body>
    <?php  include 'header.php'; ?>
    <div class="container">
      <div class="title">Registration</div>
      <div class="information">Basic Information</div><hr/>
        <div class="content">
          <form action="registration.php" method="post" enctype="multipart/form-data" id="registration_form">
            <div class="user-details">
              <div class="input-box">
                <span class="details">First Name<span class="star">*</span></span>
                <input type="text" placeholder="Enter your First name"  name="fname" id="first_name" value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>">
                <p id="errors_first_name" class="field_erros"></p>
              </div>
              <div class="input-box">
                <span class="details">Last Name<span class="star">*</span></span>
                <input type="text" placeholder="Enter your Last Name"  name="lname"id="last_name" value="<?= isset($_POST['lname']) ? $_POST['lname'] : ''; ?>">
                <p id="errors_last_name" class="field_erros"></p>
              </div>
              <div class="input-box">
                <span class="details">Date Of Birth<span class="star">*</span> </span>
                <input type="date" placeholder="Enter your Date of Birth"   name="DOB" id="dob" value="<?= isset($_POST['DOB']) ? $_POST['DOB'] : ''; ?>">
                <p id="errors_dob" class="field_erros"></p>
              </div>
              <div class="input-box">
                <span class="details">Upload Image<span class="star">*</span></span>
                <input type="File" placeholder="Upload image"  name="image" id="upload_img">
                <p id="errors_upload_img" class="field_erros"> <?= isset($error['image']) ? $error['image'] : ''; ?> </p>
              </div>
              <div class="input-box">
                <span class="details" name="gender">Gender<span class="star">*</span></span>
                <select class="select" id="gender" name="gender"  value="<?= isset($_POST['gender']) ? $_POST['gender'] : ''; ?>">
                  <option value="Select Option">Select Option</option>
                  <option value="Male" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                  <option value="Female"  <?= (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                  <option value="Other" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>                      
                </select>   
                <p id="errors_gender" class="field_erros"></p>          
              </div>
              <div class="input-box">
                <span class="details">Select user Category<span class="star">*</span></span>
                <select class="select" id="Category" name='user_type' value="<?= isset($_POST['user_type']) ? $_POST['user_type'] : ''; ?>">
                  <option value="Select Option">Select Option</option>
                  <option value="User" <?= (isset($_POST['user_type']) && $_POST['user_type'] == 'User') ? 'selected' : ''; ?>>User</option>             
                </select>
                <p id="errors_Category" class="field_erros"></p>  
              </div>                
            </div>
            <div class="information">Address and Contact details</div><hr/>
            <div class="user-details">
              <div class="input-box">
                <span class="details">District<span class="star">*</span></span>
                <input type="text" placeholder="Enter your District Name"  name="District" id="district" value="<?= isset($_POST['District']) ? $_POST['District'] : ''; ?>">
                <p id="errors_District" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Block/Zone<span class="star">*</span></span>
                <input type="text" placeholder="Enter your Block Name"  name="Block" id="block" value="<?= isset($_POST['Block']) ? $_POST['Block'] : ''; ?>">
                <p id="errors_Block" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Village / Ward<span class="star">*</span></span>
                <input type="text" placeholder="Enter your Village"  name="Vilage" id="village" value="<?= isset($_POST['Vilage']) ? $_POST['Vilage'] : ''; ?>">
                <p id="errors_Village" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Postal Code<span class="star">*</span></span>
                <input type="number" placeholder="Enter Pin Code"  name="pincode" id="postal" value="<?= isset($_POST['pincode']) ? $_POST['pincode'] : ''; ?>">
                <p id="errors_Postal" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Address<span class="star">*</span></span>
                <textarea  class="textarea" rows="4" cols="50" placeholder="Enter Full Address"   name="Address" id="address" ><?= isset($_POST['Address']) ? $_POST['Address'] : ''; ?></textarea>                  
                <p id="errors_Address" class="field_erros"></p> 
              </div>
            </div>
            <div class="information">Login Details</div><hr/>
            <div class="user-details">
              <div class="input-box">
                <span class="details">Email<span class="star">*</span></span>
                <input type="text" placeholder="Enter your email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>"  name="email" id="email">
                <p id="errors_Email" class="field_erros"><?= isset($error['email']) ? $error['email'] : ''; ?></p> 
              </div>
              <div class="input-box">
                <span class="details">Phone Number<span class="star">*</span></span>
                <input type="tel" placeholder="Enter your number"  name="mobile" id="phone" value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : ''; ?>">
                <p id="errors_Phone" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Password<span class="star">*</span></span>
                <input type="password" placeholder="Enter your password"  name="psw" id="password" value="<?= isset($_POST['psw']) ? $_POST['psw'] : ''; ?>">
                <p id="errors_Password" class="field_erros"></p> 
              </div>
              <div class="input-box">
                <span class="details">Confirm Password<span class="star">*</span></span>
                <input type="password" placeholder="Confirm your password"  name="cpsw" id="confirm_Password" value="<?= isset($_POST['cpsw']) ? $_POST['cpsw'] : ''; ?>">
                <p id="errors_Confirm_Password" class="field_erros"></p> 
              </div>
            </div>    
            <div class="button">
              <input type="submit" value="Register" name="submit">
            </div>
        </form>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
    <script src="js/validation.js"></script>
    <script src="js/emailvalidation.js"></script>
  </body>
</html> 






          