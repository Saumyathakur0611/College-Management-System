
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

if(isset($_POST['add_result']))
{
    
    $name=$_POST['name'];
    $cgpa=$_POST['cgpa'];
     



    $sql="INSERT INTO result (name,gpa)
    VALUES('$name','$cgpa' )";

$result=mysqli_query($data,$sql);
if($result)
{
    echo "<script type='text/javascript'> 
    
    alert('Result added Successfully')
    
    </script";
}
else
{
    echo "Upload Failed";
}

if($result)
    {
        header("location:result.php");
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
        <h1>Add Result</h1><br><br>

        <div class="div_deg">

        <form action="#" method="POST">
            <br>
            
            <br>
            <div>
                <lable>Name:</lable>
                <input type="text" name="name">
                
            </div>
            <br>
            <div>
                <lable>CGPA :</lable>
                <input type="number" step="0.01" name="cgpa">
                
            </div>
            <br>
            
            <br>
            <div>
                
                <input type="submit" name="add_result" value="Add result" class="btn btn-primary">
                
            </div>

        </form>

</div>

    </div>

</center>

</body>
</html>