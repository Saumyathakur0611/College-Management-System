
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

$db="schoolProject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM courses";

$result=mysqli_query($data,$sql);

if($_GET['course_id'])
{
    $c_id=$_GET['course_id'];

    $sql2="DELETE FROM course WHERE id='$c_id' ";

    $result2=mysqli_query($data,$sql2);

    if($result2)
    {
        header('location:admin_view_courses.php');
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
        .table_th
        {
            padding: 20px;
            font-size: 20px;
        }

        .table_td
        {
            padding: 20px;
            background-color: skyblue;
            font-size: 20px;
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
        <h1>Courses</h1>
        
        <table border="1px">

        <tr>
                <th class="table_th">Course Name</th>
                <th class="table_th">Head of the Department</th>
                <th class="table_th">Subjects Provided</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>

</tr>

</tr>
<?php
while($info=$result->fetch_assoc())
{

?>
<tr>
    <td class="table_td">
        <?php echo "{$info['name']}" ?>
    </td>

    <td class="table_td">
    <?php echo "{$info['HOD']}" ?>
    </td>

    <td class="table_td">
    <?php echo "{$info['subjects']}" ?>
    </td>
    

    <td class="table_td">
        <?php
        echo "
        <a onClick=\"javascript:return confirm('Are you sure to delete thid data');\" class='btn btn-danger' href='admin_view_courses.php?course_id={$info['id']}'>

        Delete

        </a>";

        ?>
    </td>

    <td class="table_td">
        <?php
        echo "

        <a href='admin_update_courses.php?course_id={$info['id']}' class='btn btn-primary'>

    Update

     </a>";

     ?>

    </td>

</tr>

<?php
}
?>
</table>
</center>
    </div>


</body>
</html>