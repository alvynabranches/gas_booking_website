<?php
    $host="localhost";$username="root";$password="";$db="gas_booking_system";$con=new mysqli($host,$username,$password,$db);
    error_reporting(0);session_start();
    if($con->connect_error){console_error("Connection failed to mysql");die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function redirect(string $redirect_page, bool $is_log_in=FALSE){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if($_SESSION==null){if(!$is_log_in){header("Location: $redirect_page");}}else{if($is_log_in){header("Location: $redirect_page");}}}
    function exec_query($sql,$host='localhost',$username='root',$password='',$db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$con->close();return $result;}
    function location_options($sql="select * from location order by location_name;"){$result=exec_query($sql);$options="";if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";}};return $options;}
    function login($user,$pwd){
        if(!isset($_COOKIE['PHPSESSID'])){session_start();}
        // if(isset($_POST['username']) && isset($_POST['password'])){}
        $sql="select * from customer where username='$user';";
        $result=exec_query($sql);
        if($result->num_rows>0){

        }else{$m='User Not Found!';echo "<script>alert('$m');console.warn('$m')</script>";}
        // password_verify($pwd, );
    }
    function logout(){session_start();session_destroy();}
    function register($host='localhost',$username='root',$password='',$db='gas_booking_system'){
        if(isset($_POST['full_name']) && isset($_POST['full_address']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['location']) && isset($_POST['type']) && isset($_POST['phone_no'])){
            console_info('Inside register() if');
            $name=$_POST['full_name'];
            $address=$_POST['full_address'];
            $user=$_POST['username'];
            $email=$_POST['email'];
            $pwd=$_POST['password'];
            $cnf_pwd=$_POST['confirm_password'];
            $location=$_POST['location'];
            $type=$_POST['type'];
            $phone=$_POST['phone_no'];
            // if($pwd == $cnf_pwd){$pwd=password_hash($pwd);}
            $pwd=password_hash($pwd);
            $sql="insert into customer(customer_name, customer_address, username, customer_email, password, customer_location_id, customer_type, customer_no) values ('$name', '$address', '$user', '$email', '$pwd', '$location', '$type', '$phone')";
            $con=new mysqli($host,$username,$password,$db);
            if($con->query($sql)===TRUE){console_info("Record Created Successfully"); header('Location: login.php');}
            else{console_warn("Record Not Created Successfully");}
            $con->close();
        }
    }
    // logout();

?>