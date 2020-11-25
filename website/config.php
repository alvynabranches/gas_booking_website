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
    function redirect(string $redirect_page, bool $is_log_in=FALSE){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if($_SESSION==null){if(!$is_log_in){header("Location: $redirect_page");}}else{if($is_log_in){header("Location: $redirect_page");}}}
    function location_options($sql="select * from location order by location_name;",$host='localhost',$username='root',$password='',$db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$options="";while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";};return $options;}
    function exec_query($sql,$host='localhost',$username='root',$password='',$db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);return mysqli_query($con,$sql);}
    function login($username, $password){
        if(!isset($_COOKIE['PHPSESSID'])){session_start();}
        
    }
    function logout(){session_start();session_destroy();}
    function register(){
        if(isset($_POST['full_name']) && isset($_POST['full_address']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['location']) && isset($_POST['type'])){
            $name=$_POST['full_name'];
            $address=$_POST['full_address'];
            $user=$_POST['username'];
            $email=$_POST['email'];
            $pwd=$_POST['password'];
            $cnf_pwd=$_POST['confirm_password'];
            $location=$_POST['location'];
            $type=$_POST['type'];
            if($pwd == $cnf_pwd){
                $pwd=password_hash($pwd);
            }
            $sql="insert into customer(customer_name, customer_address, username, customer_email, password, customer_location_id, customer_type) values ('$name', '$address', '$user', '$email', '$pwd', '$location', '$type')";
            console_info($sql);
        }
    }
    // logout();
?>