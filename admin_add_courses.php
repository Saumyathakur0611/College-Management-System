
<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student')
{

    header("location:login.php");
}


$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_course']))
{
    $c_name=$_POST['name'];
    $c_hod=$_POST['HOD'];
    $c_sub=$_POST['subjects'];



    $sql="INSERT INTO courses (name,HOD,subjects)
    VALUES('$c_name','$c_hod','$c_sub')";

$result=mysqli_query($data,$sql);

if($result)
    {
        header("location:admin_add_courses.php");
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

    
    <?php
        include 'admin_css.php'
    ?>

</head>
<body>
<?php

include 'admin_sidebar.php'

?>

    <div class="content">
    <center>
        <h1>Add Courses</h1><br><br>

        <div class="div_deg">

        <form action="#" method="POST">
            <br>
            <div>
                <lable>Course Name :</lable>
                <input type="text" name="name">

            </div>
            <br>
            <div>
                <lable>HOD Name :</lable>
                <input type="text" name="HOD">
                
            </div>
            <br>
            <div>
                <lable>Subjects Provided :</lable>
                <textarea name="subjects"> </textarea>
                
            </div>
            <br>
            <div>
                
                <input type="submit" name="add_course" value="Add Course" class="btn btn-primary">
                
            </div>

        </form>

</div>

    </div>

</center>

</body>
</html>