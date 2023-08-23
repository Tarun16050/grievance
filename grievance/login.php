<?php include 'database.php';
  session_start();
  if(isset($_REQUEST['User_type'])){
    $User_type = isset($_REQUEST['User_type']) ? stripslashes($_REQUEST['User_type']) : '' ;    
    if(!empty($User_type)){ $User_type = mysqli_real_escape_string($con, $User_type); }
      $email = isset($_REQUEST['email']) ? stripslashes($_REQUEST['email']) : '' ;   
      if(!empty($email)){ $email = mysqli_real_escape_string($con, $email); }
      $password = isset($_REQUEST['psw']) ? stripslashes($_REQUEST['psw']) : '' ;
      if(!empty($password)){ $password = mysqli_real_escape_string($con, $password); }        
      $query = "SELECT * FROM `registration_table` WHERE `email`='$email'AND `password`='$password' AND `User_type`='$User_type' " ;
      $result = mysqli_query($con, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {            
        $fetch_email = mysqli_fetch_assoc($result);
        $_SESSION['print_email'] = $fetch_email['email'];
        $_SESSION['print_mobile'] = $fetch_email['mobile'];
        $_SESSION['print_fname'] = $fetch_email['First_name'];
        $_SESSION['print_lname'] = $fetch_email['Last_name'];
        $_SESSION['print_address'] = $fetch_email['Address'];
        $_SESSION['print_pincode'] = $fetch_email['pincode']; 
        if(isset($User_type) && $User_type=='User'){header("Location: grievance.php");}
        // else{header("Location: dsdo.php"); }        
    }else {$_SESSION['msg'] = 'Invalid Email & Password!';}
    $query_dsdo = "SELECT * FROM `users` WHERE `email`='$email'AND `password`='$password' AND `role_type`='DSDO' " ;
    $result_dsdo = mysqli_query($con, $query_dsdo) or die(mysql_error());
    $rows_dsdo = mysqli_num_rows($result_dsdo);
    if ($rows_dsdo == 1){
      $fetch_emails = mysqli_fetch_assoc($result_dsdo);
      $_SESSION['print_emails'] = $fetch_emails['email'];
      $_SESSION['print_mobiles'] = $fetch_emails['mobile'];
      $_SESSION['print_fnames'] = $fetch_emails['first_name'];
      $_SESSION['print_lnames'] = $fetch_emails['last_name'];
      $_SESSION['print_dobs'] = $fetch_emails['DOB'];
      $_SESSION['print_genders'] = $fetch_emails['gender']; 
      if(isset($User_type) && $User_type=='DSDO'){header("Location: dsdo.php");}else {$_SESSION['msg'] = 'Invalid Email & Password!';}}   
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/comman.css">
  </head>
  <body>
    <?php  include 'header.php'; ?>
    <div class="container">
      <div class="title">Login</div>
      <p class="field_erros"><?= isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?></p>
      <?php unset($_SESSION['msg']); ?>
      <div class="content">
        <form action="login.php" id="grivence-login" method="post" class="grivence-login" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Select user Category</span>
              <select class="select" id="cars" name='User_type'  >
                <option value="Select Option">Select Option</option>
                <option value="User">User</option>
                <option value="DSDO">DSDO</option>              
              </select>
            </div>
          </div>
          <div id="hide_datas">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Email<span class="star">*</span></span>                
                <input type="text" placeholder="Enter your email" name="email" id="email">
                <p class="error field_erros" id="error-msg" hidden>This field is require!</p>                
              </div>
              <div class="input-box">
                <span class="details">Password<span class="star">*</span></span>
                <input type="password" placeholder="Enter your password"  name="psw"  id="psws">  
                <p class="error field_erros" id="error-msg-pswd" hidden>This field is require!</p>              
              </div>
            </div>
            <div >             
              <button type="submit" id="lgnSubmit" value="Login" name="submit"  >Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php  include 'footer.php'; ?>
    <script>
      $("#lgnSubmit").on("click", function(event){
        var psws = $("#psws").val();
        var email = $("#email").val();
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var errFlag = false;
        if(email == ''){$("#error-msg").show(); errFlag = true; }       
        else{$("#error-msg").hide(); errFlag = false; }
        $("#email").keyup(function(){$("#error-msg").hide();errFlag = false; });
        if(psws == ''){errFlag = true;$("#error-msg-pswd").show(); }
        else{errFlag = false;$("#error-msg-pswd").hide();}
        $("#psws").keyup(function(){errFlag = false;$("#error-msg-pswd").hide(); });
        if(errFlag == false){$("#grivence-login").submit();}
        else{event.preventDefault();}
      });
      var select_id  = document.getElementById('cars');  
      var hideclass  = document.getElementById('hide_datas');
      window.selct_values ='' ;
      hideclass.style.display = 'none';     
      select_id.addEventListener('change', function(){
        window.selct_values = select_id.value;
        if (select_id.value ==='Select Option'){hideclass.style.display ='none';}else{hideclass.style.display ='block';}
      });     
    </script>
  </body>
</html>




