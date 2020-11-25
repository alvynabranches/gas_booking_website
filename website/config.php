<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="project";
    $con=new mysqli($host,$username,$password,$db);
    if($con->connect_error){die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function location_options($sql="select * from location;",$host='localhost',$username='root',$password='',$db='project'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$options="";while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";};return $options;}
?>