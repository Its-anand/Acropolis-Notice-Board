<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body
    {
        margin: 0; padding: 0;
        background: #065F04;
    }
</style>
</head>
<body>
<?php 
include 'connection.php';
if(isset($_POST['notice_submit']))
{   $previous_page_url =  $_POST['current_page_url'];
    $notice_date=$_POST['notice_date'];
    $notice_title = $_POST['notice_title'];
    $notice_body = $_POST['notice_body'];
    $notice_writer_role=$_POST['notice_writer_role'];
    $notice_writer_name=$_POST['notice_writer_name'];

    $query="INSERT INTO `notice`(`notice_date`, `notice_title`, `notice_body`, `notice_writer_role`, `notice_writer_name`) VALUES ('$notice_date','$notice_title','$notice_body','$notice_writer_role','$notice_writer_name')";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo"
        <script>
        alert('Uploaded Successfully');
        window.location.href='$previous_page_url';
        </script>
        ";
    }
    else
    {
        echo"
        <script>
        alert('Upload Failed');
        window.location.href='$previous_page_url';
        </script>
        ";
    }
}
    

?> 
</body>
</html>

