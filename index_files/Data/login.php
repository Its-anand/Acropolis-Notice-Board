<!DOCTYPE html>
<html lang="en">
<?php 
require('connection.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
</head>
<?php
#This is the code for Admin login
if(isset($_POST['submit']))
{
    $query = "SELECT * FROM `admin_login` WHERE  `admin_name`= '$_POST[admin_name]' AND `admin_password`='$_POST[admin_password]'";
    $previous_page_url =  $_POST['previous_page_url'];
    $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['AdminLoginId'] = true;
            $_SESSION['admin_name'] = $_POST['admin_name'];
            header("location: $previous_page_url");
        }
        else
        {
        echo"
            <script>
                alert('Looks like you are not admin');
                window.location.href='$previous_page_url';
                </script>
        ";
        }

}


#This is the code for Student login
if(isset($_POST['slogin']))
{
    $query = "SELECT * FROM `stu_login` WHERE  `stu_name`= '$_POST[stu_name]' AND `stu_password`='$_POST[stu_password]'";
    $previous_page_url =  $_POST['previous_page_url'];

    $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['StudentLoginId']=true;
            $_SESSION['userid'] = $_POST['stu_name'];
            echo"
            <script>
                window.location.href='$previous_page_url';
            </script>
        ";
        }
        else
        {
        echo"
            <script>
                alert('Email or Password is wrong');
                window.location.href='$previous_page_url';
            </script>
        ";
        }

}
?>
</html>
