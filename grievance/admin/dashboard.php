<?php include 'header/header_startding.php';?>
<div class="containerss">
    <div class="container_1">
        <h3 class='fc'>Admin User</h3>
        <?php $selectquery="SELECT count(*) as total from users WHERE role_type='Admin'";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
    <div class="container_1">
        <h3 class='fc'>DSDO User</h3>
        <?php $selectquery="SELECT count(*) as total from users WHERE role_type='DSDO'";              
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
    <div class="container_1">
        <h3 class='fc'>Register Users</h3>
        <?php $selectquery="SELECT count(*) as total from registration_table WHERE User_type ='User'";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
    <div class="container_1">
        <h3 class='fc'>Total Grievance</h3>
        <?php $selectquery="SELECT count(*) as total from grievance_table ";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
</div>
<div class="containerss">
    <div class="container_1" style="width: 20%">
        <h3 class='fc'>Total Grievance Pending</h3>
        <?php $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Pending'";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
    <div class="container_1" style="width: 20%">
        <h3 class='fc'>Total Grievance Resolved</h3>
        <?php $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Accept'";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>
    <div class="container_1" style="width: 20%">
        <h3 class='fc'>Total Grievance Reject</h3>
        <?php $selectquery="SELECT count(*) as total from grievance_table WHERE Status='Reject'";                
            $result=mysqli_query($con,$selectquery);
            $data=mysqli_fetch_assoc($result);  ?>
        <h2 class='tt'><?php  echo $data['total']; ?></h2>
    </div>  
</div>
<?php include 'header/header_ending.php';?>
                
