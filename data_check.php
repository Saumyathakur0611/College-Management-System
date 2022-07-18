<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if($data==false)
{
    die("connection error");
}

if(isset($_POST['apply']))
{
    $data_name=$_POST['name'];

    $data_email=$_POST['email'];

    $data_phone=$_POST['phone'];

    $data_message=$_POST['course'];
    $d_message=$_POST['percentile'];

    $sql="insert into admission(name,email,phone,course,percentile) values('$data_name','$data_email','$data_phone','$data_message','$d_message')";
    
    $result=mysqli_query($data ,$sql);

    if($result)
    {
        $_SESSION['message']="Your Application has been recieved." ;
        header("location:index.php");
        exit;
    }

    else
    {
        echo "apply Failed" ;
    }


}


?>