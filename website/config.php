<?php
    error_reporting(0);session_start();
    define('REPORT', TRUE);define('DB_SERVER', 'localhost');define('DB_USERNAME', 'root');define('PASSWORD', '');define('DB', 'gas_booking_system');$con=new mysqli(DB_SERVER,DB_USERNAME,PASSWORD,DB);
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function redirect(string $redirect_page, bool $is_log_in=FALSE){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if($_SESSION==null){if(!$is_log_in){header("Location: $redirect_page");}}else{if($is_log_in){header("Location: $redirect_page");}}}
    function exec_query($sql,$host='localhost',$username='root',$password='',$db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$con->close();return $result;}
    function location_options($sql="select * from location order by location_name;"){$result=exec_query($sql);$options="";if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";}};return $options;}
    function login(){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if(isset($_POST['username'])&&isset($_POST['password'])){$user=$_POST['username'];$pwd=$_POST['password'];$sql="select customer_id as id, customer_name as cn, password as pd from customer where username='$user';";$result=exec_query($sql);if($result->num_rows==1){while($row=mysqli_fetch_assoc($result)){$id=$row['id'];$cn=$row['cn'];$pd=$row['pd'];if(REPORT){console_info('Username Found!');}}}else{if(REPORT){console_warn('User Not Found!');}}$password_check=password_verify($pwd, $pd);if($password_check){$_SESSION['id']=$id;$_SESSION['name']=$id;$_SESSION['username']=$user;header('Location: user.php');redirect('user.php', TRUE);if(REPORT){console_info($_SESSION['id']);console_info($_SESSION['name']);console_info($_SESSION['username']);}if(REPORT){console_log('Logged In Successfully!');}}else{if(REPORT){console_warn('Password Incorrect!');}echo "<script>alert('Password Incorrect!');</script>";}}}
    function logout(){session_start();session_unset();if(REPORT){console_info('Logged Out Successfully!');}}
    function logout_user(){if(isset($_GET['action'])){if($_GET['action'] == 'logout'){logout();}}}
    function register(){if(isset($_POST['full_name'])&&isset($_POST['full_address'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['location'])&&isset($_POST['type'])&&isset($_POST['phone_no'])){$name=$_POST['full_name'];$address=$_POST['full_address'];$user=$_POST['username'];$email=$_POST['email'];$pwd=$_POST['password'];$cnf_pwd=$_POST['confirm_password'];$location=$_POST['location'];$type=$_POST['type'];$phone=$_POST['phone_no'];$pwd=password_hash($pwd, PASSWORD_DEFAULT);$sql="insert into customer(customer_name, customer_address, username, customer_email, password, customer_location_id, customer_type, customer_no) values ('$name', '$address', '$user', '$email', '$pwd', '$location', '$type', '$phone')";if(exec_query($sql)===TRUE){if(REPORT){console_info("Record Created Successfully");}echo "<script>let baseurl=window.location.origin;let loginurl=baseurl+'/project/website/login.php';setTimeout(function(){window.location.href=loginurl;},0);</script>";}else{if(REPORT){console_warn("Record Not Created Successfully");}}}}
    if($con->connect_error){console_error("Connection failed to mysql");die("Connection failed: ".$con->connect_error);}
    function booking(){
        if(isset($_POST['book_now'])){
            
        }
    }
?>