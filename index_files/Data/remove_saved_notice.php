<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: ../../index.php");
}
if(isset($_GET['del_saved_submit']))
{
$notice_id = $_GET['notice_id'];
$previews_page_url =  $_GET['previews_page_url'];
$query = "SELECT * FROM saved where `notice_id` = '$notice_id'";
$result = mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $deletequery = "DELETE FROM `saved` WHERE `notice_id`= '$notice_id'";
            $query = mysqli_query($con, $deletequery);
            echo"
            <script>
            alert('Saved notice has been removed');
            window.location.href='$previews_page_url';
            </script>
            "; 
        }
        else
        {
            echo"
            <script>
            alert('Sorry! Notice can't be deleted due to some error.);
            window.location.href='$previews_page_url';
            </script>
            ";  
        }
    }   
    else
    {
        echo"
        <script>
        alert('Notice not found');
        window.location.href='$previews_page_url';
        </script>
        "; 
    }   
    
}
else
    {
        echo"
        <script>
        alert('Click the delete button first');
        window.location.href='$previews_page_url';
        </script>
        "; 
    }
?>