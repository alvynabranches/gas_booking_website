<?php
    define('DEBUG',TRUE);error_reporting(0);session_start();date_default_timezone_set('Asia/Kolkata');
    if(DEBUG){define('REPORT',TRUE);}else{define('REPORT',FALSE);}
    define('DB_SERVER', 'localhost');define('DB_USERNAME', 'root');define('PASSWORD', '');define('DB', 'gas_booking_system');$con=new mysqli(DB_SERVER,DB_USERNAME,PASSWORD,DB);
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function alert($m){echo "<script>alert('$m');</script>";}
    function redirect(string $redirect_page, bool $is_log_in=FALSE){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if($_SESSION==null){if(!$is_log_in){header("Location: $redirect_page");}}else{if($is_log_in){header("Location: $redirect_page");}}}
    function exec_query($sql,$host='localhost',$username='root',$password='',$db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$con->close();return $result;}
    function location_options($sql="select * from location order by location_name;"){$result=exec_query($sql);$options="";if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";}};return $options;}
    function login(){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if(isset($_POST['username'])&&isset($_POST['password'])){$user=$_POST['username'];$pwd=$_POST['password'];$result=exec_query("select customer_id as id, customer_address as ca, customer_no as cpn, customer_email as ce, customer_type as ct, customer_location_id as clid, customer_name as cn, password as pd from customer where username='$user';");if($result->num_rows==1){while($row=mysqli_fetch_assoc($result)){$id=$row['id'];$cn=$row['cn'];$pd=$row['pd'];$ct=$row['ct'];$cl=$row['clid'];$cpn=$row['cpn'];$ce=$row['ce'];$ca=$row['ca'];if(REPORT){console_info('Username Found!');}}}else{if(REPORT){console_warn('User Not Found!');}}if(password_verify($pwd, $pd)){$_SESSION['id']=$id;$_SESSION['name']=$cn;$_SESSION['username']=$user;$_SESSION['type']=$ct;$_SESSION['customer_location_id']=$cl;$_SESSION['customer_phone_no']=$cpn;$_SESSION['customer_address']=$ca;$_SESSION['customer_email']=$ce;header('Location: user.php');redirect('user.php', TRUE);if(REPORT){console_info($_SESSION['id']);console_info($_SESSION['name']);console_info($_SESSION['username']);}if(REPORT){console_log('Logged In Successfully!');}}else{if(REPORT){console_warn('Password Incorrect!');}alert('Password Incorrect!');}}}
    function logout(){session_start();session_unset();if(REPORT){console_info('Logged Out Successfully!');}}
    function logout_user(){if(isset($_GET['action'])){if($_GET['action'] == 'logout'){logout();}}}
    function register(){if(isset($_POST['full_name'])&&isset($_POST['full_address'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['location'])&&isset($_POST['type'])&&isset($_POST['phone_no'])){$name=$_POST['full_name'];$address=$_POST['full_address'];$user=$_POST['username'];$email=$_POST['email'];$pwd=$_POST['password'];$cnf_pwd=$_POST['confirm_password'];$location=$_POST['location'];$type=$_POST['type'];$phone=$_POST['phone_no'];$pwd=password_hash($pwd, PASSWORD_DEFAULT);if(exec_query("INSERT INTO customer(customer_name, customer_address, username, customer_email, password, customer_location_id, customer_type, customer_no) VALUES ('$name', '$address', '$user', '$email', '$pwd', '$location', '$type', '$phone')")===TRUE){if(REPORT){console_info("Record Created Successfully");}echo "<script>let baseurl=window.location.origin;let loginurl=baseurl+'/project/website/login.php';setTimeout(function(){window.location.href=loginurl;},0);</script>";}else{if(REPORT){console_warn("Record Not Created Successfully");}}}}
    
    function booking(){
        if(isset($_POST['amount'])&&isset($_POST['book_now'])&&isset($_POST['payment_option'])){
            if($_POST['book_now'] == '1'){$amount=$_POST['amount'];$payment_option=$_POST['payment_option'];
                $c_id=$_SESSION['id'];$date_time_now=date('Y-m-d H:i:s');
                if(exec_query("INSERT INTO booking(booking_date, booking_amount, booking_customer_id, booking_status, booking_type) VALUES ('$time_now', '$amount', '$c_id', 'pending', '$payment_option');")===TRUE){
                    if(REPORT){console_log('Booking Successfully Done!');}alert('Booking Successfully Done!');
                }else{if(REPORT){console_log('Booking Unsuccessfully!');}alert('Booking Unsuccessfully!');}}}}
    
    function change_password(){
        if(isset($_POST['old_password'])&&isset($_POST['new_password'])&&isset($_POST['confirm_new_password'])){
            $op=$_POST['old_password'];$np=$_POST['new_password'];$cnp=$_POST['confirm_new_password'];
            if($np==$cnp){
                $id=$_SESSION['id'];
                while($row=mysqli_fetch_assoc(exec_query("SELECT password FROM customer WHERE id='$id'"))){$db_pwd=$row['password'];}
                if(password_verify($op, $db_pwd)){
                    $new_pwd=password_hash($np, PASSWORD_DEFAULT);
                    if(exec_query("UPDATE customer SET password='$new_pwd' where id='$id'")===TRUE){
                        if(REPORT){console_log("Password Updated Successfully!");}
                        alert("Password Updated Successfully!");
                        redirect("user.php",TRUE);
                    }else{if(REPORT){console_log("Password Not Updated!");}alert("Password Not Updated!");}}else{if(REPORT){console_log("Old Password Does Not Match!");}alert("Old Password Does Not Match!");}}else{if(REPORT){console_log("Confirm Password Does not Match!");}alert("Confirm Password Does Not Match!");};}
    }
    function settings(){
        if(isset($_POST['name'])&&isset($_POST['phone_no'])&&isset($_POST['address'])&&isset($_POST['password'])){
            $new_name=$_POST['name'];
            $name=$_SESSION['name'];
            $new_phone=$_POST['phone_no'];
            $phone=$_SESSION['customer_phone_no'];
            $new_address=$_POST['address'];
            $address=$_SESSION['customer_address'];
            $pwd=$_POST['password'];
            $id=$_SESSION['id'];
            while($row=mysqli_fetch_assoc(exec_query("SELECT password FROM customer WHERE customer_id='$id';"))){
                $db_pwd=$row['password'];
            }
            if(password_verify($pwd, $db_pwd)){
                if(($new_name!=$name)&&($new_phone!=$phone)&&($new_address!=$address)){
                    $sql="UPDATE customer SET customer_name='$new_name' customer_no='$new_phone' customer_address='$new_address' WHERE customer_id='$id';";
                }elseif(($new_name!=$name)&&($new_phone!=$phone)&&($new_address==$address)){
                    $sql="UPDATE customer SET customer_name='$new_name' customer_no='$new_phone' WHERE customer_id='$id';";
                }elseif(($new_name!=$name)&&($new_phone==$phone)&&($new_address!=$address)){
                    $sql="UPDATE customer SET customer_name='$new_name' customer_address='$new_address' WHERE customer_id='$id';";
                }elseif(($new_name==$name)&&($new_phone!=$phone)&&($new_address!=$address)){
                    $sql="UPDATE customer SET customer_no='$new_phone' customer_address='$new_address' WHERE customer_id='$id';";
                }elseif(($new_name!=$name)&&($new_phone==$phone)&&($new_address==$address)){
                    $sql="UPDATE customer SET customer_name='$new_name' WHERE customer_id='$id';";
                }elseif(($new_name==$name)&&($new_phone!=$phone)&&($new_address==$address)){
                    $sql="UPDATE customer SET customer_no='$new_phone' WHERE customer_id='$id';";
                }elseif(($new_name==$name)&&($new_phone==$phone)&&($new_address!=$address)){
                    $sql="UPDATE customer SET customer_address='$new_address' WHERE customer_id='$id';";
                }else{
                    if(REPORT){
                        console_log("Everything is up to date!");
                    }
                    alert("Everything is up to date!");
                    redirect("user.php",TRUE);
                }
                if(($new_name!=$name)||($new_phone!=$phone)||($new_address!=$address)){
                    if(exec_query($sql)===TRUE){
                        if(REPORT){console_log("Successfully Updated Your Changes");}
                        alert("Successfully Updated Your Changes");
                    }else{
                        if(REPORT){console_log("Unsuccessful In Updating Your Changes!");}
                        alert("Unsuccessful In Updating Your Changes!");
                        redirect("user-settings.php",TRUE);
                    }
                }
            }else{alert("Password does not match!");console_log("Password does not match!");redirect('user-settings.php',TRUE);}
        }
    }
    function get_location($location_id){
        $result=exec_query("select location_name as ln where location_id='$location_id'");
        if($result->rows==1){while($row=mysqli_fetch_assoc($result)){$ln=$row['ln'];}}
        return ln;
    }
    if($con->connect_error){console_error("Connection failed to mysql");die("Connection failed: ".$con->connect_error);}
    console_log(date('Y-m-d H:i:s'));
    // print_r($_SESSION);
?>