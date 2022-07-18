<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='admin')
{

header("location:login.php");
}

$host="localhost";

$user="root";

$password="";

$db="schoolProject";

$data=mysqli_connect($host,$user,$password,$db);



$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE username='$name' ";

$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile']))
{
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];


    $sql2="UPDATE user SET email='$s_email',phone='$s_phone',password='$s_password' WHERE username='$name' ";

    $result2=mysqli_query($data,$sql2);

    if($result2)
    {
        header('location:student_profile.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<style type="text/css">

    lable
    {
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }



    .div_deg
    {
        background-color: skyblue;
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>



</head>
<body>



<?php

include 'student_sidebar.php'

?>

<div class="content">

<center>
    <h1>Update Profile</h1>
    <br><br>


<form action="#" method="POST">

    <div class="div_deg">

    

<div>
        <lable>Email</lable>
        <input type="text" name="email" value="<?php echo "{$info['email']}" ?>">

</div>
<div>
        <lable>Phone</lable>
        <input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">

</div>
<div>
        <lable>Password</lable>
        <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">

</div>
<div>
        
        <input type="submit"  class="btn btn-primary" name="update_profile" value="Update">

</div>
</div>


</form>

</center>


</div>
    

    


</body>
</html>