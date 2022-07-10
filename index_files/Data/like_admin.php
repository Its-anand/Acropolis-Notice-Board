
<?php
require('connection.php');
session_start();
   if(isset($_POST['admin_like_submit']))      
   {

      if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
      {
         $userId = $_SESSION['admin_name'];
         $notice_id = $_POST['notice_id'];
         $notice_url = $_POST['notice_url'];
         $likeQuery = "SELECT * FROM `likes` WHERE notice_id = '$notice_id' AND user_id = '$userId' ";
         $likeResult = mysqli_query($con,$likeQuery);
         if($likeResult)
          {

            if(mysqli_num_rows($likeResult)==0)
            {
               $insertLike = "INSERT INTO `likes`(`notice_id`, `user_id`, `like`) VALUES ('$notice_id','$userId','1')";
               $Result = mysqli_query($con,$insertLike);
               if($Result)
               {
                  echo"
                  <script>
                  alert('LIKED!!');
                  window.location.href='$notice_url';
                  </script>
                  ";
               }
            }
            else
            {
               $delLike = "DELETE FROM `likes` WHERE notice_id = '$notice_id' AND user_id = '$userId'";
               $Result = mysqli_query($con,$delLike);
               if($Result)
               {
                  echo"
                  <script>
                  alert('UNLIKED!!');
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