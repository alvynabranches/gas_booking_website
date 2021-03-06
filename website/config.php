<?php
    define('DEBUG',TRUE);error_reporting(0);session_start();date_default_timezone_set('Asia/Kolkata');
    define('DB_SERVER', 'localhost');define('DB_USERNAME', 'root');define('PASSWORD', '');define('DB', 'gas_booking_system');$con=new mysqli(DB_SERVER,DB_USERNAME,PASSWORD,DB);
    $company_name="Goa University Gas Agency";
    $domestic_gas_price=658;
    $commercial_gas_price=1300;
    // General Functionality
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function alert($m){echo "<script>alert('$m');</script>";}
    function refresh_page(){echo "<script>document.location.reload(true);</script>";}
    function redirect(string $redirect_index_page, string $redirect_customer_page, string $redirect_agency_page){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if($_SESSION==null){header("Location: $redirect_index_page");}else{if($_SESSION['user_type']=='customer'){header("Location: $redirect_customer_page");}else if($_SESSION['user_type']=='agency'){header("Location: $redirect_agency_page");}else{session_unset();header("Location: $redirect_index_page");}}}
    function exec_query(string $sql,$host='localhost', string $username='root', string $password='', string $db='gas_booking_system'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$con->close();return $result;}
    
    // User Functionality
    function location_options(string $sql="SELECT * FROM location ORDER BY location_name;"){$result=exec_query($sql);$options="";if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";}};return $options;}
    function login(){if(!isset($_COOKIE['PHPSESSID'])){session_start();}if(isset($_POST['username'])&&isset($_POST['password'])){$user=$_POST['username'];$pwd=$_POST['password'];$result=exec_query("select customer_id as id, customer_address as ca, customer_no as cpn, customer_email as ce, customer_type as ct, customer_location_id as clid, customer_name as cn, password as pd from customer where username='$user';");if($result->num_rows==1){while($row=mysqli_fetch_assoc($result)){$id=$row['id'];$cn=$row['cn'];$pd=$row['pd'];$ct=$row['ct'];$cl=$row['clid'];$cpn=$row['cpn'];$ce=$row['ce'];$ca=$row['ca'];if(DEBUG){console_info('Username Found!');}}}else{if(DEBUG){console_warn('User Not Found!');}}if(password_verify($pwd, $pd)){$_SESSION['id']=$id;$_SESSION['name']=$cn;$_SESSION['username']=$user;$_SESSION['type']=$ct;$_SESSION['customer_location_id']=$cl;$_SESSION['customer_phone_no']=$cpn;$_SESSION['customer_address']=$ca;$_SESSION['customer_email']=$ce;$_SESSION['user_type']='customer';header('Location: user.php');redirect('user.php',TRUE);if(DEBUG){console_info($_SESSION['id']);console_info($_SESSION['name']);console_info($_SESSION['username']);}if(DEBUG){console_log('Logged In Successfully!');}}else{if(DEBUG){console_warn('Password Incorrect!');}alert('Password Incorrect!');}}}
    function logout(){if(isset($_GET['action'])){if($_GET['action'] == 'logout'){session_start();session_unset();if(DEBUG){console_info('Logged Out Successfully!');}}}}
    function register(){if(isset($_POST['full_name'])&&isset($_POST['full_address'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['location'])&&isset($_POST['type'])&&isset($_POST['phone_no'])){$name=$_POST['full_name'];$address=$_POST['full_address'];$user=$_POST['username'];$email=$_POST['email'];$pwd=$_POST['password'];$cnf_pwd=$_POST['confirm_password'];$location=$_POST['location'];$type=$_POST['type'];$phone=$_POST['phone_no'];$pwd=password_hash($pwd, PASSWORD_DEFAULT);if(exec_query("INSERT INTO customer(customer_name, customer_address, username, customer_email, password, customer_location_id, customer_type, customer_no) VALUES ('$name', '$address', '$user', '$email', '$pwd', '$location', '$type', '$phone')")===TRUE){if(DEBUG){console_info("Record Created Successfully");}echo "<script>let baseurl=window.location.origin;let loginurl=baseurl+'/project/website/login.php';setTimeout(function(){window.location.href=loginurl;},0);</script>";}else{if(DEBUG){console_warn("Record Not Created Successfully");}}}}
    function booking(){if(isset($_POST['amount'])&&isset($_POST['book_now'])&&isset($_POST['payment_option'])){if($_POST['book_now'] == '1'){$amount=$_POST['amount'];$payment_option=$_POST['payment_option'];$c_id=$_SESSION['id'];$date_time_now=date('Y-m-d H:i:s');if(exec_query("INSERT INTO booking(booking_date, booking_amount, booking_customer_id, booking_status, booking_type) VALUES ('$date_time_now', '$amount', '$c_id', 'pending', '$payment_option');")===TRUE){if(DEBUG){console_log('Booking Successfully Done!');}alert('Booking Successfully Done!');}else{if(DEBUG){console_log('Booking Unsuccessful!');}alert('Booking Unsuccessful!');}}}}
    function contact_us(){if(isset($_POST['name'])&&(isset($_POST['phone']))&&(isset($_POST['email']))&&(isset($_POST['location']))&&(isset($_POST['subject']))&&(isset($_POST['message']))){$name=$_POST['name'];$phone=$_POST['phone'];$email=$_POST['email'];$location=$_POST['location'];$subject=$_POST['subject'];$message=$_POST['message'];$date_time_now=date('Y-m-d H:i:s');if(exec_query("INSERT INTO feedback (feedback_date, name, phone_no, email, feedback_location_id, feedback_subject, feedback_message) VALUES ('$date_time_now', '$name', '$phone', '$email', '$location', '$subject', '$message');")===TRUE){if(DEBUG){console_log("Feedback Sent Successfully!");alert("Feedback Sent Successfully!");}}else{if(DEBUG){console_log("Feedback Not Sent");alert("Feedback Not Sent");}}}}
    function user_contact_us(){if(isset($_SESSION['id'])&&isset($_POST['subject'])&&isset($_POST['message'])){$subject=$_POST['subject'];$message=$_POST['message'];$id=$_SESSION['id'];if(exec_query("INSERT INTO user_feedback (feedback_customer_id, feedback_subject, feedback_message) VALUES ('$id', '$subject', '$message');")){if(DEBUG){console_log("Feedback Sent Successfully!");alert("Feedback Sent Successfully!");}}else{if(DEBUG){console_log("Feedback Not Sent");alert("Feedback Not Sent");}}}}
    function get_db_user_password($c_id){$result=exec_query("SELECT password FROM customer where customer_id='$c_id';");if($result->num_rows==1){while($row=mysqli_fetch_assoc($result)){$p=$row['password'];}}return $p;}
    function get_location($l_id){$result=exec_query("SELECT location_name AS ln FROM location WHERE location_id='$l_id'");if($result->num_rows==1){while($row=mysqli_fetch_assoc($result)){$ln=$row['ln'];}}return $ln;}
    function change_details(){if(isset($_POST['name'])&&isset($_POST['phone_no'])&&isset($_POST['address'])&&isset($_POST['password'])){$new_name=$_POST['name'];$name=$_SESSION['name'];$new_phone=$_POST['phone_no'];$phone=$_SESSION['customer_phone_no'];$new_address=$_POST['address'];$address=$_SESSION['customer_address'];$pwd=$_POST['password'];$id=$_SESSION['id'];$db_pwd=get_db_user_password($id);if(password_verify($pwd, $db_pwd)){if(($new_name!=$name)&&($new_phone!=$phone)&&($new_address!=$address)){if(exec_query("UPDATE customer SET customer_name='$new_name', customer_no='$new_phone', customer_address='$new_address' WHERE customer_id='$id';")===TRUE){$_SESSION['name']=$new_name;$_SESSION['phone_no']=$new_phone;$_SESSION['address']=$new_address;if(DEBUG){console_log("Successfully Updated Customer Name, Customer Phone No. and Customer Address!");}alert("Successfully Updated Customer Name, Customer Phone No. and Customer Address!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Name, Customer Phone No. and Customer Address!");}alert("Unsuccessfully Updated Customer Name, Customer Phone No. and Customer Address!");}}elseif(($new_name!=$name)&&($new_phone!=$phone)&&($new_address==$address)){if(exec_query("UPDATE customer SET customer_name='$new_name', customer_no='$new_phone' WHERE customer_id='$id';")){$_SESSION['name']=$new_name;$_SESSION['phone_no']=$new_phone;if(DEBUG){console_log("Successfully Updated Customer Name and Customer Phone No.!");}alert("Successfully Updated Customer Name and Customer Phone No.!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Name and Customer Phone No.!");}alert("Unsuccessfully Updated Customer Name and Customer Phone No.!");}}elseif(($new_name!=$name)&&($new_phone==$phone)&&($new_address!=$address)){if(exec_query("UPDATE customer SET customer_name='$new_name', customer_address='$new_address' WHERE customer_id='$id';")){$_SESSION['name']=$new_name;$_SESSION['address']=$new_address;if(DEBUG){console_log("Successfully Updated Customer Name and Customer Address!");}alert("Successfully Updated Customer Name and Customer Address!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Name and Customer Address!");}alert("Unsuccessfully Updated Customer Name and Customer Address!");}}elseif(($new_name==$name)&&($new_phone!=$phone)&&($new_address!=$address)){if(exec_query("UPDATE customer SET customer_no='$new_phone' customer_address='$new_address' WHERE customer_id='$id';")){$_SESSION['phone_no']=$new_phone;$_SESSION['address']=$new_address;if(DEBUG){console_log("Successfully Updated Customer Phone No. and Customer Address!");}alert("Successfully Updated Customer Phone No. and Customer Address!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Phone No. and Customer Address!");}alert("Unsuccessfully Updated Customer Phone No. and Customer Address!");}}elseif(($new_name!=$name)&&($new_phone==$phone)&&($new_address==$address)){if(exec_query("UPDATE customer SET customer_name='$new_name' WHERE customer_id='$id';")){$_SESSION['name']=$new_name;if(DEBUG){console_log("Successfully Updated Customer Name!");}alert("Successfully Updated Customer Name!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Name!");}alert("Unsuccessfully Updated Customer Name!");}}elseif(($new_name==$name)&&($new_phone!=$phone)&&($new_address==$address)){if(exec_query("UPDATE customer SET customer_no='$new_phone' WHERE customer_id='$id';")){$_SESSION['phone_no']=$new_phone;if(DEBUG){console_log("Successfully Updated Customer Phone No.!");}alert("Successfully Updated Customer Phone No.!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Phone No.!");}alert("Unsuccessfully Updated Customer Phone No.!");}}elseif(($new_name==$name)&&($new_phone==$phone)&&($new_address!=$address)){if(exec_query("UPDATE customer SET customer_address='$new_address' WHERE customer_id='$id';")){$_SESSION['customer_address']=$new_address;if(DEBUG){console_log("Successfully Updated Customer Address!");}alert("Successfully Updated Customer Address!");refresh_page();}else{if(DEBUG){console_log("Unsuccessfully Updated Customer Address!");}alert("Unsuccessfully Updated Customer Address!");}}else{if(DEBUG){console_log("Everything is up to date!");}/*alert("Everything is up to date!");*/redirect("user.php",'agency.php','index.php');}}else{alert("Password does not match!");console_log("Password does not match!");redirect('user-settings.php','');}}}
    function change_password(){if(isset($_POST['old_password'])&&isset($_POST['new_password'])&&isset($_POST['confirm_new_password'])){$op=$_POST['old_password'];$np=$_POST['new_password'];$cnp=$_POST['confirm_new_password'];if($np==$cnp){$id=$_SESSION['id'];$db_pwd=get_db_user_password($id);if(password_verify($op, $db_pwd)){$new_pwd=password_hash($np, PASSWORD_DEFAULT);if(exec_query("UPDATE customer SET password='$new_pwd' WHERE customer_id='$id'")===TRUE){if(DEBUG){console_log("Password Updated Successfully!");}alert("Password Updated Successfully!");redirect("user.php",TRUE);}else{if(DEBUG){console_log("Password Not Updated!");}alert("Password Not Updated!");}}else{if(DEBUG){console_log("Old Password Does Not Match!");}alert("Old Password Does Not Match!");}}else{if(DEBUG){console_log("Confirm Password Does not Match!");}alert("Confirm Password Does Not Match!");}}}
    function pending_orders($c_id){$records="";$result=exec_query("SELECT booking_date AS bd, booking_amount AS ba, booking_type as bt FROM booking WHERE booking_customer_id='$c_id' AND booking_status='pending' ORDER BY booking_date DESC;");if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$records.="<tr><td>".$row['bd']."</td><td>".$row['ba']."</td><td>".strtoupper($row['bt'])."</td></tr>";}}else{$records="No Records Found";}return $records;}
    function delivered_orders($c_id){$records="";$result=exec_query("SELECT booking_date AS bd, booking_amount AS ba, booking_type as bt FROM booking WHERE booking_customer_id='$c_id' AND booking_status='delivered' ORDER BY booking_date DESC;");if($result->num_rows>0){while($row=mysqli_fetch_assoc($result)){$records.="<tr><td>".$row['bd']."</td><td>".$row['ba']."</td><td>".strtoupper($row['bt'])."</td></tr>";}}else{$records="No Records Found";}return $records;}
    
    // Agency Functionality

    // Admin Functionality

    // Connection Error Code
    if($con->connect_error){console_error("Connection failed to mysql");die("Connection failed: ".$con->connect_error);}
    


    // Untested Code
    // General Functionality
    
    // User Functionality

    // Agency Functionality
    function agency_login(){
        
    }

    function agency_register(){

    }

    function agency_logout(){

    }

    function get_db_agency_password($a_id){

    }

    function delivered($b_id){
        if(exec_query("UPDATE booking SET booking_status='delivered' WHERE booking_id=$b_id;")===TRUE){
            console_info("Delivered Successfully");
        }else{
            console_info("Cannot Delivery");
        }
    }

    function undelivered($b_id){
        if(exec_query("UPDATE booking SET booking_status='pending' WHERE booking_id=$b_id;")===TRUE){
            console_info("Undelivered Successfully");
        }else{
            console_info("Cannot Undelivered");
        }
    }

    // Admin Funtionality
    function admin_login(){

    }

    function admin_register(){

    }

    function admin_logout(){

    }

    function get_db_admin_password($a_id){

    }

    function confirm_agency($a_id){
        if(exec_query("UPDATE agency SET agency_status='confirm' WHERE agency_id=$a_id;")===TRUE){
            console_info("Confirmed Agency Successfully");
        }else{
            console_info("Cannot Confirm Agency");
        }
    }
?>