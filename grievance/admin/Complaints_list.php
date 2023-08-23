
<?php include 'header/header_startding.php';?> 
  <div class="" id="all_complaints" style="margin-top: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading " id="panel">
        Complaints List (All)                
        </div>
        <div id="panel_body" class="panel-body" >
            <table class="table table-hover" id="table_all">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Reference No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>                       
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="    width: 300px;">Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php            
            $sql = "SELECT * FROM `grievance_table`";
            $querry = mysqli_query($con, $sql);
            $row=mysqli_num_rows($querry);
            if( $row)
            {
              $s_no=0;             
              while($res=mysqli_fetch_array($querry))
              {               
                $s_no++;
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
                  </tr>
                <?php
              }
            }
            else{ ?> <h3 style="color: red;"> Complaints records are not available </h3> <?php } ?>       
                                               
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="" id="" style="margin-top: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading " id="panel_pending">
          Complaints List (Pending)                   
        </div>
        <div id="panel_body_pending" class="panel-body" >
            <table class="table table-hover" id="table_pending">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Reference No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>                       
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width: 300px;">Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * FROM `grievance_table`WHERE `Status`='Pending'";
            $querry = mysqli_query($con, $sql);
            $row=mysqli_num_rows($querry);
            if( $row)
            {
              $s_no=0;              
              while($res=mysqli_fetch_array($querry))
              {                
                $s_no++;
                ?>
                  <tr>
                    <td><?php  echo $s_no  ; ?></td> 
                    <td><?php  echo $res['ref_no']; ?></td>                   
                    <td><?php  echo $res['First_name']; ?></td>
                    <td><?php  echo $res['Last_name']; ?></td>                    
                    <td><?php  echo $res['email']; ?></td>
                    <td><?php  echo $res['mobile']; ?></td>
                    <td><?php  echo $res['Description']; ?></td>
                    <td >                      
                      <button class="fa fa-edit btn_fa" onclick="checkAccept(<?php echo $res['id'];   ?>)" title="Accept" style="font-size:20px;" >
                    <button class="fa fa-times-circle btn_fa" onclick="checkDelete(<?php echo $res['id'];  ?>)" title="Reject" style="font-size:23px;"></td>
                  </tr>
                <?php
              }
            }
            else{ ?> <h3 style="color: red;">Pending Complaints records are not available </h3> <?php } ?>       
                                               
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="" id="" style="margin-top: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading " id="panel_accept">
          Complaints List (Accept)                 
        </div>
        <div id="panel_body_accept" class="panel-body" >
            <table class="table table-hover" id="table_accept">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Reference No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>                       
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width: 300px;">Description</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * FROM `grievance_table`WHERE `Status`='Accept' ";
            $querry = mysqli_query($con, $sql);
            $row=mysqli_num_rows($querry);
            if( $row)
            {
              $s_no=0;              
              while($res=mysqli_fetch_array($querry))
              {                
                $s_no++;
                ?>
                  <tr>
                    <td><?php  echo $s_no  ; ?></td> 
                    <td><?php  echo $res['ref_no']; ?></td>                   
                    <td><?php  echo $res['First_name']; ?></td>
                    <td><?php  echo $res['Last_name']; ?></td>                    
                    <td><?php  echo $res['email']; ?></td>
                    <td><?php  echo $res['mobile']; ?></td>
                    <td><?php  echo $res['Description']; ?></td>
                    </tr>
                <?php
              }
            }
            else{ ?> <h3 style="color: red;">Accept  Complaints records are not available </h3> <?php } ?>       
                                               
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="" id="" style="margin-top: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading " id="panel_reject">
          Complaints List (Reject)               
        </div>
        <div id="panel_body_reject" class="panel-body" >
            <table class="table table-hover" id="table_reject">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Reference No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>                       
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width: 300px;">Description</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * FROM `grievance_table`WHERE `Status`='Reject' ";
            $querry = mysqli_query($con, $sql);
            $row=mysqli_num_rows($querry);
            if( $row)
            {
              $s_no=0;              
              while($res=mysqli_fetch_array($querry))
              {                
                $s_no++;
                ?>
                  <tr>
                    <td><?php  echo $s_no  ; ?></td> 
                    <td><?php  echo $res['ref_no']; ?></td>                   
                    <td><?php  echo $res['First_name']; ?></td>
                    <td><?php  echo $res['Last_name']; ?></td>                    
                    <td><?php  echo $res['email']; ?></td>
                    <td><?php  echo $res['mobile']; ?></td>
                    <td><?php  echo $res['Description']; ?></td>
                    </tr>
                <?php
              }
            }
            else{ ?> <h3 style="color: red;">Reject Complaints records are not available </h3> <?php } ?>       
                                               
                </tbody>
            </table>
        </div>
    </div>
  </div>
  

<?php include 'header/header_ending.php';?>
<script > 
  $(document).ready(function(){
    let table = new DataTable('#table_all');
    $("#panel_body").hide();
    $("#panel").click(function(){      
      $("#panel_body_pending").hide();
      $("#panel_body_accept").hide();
      $("#panel_body_reject").hide();
      $("#panel_body").slideToggle("slow");
    });    
  });
  $(document).ready(function(){   
    let table = new DataTable('#table_pending'); 
    $("#panel_body_pending").hide();
    $("#panel_pending").click(function(){     
      $("#panel_body").hide();
      $("#panel_body_accept").hide();
      $("#panel_body_reject").hide();
      $("#panel_body_pending").slideToggle("slow");
    });
  });
  $(document).ready(function(){
    let table = new DataTable('#table_accept');   
    $("#panel_body_accept").hide();
    $("#panel_accept").click(function(){      
      $("#panel_body").hide();
      $("#panel_body_pending").hide();
      $("#panel_body_reject").hide();
      $("#panel_body_accept").slideToggle("slow");
    });
  });
  $(document).ready(function(){
    let table = new DataTable('#table_reject'); 
    $("#panel_body_reject").hide();
    $("#panel_reject").click(function(){     
      $("#panel_body").hide();
      $("#panel_body_pending").hide();
      $("#panel_body_accept").hide();
      $("#panel_body_reject").slideToggle("slow");
    });
  });
  function checkDelete(x)
    {
      var y = confirm('Are you sure Reject the complaint... ?');
      if (y) 
      {
        // Send an AJAX request to update the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../reject.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() 
        {
          if (xhr.readyState === 4 && xhr.status === 200) 
          {
          // Redirect to dsdo.php if the update is successful
          window.location.href = "Complaints_list.php";
          } 
          else if (xhr.readyState === 4) {console.log("Error updating status"); }
        };
        xhr.send("id=" + x);
      }
    }

    function checkAccept(x)
    {
        var y = confirm('Are you sure Accept the complaint... ?');
        if (y) 
        {
          // Send an AJAX request to update the database
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../accept.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() 
          {
            if (xhr.readyState === 4 && xhr.status === 200) 
            {
              // Redirect to dsdo.php if the update is successful
              window.location.href = "Complaints_list.php";
            } 
            else if (xhr.readyState === 4) {console.log("Error updating status");}
          };
          xhr.send("id=" + x);
        }
    }
  </script>