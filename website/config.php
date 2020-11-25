<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="gas_booking_system";
    $con=new mysqli($host,$username,$password,$db);
    error_reporting(0);
    session_start();
    if($con->connect_error){console_error("Connection failed to mysql");die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function location_options($sql="select * from location order by location_name;",$host='localhost',$username='root',$password='',$db='project'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$options="";while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";};return $options;}
    function redirect(string $redirect_page, bool $is_log_in=FALSE){
        if(!isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        if($_SESSION==null){
            if(!$is_log_in){
                header("Location: $redirect_page");
            }
        }
        else{
            if($is_log_in){
                header("Location: $redirect_page");
            }
        }
    }
    function logout(){session_start();session_destroy();}
    // function register(){
    //     if isset($_POST['name']) && isset($_POST['address']) && isset($_POST['username']){

    //     }
    // }
    // logout();
?>