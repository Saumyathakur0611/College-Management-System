
<?php

error_reporting(0);
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
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);
    
    $y=$_SESSION['username'];
     $sql="SELECT courses.name,courses.subjects FROM user INNER JOIN courses ON user.id=courses.id WHERE username='$y' ";
    
    $result=mysqli_query($data,$sql);

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <?php
        include 'admin_css.php'
    ?>


     <?php
        include 'login_check.php'
    ?>

   
    <style type="text/css">
        .table_th
        {
            padding:30px;
            font-size:20px;
        }
        .table_td
        {
            padding:30px;
            background-color:skyblue;       
        }

    </style>

</head>
<body>
<?php

include 'student_sidebar.php'

?>

    <div class="content">

    <center>

        <h1>student data</h1>

        <?php
            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message'])
        ?>

        <br></br>

        <table border="1px">
            <tr>
                
                <th class="table_th">COURSE NAME</th>
                <th class="table_th">SUBJECTS</th>
               

            </tr>

            <?php
            while($info=$result->fetch_assoc())
            {


            ?>

            <tr>
                <td class="table_td">
                    <?php
                        echo "{$info['name']}";
                    ?>
                </td>
                <td class="table_td">
                    <?php
                        echo "{$info['subjects']}";
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