<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="project";
    $con=new mysqli($host,$username,$password,$db);
    if($con->connect_error){die("Connection failed: ".$con->connect_error);}
    function console_log($m){echo "<script>console.log('$m')</script>";}
    function console_warn($m){echo "<script>console.warn('$m')</script>";}
    function console_error($m){echo "<script>console.error('$m')</script>";}
    function console_info($m){echo "<script>console.info('$m')</script>";}
    function location_options($sql="select * from location order by location_name;",$host='localhost',$username='root',$password='',$db='project'){$con=new mysqli($host,$username,$password,$db);$result=mysqli_query($con,$sql);$options="";while($row=mysqli_fetch_assoc($result)){$options.="<option value='".$row['location_id']."'>".$row['location_name']."</option>";};return $options;}
    function redirect(string $redirect_page, bool $login_required=FALSE){
        if(!isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        if($_SESSION==null){
            if($login_required){
                header("Location: $redirect_page");
            }
        }
        else{
            if(!$login_required){
                header("Location: $redirect_page");
            }
        }
    }
    function logout(){
        session_start();
        session_destroy();
    }
    // logout();
?>