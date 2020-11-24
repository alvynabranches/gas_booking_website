<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="project";
    $con=new mysqli($host,$username,$password,$db);
    if($con->connect_error){die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function todo(){include_once('config.php');$sql="select * from location;";$result=mysqli_query($con,$sql);while($row=mysqli_fetch_assoc($result)){echo "<option value='".$row['location_id']."'>".$row['location_name']."</option>";}}
?>