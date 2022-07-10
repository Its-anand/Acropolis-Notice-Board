
<?php
require('connection.php');
session_start();
   if(isset($_POST['comment_submit']))      
   {

      if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
      {
         $userId = $_SESSION['userid'];
         $notice_id = $_POST['notice_id'];
         $notice_url = $_POST['notice_url'];
         $commentMsg = $_POST['comment_message'];
               $insertComment = "INSERT INTO `comments`(`notice_id`, `user_id`, `comment`) VALUES ('$notice_id','$userId','$commentMsg')";
               $Result = mysqli_query($con,$insertComment);
               if($Result)
               {
                  echo"
                  <script>
                  window.location.href='$notice_url';
                  </script>
                  ";
               }
      }
      else if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
      {
         $userId = $_SESSION['admin_name'];
         $notice_id = $_POST['notice_id'];
         $notice_url = $_POST['notice_url'];
         $commentMsg = $_POST['comment_message'];
               $insertComment = "INSERT INTO `comments`(`notice_id`, `user_id`, `comment`) VALUES ('$notice_id','$userId','$commentMsg')";
               $Result = mysqli_query($con,$insertComment);
               if($Result)
               {
                  echo"
                  <script>
                  window.location.href='$notice_url';
                  </script>
                  ";
               }
      }
      else
      {
        echo"
        <script>
        alert('Please Sign in first');
        window.location.href='../../NoticePage.php';
        </script>
        ";
      }
   }
?>