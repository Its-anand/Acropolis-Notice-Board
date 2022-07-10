<!DOCTYPE html>
<html lang="en">
<?php 
include('./index_files/Data/connection.php');
session_start();

//Important variables
$notice_id =$_GET['id'];
if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
{
   $userId = $_SESSION['userid'];
}

//Copy current page url in a variable
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTP'] === 'on')
 {
   $current_page_url = 'https://';
 }
 else
 {
   $current_page_url = 'http://';
 }
 $current_page_url.= $_SERVER['HTTP_HOST'];
 $current_page_url.= $_SERVER['REQUEST_URI'];
//  echo $current_page_url;
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
         <li class="old_notices"><a href="./index.php">Old Notices</a></li>
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
         <li class="old_notices"><a href="./index.php">Old Notices</a></li>
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
         <li class="old_notices"><a href="./index.php">Old Notices</a></li>
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

         <div class='comment_section'>
            <?php
               $likeQuery = "SELECT * FROM `comments` WHERE notice_id = '$notice_id' AND user_id = '$userId' ";
               $likeResult = mysqli_query($con,$likeQuery);
               if($likeResult)
               {
                 if(mysqli_num_rows($likeResult)<1)
                 {
                  echo "No comments";
                 } 
                 else
                 {
                  while($res = mysqli_fetch_array($likeResult))
                  {
                  ?>

            <section>
               <h3 style="margin: 0px 0 0 1px;"><?php echo $res['user_id']; ?></h3>
               <p style='margin: 4px 0px 10px 0px;'><?php echo $res['comment']; ?></p>
            </section>

            <?php
                  }
                 }
               }
         ?>
         </div>

         <li>
            <form class='comment_form' action="./index_files/Data/comment.php" method="post">
               <input type="hidden" name="notice_id" value='<?php echo $notice_id ;?>'>
               <input type="hidden" name="notice_url" value='<?php echo $current_page_url ;?>'>
               <textarea name="comment_message" placeholder='Comment Here' id="comment_box" cols="30"
                  rows="10"></textarea>
               <button class='notice_submit' id='comment_submit_btn' name='comment_submit' type="submit">Submit</button>
            </form>
         </li>

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
   <p class="text_saved">A Saved notice</p>

   <ul>
         <?php
            $selectquery = "select * from saved ";
   
            $query = mysqli_query($con,$selectquery);
            while($res = mysqli_fetch_array($query))
            {
        ?>
         <div class='notice_body'>
            <div>
               <div class='notice_nav_setting'>
                  <div id="word_no_holder">
                     <p id="word_no"><?php echo $res['notice_id']; ?></p>
                  </div>
                  <?php
          if(isset($_SESSION['AdminLoginId']) && $_SESSION['AdminLoginId']==true)
            {
            ?>
                  <div id="edit_del_holder">
                     <form action="./index_files/Data/edit_notice.php" method="get">
                        <input type="hidden" name="notice_id" value='<?php echo $res['notice_id']; ?>'>
                        <input type="hidden" name="previews_page_url" value='<?php echo $current_page_url; ?>'>
                        <button type='submit' name='edit_submit' class="edit_del_btn">
                           <svg xmlns="http://www.w3.org/2000/svg" class="edit" fill="#fff" style="cursor:pointer;"
                              version="1.0" width="17.000000pt" height="17.000000pt" viewBox="0 0 512.000000 512.000000"
                              preserveAspectRatio="xMidYMid meet">
                              <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                 stroke="none">
                                 <path
                                    d="M875 5101 c-314 -79 -538 -317 -601 -639 -21 -110 -21 -3694 0 -3804 55 -280 230 -496 486 -601 131 -54 161 -57 613 -57 391 0 420 1 455 19 47 24 77 56 97 103 40 98 -1 210 -97 259 -34 18 -63 19 -385 19 -191 1 -378 5 -415 9 -175 23 -316 152 -348 320 -14 74 -14 3588 0 3662 32 168 173 297 348 320 88 11 2446 11 2534 0 175 -23 316 -152 348 -320 6 -33 10 -305 10 -700 l0 -647 23 -44 c12 -24 39 -57 60 -74 32 -26 49 -31 106 -34 100 -6 170 35 206 120 22 54 23 1336 1 1450 -65 329 -295 569 -614 642 -63 14 -214 16 -1414 15 -1246 0 -1348 -2 -1413 -18z">
                                 </path>
                                 <path
                                    d="M1175 3904 c-138 -71 -154 -251 -32 -348 l39 -31 1099 -3 c1066 -2 1100 -2 1137 17 150 77 150 285 0 362 -36 18 -75 19 -1125 19 -966 0 -1091 -2 -1118 -16z">
                                 </path>
                                 <path
                                    d="M1175 3104 c-138 -71 -154 -251 -32 -348 l39 -31 1099 -3 c1066 -2 1100 -2 1137 17 150 77 150 285 0 362 -36 18 -75 19 -1125 19 -966 0 -1091 -2 -1118 -16z">
                                 </path>
                                 <path
                                    d="M4101 2385 c-80 -23 -136 -50 -205 -99 -33 -24 -318 -302 -633 -618 l-571 -573 -36 -115 c-212 -691 -219 -715 -220 -782 -1 -59 3 -71 29 -110 17 -23 49 -53 70 -65 71 -40 111 -34 562 91 226 63 426 122 445 131 18 9 297 281 619 603 583 583 587 588 628 672 92 189 93 371 2 555 -66 134 -192 245 -334 295 -82 29 -275 37 -356 15z m226 -406 c64 -24 123 -109 123 -179 0 -45 -30 -108 -67 -142 l-29 -28 -134 135 -134 134 29 32 c17 17 44 37 60 45 36 16 113 18 152 3z m-630 -1006 l-367 -368 -192 -53 c-105 -29 -192 -51 -193 -50 -2 2 23 87 54 191 l56 187 368 367 368 367 137 -137 137 -137 -368 -367z">
                                 </path>
                                 <path
                                    d="M1175 2304 c-138 -72 -154 -251 -32 -348 l39 -31 708 0 708 0 39 31 c109 87 109 241 0 328 l-39 31 -696 3 c-618 2 -700 0 -727 -14z">
                                 </path>
                              </g>
                           </svg>
                        </button>
                     </form>
                     <form action="./index_files/Data/remove_notice.php" method="get">
                        <input type="hidden" name="notice_id" value='<?php echo $res['notice_id']; ?>'>
                        <input type="hidden" name="previews_page_url" value='<?php echo $current_page_url; ?>'>
                        <button type='submit' name='del_submit' class="edit_del_btn">
                           <svg xmlns="http://www.w3.org/2000/svg" class="cancel" fill="#fff" viewBox="0 0 30 30"
                              width="30px" style="cursor:pointer;" height="30px">
                              <path
                                 d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16.414,15 c0,0,3.139,3.139,3.293,3.293c0.391,0.391,0.391,1.024,0,1.414c-0.391,0.391-1.024,0.391-1.414,0C18.139,19.554,15,16.414,15,16.414 s-3.139,3.139-3.293,3.293c-0.391,0.391-1.024,0.391-1.414,0c-0.391-0.391-0.391-1.024,0-1.414C10.446,18.139,13.586,15,13.586,15 s-3.139-3.139-3.293-3.293c-0.391-0.391-0.391-1.024,0-1.414c0.391-0.391,1.024-0.391,1.414,0C11.861,10.446,15,13.586,15,13.586 s3.139-3.139,3.293-3.293c0.391-0.391,1.024-0.391,1.414,0c0.391,0.391,0.391,1.024,0,1.414C19.554,11.861,16.414,15,16.414,15z">
                              </path>
                           </svg>
                        </button>
                     </form>

                  </div>
                  <?php
            }
            ?>

               </div>
            </div>
            <a href='NoticePage.php?id=<?php echo $res['notice_id']; ?>' class='notice_url'>
               <div class='notice_iframe'>
                  <h3 class='notice_iframe_heading'><?php echo $res['notice_title']; ?></h3>
                  <p class='notice_iframe_date'><b>Date : </b><?php echo $res['notice_date']; ?></p>
                  <p class='notice_iframe_body'><?php echo $res['notice_body']; ?></p>
                  <p class='notice_iframe_writer_role'><b><?php echo $res['notice_writer_role']; ?></b></p>
                  <p class='notice_iframe_writer_name'><?php echo $res['notice_writer_name']; ?></p>
               </div>
            </a>
         </div>
         <?php
            }
        ?>
      </ul>
     <div class='go_back_holder'> <a id="go_back_btn" class="button_css student_saved_notices_go_back">Go Back</a></div>

   </nav>

   <nav id="student_saved_notices" class="tab ">
   <p class="text_saved">s Saved notice</p>

      <ul>
         <?php
            $selectquery = "select * from saved";
            $query = mysqli_query($con,$selectquery);
            while($res = mysqli_fetch_array($query))
            {
        ?>
         <div class='notice_body'>
            <div >
               <div class='notice_nav_setting'>
                  <div id="word_no_holder">
                     <p id="word_no"><?php echo $res['notice_id']; ?></p>
                  </div>
                  <?php
          if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
            {
            ?>
                  <div id="edit_del_holder">
                     <form action="./index_files/Data/remove_notice.php" method="get">
                        <input type="hidden" name="notice_id" value='<?php echo $res['notice_id']; ?>'>
                        <input type="hidden" name="previews_page_url" value='<?php echo $current_page_url; ?>'>
                        <button type='submit' name='del_submit' class="edit_del_btn">
                           <svg xmlns="http://www.w3.org/2000/svg" class="cancel" fill="#fff" viewBox="0 0 30 30"
                              width="30px" style="cursor:pointer;" height="30px">
                              <path
                                 d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16.414,15 c0,0,3.139,3.139,3.293,3.293c0.391,0.391,0.391,1.024,0,1.414c-0.391,0.391-1.024,0.391-1.414,0C18.139,19.554,15,16.414,15,16.414 s-3.139,3.139-3.293,3.293c-0.391,0.391-1.024,0.391-1.414,0c-0.391-0.391-0.391-1.024,0-1.414C10.446,18.139,13.586,15,13.586,15 s-3.139-3.139-3.293-3.293c-0.391-0.391-0.391-1.024,0-1.414c0.391-0.391,1.024-0.391,1.414,0C11.861,10.446,15,13.586,15,13.586 s3.139-3.139,3.293-3.293c0.391-0.391,1.024-0.391,1.414,0c0.391,0.391,0.391,1.024,0,1.414C19.554,11.861,16.414,15,16.414,15z">
                              </path>
                           </svg>
                        </button>
                     </form>

                  </div>
                  <?php
            }
            ?>

               </div>
            </div>
            <a href='NoticePage.php?id=<?php echo $res['notice_id']; ?>' class='notice_url'>
               <div class='notice_iframe'>
                  <h3 class='notice_iframe_heading'><?php echo $res['notice_title']; ?></h3>
                  <p class='notice_iframe_date'><b>Date : </b><?php echo $res['notice_date']; ?></p>
                  <p class='notice_iframe_body'><?php echo $res['notice_body']; ?></p>
                  <p class='notice_iframe_writer_role'><b><?php echo $res['notice_writer_role']; ?></b></p>
                  <p class='notice_iframe_writer_name'><?php echo $res['notice_writer_name']; ?></p>
               </div>
            </a>
         </div>
         <?php
            }
        ?>
      </ul>
     <div class='go_back_holder'> <a id="go_back_btn" class="button_css student_saved_notices_go_back">Go Back</a></div>

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
               $notice_id = $_GET['id'];
               $query = "SELECT * FROM `notice` WHERE  `notice_id`= '$notice_id'";
               $result = mysqli_query($con,$query);
               $result_fetch=mysqli_fetch_assoc($result);
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
         <form action='./index_files/Data/like.php' method='post' class='navigation_panel_form'>
            <input type='hidden' name='notice_id' value='<?php echo $notice_id;?>'>
            <input type="hidden" name="notice_url" value='<?php echo $current_page_url;?>'>
            <button type='submit' name='like_submit' class='navigation_panel_button_css'>
               <img title='Like' class='button_style' src='./index_files/image/like.jpg' width='50px' alt=''>
            </button>
         </form>


         <?php
if(isset($_SESSION['StudentLoginId']) && $_SESSION['StudentLoginId']==true)
{
  echo"
  <img title='Comment' class='button_style comment_btn' src='./index_files/image/comment.jpg' alt=''>
  ";
}
else
{
  echo"
  <button onclick='signInAleart()' class='navigation_panel_button_css'>
  <img title='Comment' class='button_style' src='./index_files/image/comment.jpg' alt=''>
  </button>
  <script>
  function signInAleart()
  {
    alert('Please sign in first');
  }
  </script>
  ";
}
?>

         <form action='./index_files/Data/save.php' method='post' class='navigation_panel_form'>
            <input type='hidden' name='notice_id' value='<?php echo $notice_id;?>'>
            <input type='hidden' name='notice_url' value='<?php echo $current_page_url;?>'>
            <button type='submit' name='save' class='navigation_panel_button_css'>
               <img title='Save' class='button_style' src='./index_files/image/Save.jpg' alt=''>
            </button>
         </form>

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