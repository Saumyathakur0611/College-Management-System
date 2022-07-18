
<?php

session_start();
error_reporting(0);

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

if($_GET['course_id'])
{
    $c_id=$_GET['course_id'];
    $sql="SELECT * FROM courses WHERE id='$c_id' ";

        $result=mysqli_query($data,$sql);

        $info=$result->fetch_assoc();
}

if(isset($_POST['update_courses']))
{
    $id=$_POST['id'];
    $c_name=$_POST['name'];
    $c_hod=$_POST['HOD'];
    $c_sub=$_POST['subjects'];


    $query="UPDATE courses SET name='$c_name', HOD='$c_hod', subjects='$c_sub' WHERE id='$id' ";

    $result2=mysqli_query($data,$query);

    if($result2)
    {
        header("location:admin_view_courses.php");

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
    
    <style>

        lable 
        {
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;

        }

        .form_deg
        {
            background-color: skyblue;
            width: 600px;
            padding-bottom: 70px;
            padding-top: 70px;
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
        <h1>Update Course Data</h1>

        <form class="form_deg" action="admin_update_courses.php" method="POST">
               <input type="text" name="id" 
                value="<?php echo "{$info['id']}" ?>" hidden>

            <div>
                <lable>Course Name</lable>
                <input type="text" name="name" 
                value="<?php echo "{$info['name']}" ?>">
            </div>

            <div>
                <lable>HOD</lable>
                <input type="text" name="HOD" 
                value="<?php echo "{$info['HOD']}" ?>">
            </div>

            <div>
                <lable>Subjects Provided</lable>
                <textarea name="subjects" rows="4">
                <?php echo "{$info['subjects']}" ?>
                </textarea>
            </div>

            
            <div>
                
            <input type="submit" name="update_courses" class="btn btn-success">
                
            </div>

</form>
    </center>

    </div>


</body>
</html>