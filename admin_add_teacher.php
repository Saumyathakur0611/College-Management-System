
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

if(isset($_POST['add_teacher']))
{
    $t_name=$_POST['name'];
    $t_description=$_POST['Description'];
    $t_course=$_POST['id'];
    $file=$_FILES['image']['name'];

    $dst="./image/".$file;

    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);


    $sql="INSERT INTO teacher (name,description,id,image)
    VALUES('$t_name','$t_description','$t_course','$dst_db')";

    $result=mysqli_query($data,$sql);


    if($result)
    {
        header("location:admin_add_teacher.php");
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

        <h1>Add Teacher</h1>
        <br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">

            <div>

            
                 <lable>Teacher Name :</lable>
                <input type="text" name="name">

             </div>
         
             <br>

             <div>
                 <lable>Course :</lable>
                <input type="text" name="Description">

             </div>
             <br>
             <div>

            
                 <lable>Course id:</lable>
                <input type="number" name="id">

             </div>
             <br>

             <div>
                 <lable>Image :</lable>
                <input type="file" name="image">

             </div>

             <br>

             <div>
                 
                <input type="submit" name="add_teacher" value=" Add Teacher" class="btn btn-primary">

             </div>
            

</form>

</div>


</center>

    </div>


</body>
</html>