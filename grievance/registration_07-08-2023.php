<?php
include 'database.php';
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
  <header>
    <nav class="navbar navbar-inverse , navbar" >
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">Grievance</a>
        </div>
        <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
          <li ><a href="traking.php">complaint Status</a></li>     
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>  
    <div class="sport_image">
      <img src="images/img.png" alt="sport_image_Navbar" class="img_sport">
    </div>
  </header>

  <div class="container">
    <div class="title">Registration</div>
          <div class="information">Basic Information</div>
          <hr>
    <div class="content">
      <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name<span class="star">*</span></span>
            <input type="text" placeholder="Enter your First name"  name="fname" id="first_name">
            <p id="errors_first_name" class="field_erros"></p>
          </div>
          <div class="input-box">
            <span class="details">Last Name<span class="star">*</span></span>
            <input type="text" placeholder="Enter your Last Name"  name="lname"id="last_name">
            <p id="errors_last_name" class="field_erros"></p>
          </div>

                    <div class="input-box">
                      <span class="details">Date Of Birth<span class="star">*</span> </span>
                      <input type="date" placeholder="Enter your Date of Birth"   name="DOB" id="dob">
                      <p id="errors_dob" class="field_erros"></p>
                    </div>

                      <div class="input-box">
                        <span class="details">Upload Image<span class="star">*</span></span>
                        <input type="File" placeholder="Upload image"  name="image" id="upload_img">
                        <p id="errors_upload_img" class="field_erros"></p>
                      </div>
                      <div class="input-box">
                            <span class="details" name="gender">Gender<span class="star">*</span></span>
                            <select class="select" id="genders" name="gender"  >
                              <option value="Select Option">Select Option</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>                      
                            </select>   
                            <p id="errors_gender" class="field_erros"></p>          
                        </div>
                        
                      <div class="input-box">
                        <span class="details">Select user Category<span class="star">*</span></span>
                        <select class="select" id="user_type" name='User_type' >
                          <option value="Select Option">Select Option</option>
                          <option value="User">User</option>
                          <!-- <option value="DSDO">DSDO</option>               -->
                        </select>
                        <p id="errors_Category" class="field_erros"></p>  
                      </div>

                        
       </div>
       
                    <div class="information">Address and Contact details</div>
                    <hr/>

        <div class="user-details">
                <div class="input-box">
                  <span class="details">District<span class="star">*</span></span>
                  <input type="text" placeholder="Enter your District Name"  name="District" id="district">                  
                  <p id="errors_District" class="field_erros"></p> 
                </div>

                <div class="input-box">
                  <span class="details">Block/Zone<span class="star">*</span></span>
                  <input type="text" placeholder="Enter your Block Name"  name="Block" id="block">
                  <p id="errors_Block" class="field_erros"></p> 
                </div>

                <div class="input-box">
                  <span class="details">Village / Ward<span class="star">*</span></span>
                  <input type="text" placeholder="Enter your Village"  name="Vilage" id="village">
                  <p id="errors_Village" class="field_erros"></p> 
                </div>

                <div class="input-box">
                  <span class="details">Postal Code<span class="star">*</span></span>
                  <input type="number" placeholder="Enter Pin Code"  name="pincode" id="postal">
                  <p id="errors_Postal" class="field_erros"></p> 
                </div>

                <div class="input-box">
                  <span class="details">Address<span class="star">*</span></span>
                  <textarea  class="textarea" rows="4" cols="50" placeholder="Enter Full Address"   name="Address" id="address" required></textarea>                  
                  <p id="errors_Address" class="field_erros"></p> 
                </div>
               
        </div>
              <div class="information">Login Details</div>
              <hr>

          <div class="user-details">
                    <div class="input-box">
                      <span class="details">Email<span class="star">*</span></span>
                      <input type="email" placeholder="Enter your email"   name="email" id="email">
                      <p id="errors_Email" class="field_erros"></p> 
                    </div>

                      <div class="input-box">
                        <span class="details">Phone Number<span class="star">*</span></span>
                        <input type="tel" placeholder="Enter your number"  name="mobile" id="phone">
                        <p id="errors_Phone" class="field_erros"></p> 
                      </div>

                        <div class="input-box">
                          <span class="details">Password<span class="star">*</span></span>
                          <input type="password" placeholder="Enter your password"  name="psw" id="password">
                          <p id="errors_Password" class="field_erros"></p> 
                        </div>

                        <div class="input-box">
                          <span class="details">Confirm Password<span class="star">*</span></span>
                          <input type="password" placeholder="Confirm your password"  name="cpsw" id="confirm_Password" >
                          <p id="errors_Confirm_Password" class="field_erros"></p> 
                          
                        </div>

          </div>
          
    <div class="user_fill_error"> 

               


<?php

if(isset($_POST['submit']))
{

  $fname=testt($_POST['fname']);
  $lname=testt($_POST['lname']);
  $DOB=testt($_POST['DOB']);
  $gender=testt($_POST['gender']);
  $User_type=testt($_POST['User_type']);
  $District=testt($_POST['District']);
  $Block=testt($_POST['Block']);
  $Vilage=testt($_POST['Vilage']);
  $pincode=testt($_POST['pincode']);
  $Address=testt($_POST['Address']); 
  $mobile=testt($_POST['mobile']);
  $email=testt($_POST['email']);
  $psw=testt($_POST['psw']);
  $cpsw=testt($_POST['cpsw']);
  $image=$_FILES['image'];
  $opt='Select Option';


  $filename=$image['name'];//file name 
  $filerror=$image['error'];//error check
  $filetemp=$image['tmp_name'];//tempary store
  $fileext=explode('.',$filename);
  $filelowext=strtolower(end($fileext));
  $extention=array('png','jpg','jpeg','pdf','jfif');

            $sql="SELECT * FROM `registration_table` WHERE `email`='$email' ";
            $check_email=mysqli_query($con,$sql);
            $rowCount=mysqli_num_rows($check_email);

            if($rowCount>0){        
                echo"email already exists! </br>";
            }              

            if($psw !==$cpsw ){
              echo"password Not matched! </br>";

            }

            if($gender==$opt){
              echo"Please Select Gender <br><br>";
            }
            if($User_type==$opt){
              echo"Please Select 'Select user Category' <br><br>" ;
            }
           
            else{
                    if(in_array($filelowext,$extention)){
                          // $jagah=$filename;
                          $jagah='images/'.$filename;
                          move_uploaded_file($filetemp,$jagah);//upload file in folder 
                              if(empty($jagah)){
                                echo"plese select imagae";
                              }
                              
                            else{
                                      $ins="INSERT INTO `registration_table`(`First_name`, `Last_name`, `DOB`, `gender`, `User_type`, `District`, `Block`, `Vilage`, `pincode`, `Address`, `mobile`, `email`, `password`, `image`) VALUES ('$fname','$lname','$DOB','$gender','$User_type','$District','$Block','$Vilage','$pincode','$Address','$mobile','$email','$psw','$jagah')";
                                      $res=mysqli_query($con,$ins);
                                      if($res){
                                          ?>
                                            <script>
                                              alert("Registration Has Been Successfully ");
                                          </script>
                                          <?php
                                      }
                                      else{
                                          die("your data is NOT Recored!");
                                      }
                            }
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


</div>
<div class="button">
                 <input type="submit" value="Register" name="submit" onclick="validateInput()">
  </div>

    </form>
  </div>
 </div>



<footer  class="footers">
    <div class="footer">
    <small>Copyright &copy; By Tarun Patidar</small>
    </div>
  </footer>

<script type="text/javascript">
  function validateInput() {
    const genderr  = document.getElementById('genders');
    const gender_error  = document.getElementById('errors_gender');
    const user_types  = document.getElementById('user_type');
    const user_types_errror  = document.getElementById('errors_Category');
    const password  = document.getElementById('password');
    const confirm_Password  = document.getElementById('confirm_Password');
    const confirm_Password_error  = document.getElementById('errors_Confirm_Password');


    const inputElement0 = ["first_name", "last_name", "dob","upload_img","district","block","village","postal","address","email","phone","password","confirm_Password"];
    const errorElement0 = ["errors_first_name", "errors_last_name", "errors_dob","errors_upload_img","errors_District","errors_Block","errors_Village","errors_Postal","errors_Address","errors_Email","errors_Phone","errors_Password","errors_Confirm_Password"]; 
    const fiels_name =["First Name","Last Name","Date Of Birth","Upload Image","District","Block/Zone","Village / Ward","Postal Code","Address","Email","Phone Number","Password","Confirm Password"]; 
    let length = inputElement0.length;
    console.log(length);
    console.log(genderr.value);
    
  for (let i = 0; i < inputElement0.length; i++) {
    const inputElement  = document.getElementById(inputElement0[i]);
    const errorElement  = document.getElementById(errorElement0[i]);
    errorElement.textContent = '';
    const inputValue = inputElement.value;
  if (inputValue === '') {  errorElement.textContent = fiels_name[i]+' Field is required';  }
  else if(confirm_Password.value != confirm_Password_error.value){confirm_Password_error.textContent = "password Not matched";}
  
  }

  if(genderr.value ==='Select Option'){  gender_error.textContent = "Please Select Gender" }
  if(user_types.value ==='Select Option'){ user_types_errror.textContent = "Please Select user Category" }


//   const pswd_1 = $('#password').value;
//   const confirm_pswd_1 = $('#confirm_Password').value;
//   if(pswd_1 != confirm_pswd_1) {  $('#errors_Confirm_Password').textContent = "password Not matched!"  }   



}
</script>
</body>

</html>