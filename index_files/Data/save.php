
<?php
require('connection.php');
session_start();
   if(isset($_POST['save']))      
   {

      if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
      {
         $userId = $_SESSION['userid'];
         $notice_id = $_POST['notice_id'];
         $notice_url = $_POST['notice_url'];
         $likeQuery = "SELECT * FROM `saved` WHERE notice_id = '$notice_id' AND user_id = '$userId' ";
         $likeResult = mysqli_query($con,$likeQuery);
         if($likeResult)
          {

            if(mysqli_num_rows($likeResult)==0)
            {
               $insertSave = "INSERT INTO `saved`(`notice_id`, `user_id`) VALUES ('$notice_id','$userId')";
               $Result = mysqli_query($con,$insertSave);
               if($Result)
               {
                  echo"
                  <script>
                  alert('Notice Saved!!');
                  window.location.href='$notice_url';
                  </script>
                  ";
               }
            }
            else
            {
               $delSave = "DELETE FROM `saved` WHERE notice_id = '$notice_id' AND user_id = '$userId'";
               $Result = mysqli_query($con,$delSave);
               if($Result)
               {
                  echo"
                  <script>
                  alert('Notice Unsaved!!');
                  window.location.href='$notice_url';
                  </script>
                 ";
               }
            }
          }
      }
      else
      {
        echo"
        <script>
        alert('Please Sign in first');
        </script>
        ";
      }
   }
?>