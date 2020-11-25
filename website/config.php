<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="project";
    $con=new mysqli($host,$username,$password,$db);
    if($con->connect_error){die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function location_options($sql="select * from location;",$host='localhost',$username='root',$password='',$db='project'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$options="";while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";};return $options;}
    function redirect_when_session_null($redirect_page){
        if(!isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        if($_SESSION==null){
            header("Location: $redirect_page");
        }
    }
    $_SESSION['id'] = 10;
    function redirect_when_session_not_null($redirect_page){
        if(!isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        else{
            echo "Session Started";
            if($_SESSION==null){
            }
            else{
                header("Location: $redirect_page");
            }
        }
    }
    // redirect_when_session_not_null('index.php');
    echo "<script>console.log('Log message');</script>";
    echo "<script>console.warn('Warn message');</script>";
    echo "<script>console.error('Error message');</script>";
    echo "<script>console.info('Info message');</script>";
    echo "<script>console.assert('Assert message');</script>";
?>