<?php
    include 'database.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $sql = "SELECT * FROM registration_table WHERE email = '$email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {echo "exists";}else{echo "not_exists";}
    }
    $con->close();
?>
