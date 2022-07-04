<!DOCTYPE html>
<html lang="en">
<?php 
include('./index_files/Data/connection.php');
session_start();

?>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Acropolis Notice Board</title>
   <link rel="stylesheet" href="./index_files/css_and_script/NoticePageCss.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link href='https://fonts.googleapis.com/css?family=Fredericka the Great' rel='stylesheet'>

   <style>
      .disclaimer {
         display: none;
      }
   </style>

</head>

<body>
   <!--Tab Group-->
   <?php 
if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
{
?>

   <nav id="nav" class="tab">
      <ul>
         <li class="old_notices">Old Notices</li>
         <li class="student_saved_notices_btn">Saved Notices</li>
         <li class="about">About</li>
         <li class="contactus">Contact Us</li>
         <li><a style='color: #cd6161;' href="./index_files/Data/logout.php">Signout</a></li>
         <a id="go_back_btn" class="button_css setting">Go Back</a>
      </ul>
   </nav>

   <?php
}
else if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
{?>

   <nav id="nav" class="tab">
      <ul>
         <li class="create_notice_btn">Create Notice</li>
         <li class="old_notices">Old Notices</li>
         <li class="admin_saved_notices_btn">Saved Notices</li>
         <li class="contactus">Contact Us</li>
         <li><a style='color: #cd6161;' href="./index_files/Data/logout.php">Signout</a></li>
         <a id="go_back_btn" class="button_css setting">Go Back</a>
      </ul>
   </nav>

   <?php
}
else
{?>

   <nav id="nav" class="tab">
      <ul>
         <li class="s_login_button">Student Login</li>
         <li class="a_login_button">Admin Login</li>
         <li class="old_notices">Old Notices</li>
         <li class="about">About</li>
         <li class="contactus">Contact Us</li>
         <a id="go_back_btn" class="button_css setting">Go Back</a>
      </ul>
   </nav>

   <?php
}
?>

   <nav id="comment_system" class="tab ">
      <ul>
         <li class="text">Comment</li>
         <a id="go_back_btn" class="button_css comment_panel_btn">Go Back</a>
      </ul>
   </nav>
   <?php 

if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
{
?>
   <nav id="s_login" class="tab ">
      <form action="./index_files/Data/login.php" method="post">
         <ul>
            <li class="text">You have already signed in</li>
            <a id="go_back_btn" href='./index_files/Data/logout.php' class="button_css a_panel_btn">Log Out</a> <br>
            <br>
            <a id="go_back_btn" class="button_css s_panel_btn">Go Back</a>
         </ul>
      </form>
   </nav>
   <?php
}
else
{?>
   <nav id="s_login" class="tab ">
      <form action="./index_files/Data/login.php" method="post">
         <ul>
            <li class="text">Student Login</li>
            <li><input type="text" name='stu_name' placeholder="Username *" class="button_css input_text_css"></li>
            <li><input type="password" name='stu_password' placeholder="Password *" class="button_css input_text_css">
            </li>
            <li><input type="submit" name='slogin' value="Submit" class="button_css"></li>
            <a id="go_back_btn" class="button_css s_panel_btn">Go Back</a>
         </ul>
      </form>
   </nav>
   <?php
}
?>
   <?php 
if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
{
?>
   <nav id="a_login" class="tab ">
      <ul>
         <li class="text">You have already signed in</li>
         <a id="go_back_btn" href='./index_files/Data/logout.php' class="button_css a_panel_btn">Log Out</a> <br>
         <a id="go_back_btn" class="button_css a_panel_btn">Go Back</a>
      </ul>
   </nav>
   <?php
}
else
{?>
   <nav id="a_login" class="tab ">
      <form action="./index_files/Data/login.php" method="post">
         <ul>
            <li class="text">Admin Login</li>
            <li><input type="text" placeholder="Admin name *" name='admin_name' class="button_css input_text_css"
                  require></li>
            <li><input type="password" placeholder="Password *" name='admin_password' class="button_css input_text_css"
                  require></li>
            <li><input type="submit" name='submit' class="button_css"></li>
            <a id="go_back_btn" class="button_css a_panel_btn">Go Back</a>
         </ul>
      </form>
   </nav>
   <?php
}
?>
   <?php 
if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
{?>
   <nav id="create_notice" class="tab ">
      <form action="./index_files/Data/createNotice.php" method="post">
         <ul>
            <li class="notice_head">Create Notice</li>
            <li><input type="date" name='notice_date' class="button_css input_text_css" require></li>
            <li><input type="text" name='notice_title' placeholder='Notice Title *'
                  class="button_css notice_heading_input_css" require></li>
            <li><textarea name='notice_body' placeholder="Notice body *" class="button_css notice_body_input_css"
                  require></textarea></li>
            <li><input type="text" name='notice_writer_role' placeholder='Notice Writer role *'
                  class="button_css notice_writer_input_css" require></li>
            <li><input type="text" name='notice_writer_name' placeholder='Notice Write name *'
                  class="button_css notice_writer_input_css" require></li>
            <li><input type="submit" name='notice_submit' class='notice_submit' value="Submit"></li>
            <div class='go_back_holder' style='width:100%;'>
               <a style='text-align: center;' id="go_back_btn" class="button_css create_notice_go_back">Go Back</a>
            </div>
         </ul>
      </form>
   </nav>
   <?php
}
else
{?>
   <nav id="create_notice" class="tab ">
      <ul>
         <li class="text">Only admin can create Notice</li>
         <a id="go_back_btn" class="button_css create_notice_go_back">Go Back</a>
      </ul>
   </nav>
   <?php
}
?>
   <nav id="admin_saved_notices" class="tab ">
      <ul>
         <li class="text">a Saved notice</li>
         <a id="go_back_btn" class="button_css admin_saved_notices_go_back">Go Back</a>
      </ul>
   </nav>

   <nav id="student_saved_notices" class="tab ">
      <ul>
         <li class="text">s Saved notice</li>
         <a id="go_back_btn" class="button_css student_saved_notices_go_back">Go Back</a>
      </ul>
   </nav>

   <nav id="old_ntc" class="tab ">
      <div class='notice_holder'>
         <div class='notice'>
            <div></div>
            <div></div>
         </div>
      </div>
   </nav>
   <nav id="abt" class="tab ">
      <ul>
         <li class="text">About</li>
         <p>
            This web application is desined and created by Anand Choudhary and his team mamber to simplify and modify
            the notice system in the college.
         </p>
         <a id="go_back_btn" class="button_css about_btn">Go Back</a>
      </ul>
   </nav>
   <nav id="contact" class="tab ">
      <ul>
         <li class="text">Contact Us</li>
         <li><input type="text" name="subject" placeholder="Subject" class="button_css contactus_text_css" id="subject">
         </li>
         <li><input type="email" name="email" class="button_css contactus_text_css" id="email"
               placeholder="Enter Email"></li>
         <li><textarea name="msg" placeholder="Write Your Message..." id="message" class="textarea_css " cols="30"
               rows="10" form="contactusform"></textarea></li>
         <li><input type="submit" name="Submit" id="submit" class="button_css " placeholder="Enter Submit"></li>
         <a id="go_back_btn" class="button_css contactus_btn">Go Back</a>
      </ul>
   </nav>
   <div id="notice_frame">
      <div class="notice_container">
         <div class="menu_header">
            <?php
            if(isset($_GET['id']))
            {
               $id = $_GET['id'];
               $query = "SELECT * FROM `notice` WHERE  `notice_id`= '$id'";
               $result = mysqli_query($con,$query);
               $result_fetch=mysqli_fetch_assoc($result);
               $notice_id=$result_fetch['notice_id'];
               $notice_date=$result_fetch['notice_date'];
               $notice_title=$result_fetch['notice_title'];
               $notice_body=$result_fetch['notice_body'];
               $notice_writer_role=$result_fetch['notice_writer_role'];
               $notice_writer_name=$result_fetch['notice_writer_name'];
            }
            ?>
            <p>Acropolis Institute<br>of Technology And Research</p>
            <p id="date">Date: <?php echo $notice_date; ?></p>
            <p>Notice</p>
            <p><?php echo $notice_title; ?></p>
            <p><?php echo $notice_body; ?></p>
            <p id="notice_writer"><?php echo $notice_writer_role; ?>
               <br> <?php echo $notice_writer_name; ?></p>
            <div id="empty">
            </div>
         </div>
      </div>
      <div id='botton_container'>
         <img title='Like' class="button_style" src="./index_files/image/like.jpg" width="50px" alt="">
         <img title='Comment' class="button_style comment_btn" src="./index_files/image/comment.jpg" alt="">
         <img title='Save' class="button_style" src="./index_files/image/Save.jpg" alt="">
         <input type="text" style="display: none;" value="http://127.0.0.1:5500/College%20Project/sem7/index.html"
            id="myInput">
         <img title='Share' onclick="getURL();" class="button_style" src="./index_files/image/share.jpg" alt="">
         <img title='setting' class="button_style setting" src="./index_files/image/setting.jpg" alt="">
      </div>
   </div>

   <script>
      //setting
      $(document).ready(function () {

         $(".setting").click(function () {
            $("#nav").toggle();
         });
      });
      //comment
      $(document).ready(function () {

         $(".comment_btn").click(function () {
            $("#comment_system").toggle();
         });
      });
      //comment go back
      $(document).ready(function () {

         $(".comment_panel_btn").click(function () {
            $("#comment_system").toggle();
         });
      })
      //Student login
      $(document).ready(function () {

         $(".s_login_button").click(function () {
            $("#s_login").toggle();
         });
      });
      //Student go back      
      $(document).ready(function () {

         $(".s_panel_btn").click(function () {
            $("#s_login").toggle();
         });
      });
      //Admin login
      $(document).ready(function () {

         $(".a_login_button").click(function () {
            $("#a_login").toggle();
         });
      });
      //Admin go back
      $(document).ready(function () {

         $(".a_panel_btn").click(function () {
            $("#a_login").toggle();
         });
      });
      //Create notice
      $(document).ready(function () {

         $(".create_notice_btn").click(function () {
            $("#create_notice").toggle();
            $(".notice_container").toggle();
         });
      });
      //Create notice go back
      $(document).ready(function () {

         $(".create_notice_go_back").click(function () {
            $("#create_notice").toggle();
            $(".notice_container").toggle();
         });
      })
      //Admin Saved notice
      $(document).ready(function () {

         $(".admin_saved_notices_btn").click(function () {
            $("#admin_saved_notices").toggle();
         });
      });
      //Admin Saved notice go back
      $(document).ready(function () {

         $(".admin_saved_notices_go_back").click(function () {
            $("#admin_saved_notices").toggle();
         });
      })
      //Student Saved notice
      $(document).ready(function () {

         $(".student_saved_notices_btn").click(function () {
            $("#student_saved_notices").toggle();
         });
      });
      //Student Saved notice go back
      $(document).ready(function () {

         $(".student_saved_notices_go_back").click(function () {
            $("#student_saved_notices").toggle();
         });
      })
      //Old notices 
      $(document).ready(function () {

         $(".old_notices").click(function () {
            $("#old_ntc").toggle();
         });
      });
      //Old notices go back
      $(document).ready(function () {

         $(".ntc_btn").click(function () {
            $("#old_ntc").toggle();
         });
      });
      //About
      $(document).ready(function () {

         $(".about").click(function () {
            $("#abt").toggle();
         });
      });
      //About go back
      $(document).ready(function () {

         $(".about_btn").click(function () {
            $("#abt").toggle();
         });
      });
      //contact Us 
      $(document).ready(function () {

         $(".contactus").click(function () {
            $("#contact").toggle();
         });
      });
      //contact Us go back
      $(document).ready(function () {

         $(".contactus_btn").click(function () {
            $("#contact").toggle();
         });
      });
   </script>
   <script>
      function getURL() {
         navigator.clipboard.writeText(window.location.href);
         alert("Url of this website is copied");
      }
   </script>
</body>

</html>