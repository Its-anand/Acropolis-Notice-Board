<!DOCTYPE html>
<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: ../../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Fredericka the Great' rel='stylesheet'>

    <title>Update Word</title>
    <style>
    body
     {
      padding: 0;
      margin: 0;
      background-color: #065F04;
      font-family: 'Fredericka the Great';
      color: #fff;
      overflow: hidden;
      -webkit-user-select: none;
      -moz-user-select: -moz-none;
      -ms-user-select: none;
      user-select: none;        
    }
      /* width */
      ::-webkit-scrollbar {
      width: 15px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #7e4f44;
      box-shadow: inset 0 0 6px rgb(0 0 0 / 30%);
      -webkit-box-shadow: inset 0 0 6px rgb(0 0 0 / 30%);
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      box-shadow: inset 0 0 6px rgb(0 0 0 / 30%);
      -webkit-box-shadow: inset 0 0 6px rgb(0 0 0 / 30%);
      background-color: #853521;
      border-radius: 10px;
    }
    #notice_frame {
    border-image-slice: 27 27 27 27;
    border-image-width: 20px 20px 20px 20px;
    border-image-outset: 0px 0px 0px 0px;
    border-image-repeat: stretch stretch;
    border-image-source: url(../image/border.png);
    border-style: solid;
    width: 100%;
    height: 100vh;
    box-sizing: border-box;
    margin: 0%;
}
    #create_notice {
      width: calc(100vw - 24px);
      height: calc(100vh - 45px);
      padding: 0 15rem;
      box-sizing: border-box;
      overflow-y: auto;
      margin: 23px 0 0 18px;
    }

    #create_notice ul {
      padding: 0px;
    }

    #create_notice li {
      width: 100%;
      font-family: 'Fredericka the Great';
    }
    

    .button_css {
    outline: none;
    background-color: transparent;
    border-image-slice: 34 34 38 34;
    border-image-width: 15px 15px 15px 15px;
    border-image-outset: 3px 3px 3px 3px;
    border-image-repeat: stretch stretch;
    border-image-source: url(../image/button_frame1.png);
    border-style: solid;
    color: #fff;
    font-family: 'Fredericka the Great';
    font-size: 1.2rem;
    cursor: pointer;
}
.notice_head {
    font-size: 2.5rem;
    margin-bottom: 5rem;
}

.notice_heading_input_css {
    height: 2rem;
    width: 100%;
    padding: 0 10px;
}
.navigation_panel_button_css {
      padding: 0px;
      border: 0px;
      outline: none;
      margin: 0px;
      background: transparent;
    }

    .button_style {
      width: 35px;
      height: auto;
      cursor: pointer;
    }

    .input_text_css {
      width: 250px;
      height: 30px;
    }

    .notice_heading_input_css {
      height: 2rem;
      width: 100%;
      padding: 0 10px;
    }

    .notice_body_input_css {
      height: 23rem;
      width: 100%;
      padding: 10px;
    }

    .notice_writer_input_css {
      height: 2rem;
      width: 250px;
      padding: 0 10px;
    }

    .notice_submit {
      outline: none;
      background-color: transparent;
      border-image-slice: 34 34 38 34;
      border-image-width: 15px 15px 15px 15px;
      border-image-outset: 3px 3px 3px 3px;
      border-image-repeat: stretch stretch;
      border-image-source: url(../image/button_frame1.png);
      border-style: solid;
      color: #fff;
      font-family: 'Fredericka the Great';
      font-size: 1.2rem;
      width: 139px;
      height: 38px;
      cursor: pointer;
    }
    #go_back_btn {
    width: 200px;
    height: 50px;
    display: flex;
    align-items: center;
    text-decoration: none;
    justify-content: center;
}


    #create_notice li {
      width: 100%;
      list-style: none;
      margin-bottom: 2rem;
    }

    #create_notice .go_back_holder {
      display: flex;
      justify-content: center;
    }
    </style>
</head>
<?php

if(isset($_GET['edit_submit']))
{
    $notice_id = $_GET['notice_id'];
    $previous_page_url =  $_GET['previous_page_url'];
    $query = "SELECT * FROM `notice` WHERE  `notice_id`= '$notice_id'";
    $result = mysqli_query($con, $query);
    $result_fetch = mysqli_fetch_assoc($result);
    $notice_date = $result_fetch['notice_date'];
    $notice_title = $result_fetch['notice_title'];
    $notice_body = $result_fetch['notice_body'];
    $notice_writer_role = $result_fetch['notice_writer_role'];
    $notice_writer_name = $result_fetch['notice_writer_name'];
?>
<?php
  if(isset($_POST['notice_submit']))
  {
    $updatequery ="UPDATE `notice` SET `notice_date`='$_POST[notice_date]',`notice_title`='$_POST[notice_title]',`notice_body`='$_POST[notice_body]',`notice_writer_role`='$_POST[notice_writer_role]',`notice_writer_name`='$_POST[notice_writer_name]' WHERE notice_id = '$notice_id'";
    $result = mysqli_query($con, $updatequery);
    if($result)
    {
      echo"
      <script>
      alert('Updated');
      window.location.href='$previous_page_url';
      </script>
      ";     }
    else
    {
      echo"
      <script>
      alert('Failed');
      window.location.href='$previous_page_url';
      </script>
      ";     }
  }
  ?> 
<div id="notice_frame">

    <div id="create_notice" style="display: block;">
      <form name='edit_form' method="post">
        <ul name='edit_form_ul'>
          <li class="notice_head">Edit Notice</li>
          <li><input type="date" value='<?php echo $notice_date;?>' name="notice_date" class="button_css input_text_css" ></li>
          <li><input type="text" value='<?php echo $notice_title;?>' name="notice_title" placeholder="Notice Title *"
              class="button_css notice_heading_input_css" ></li>
          <li><textarea name="notice_body"  placeholder="Notice body *" class="button_css notice_body_input_css"
              require=""><?php echo $notice_body;?></textarea></li>
          <li><input type="text" value='<?php echo $notice_writer_role;?>' name="notice_writer_role" placeholder="Notice Writer role *"
              class="button_css notice_writer_input_css" ></li>
          <li><input type="text" value='<?php echo $notice_writer_name;?>' name="notice_writer_name" placeholder="Notice Write name *"
              class="button_css notice_writer_input_css" ></li>
          <li><input type="submit" name="notice_submit" class="notice_submit" value="Submit"></li>
          <div class="go_back_holder" style="width:100%;">
            <a style="text-align: center;" id="go_back_btn" href='<?php echo $previous_page_url;?>' class="button_css ">Go Back</a>
          </div>
        </ul>
      </form>
    </div> 
</div>
<?php
  if(isset($_POST['notice_submit']))
  {
    $updatequery ="UPDATE `notice` SET `notice_date`='$_POST[notice_date]',`notice_title`='$_POST[notice_title]',`notice_body`='$_POST[notice_body]',`notice_writer_role`='$_POST[notice_writer_role]',`notice_writer_name`='$_POST[notice_writer_name]' WHERE $notice_id";
    $result = mysqli_query($con, $insertquery);
    if($result)
    {
      echo "Updated
      window.location.href='$previous_page_url';
      ";
    }
    else
    {
      echo "Failed
      window.location.href='$previous_page_url';
      ";
    }
  }
  ?> 
<?php   
    }
else 
    {
        echo"
        <script>
        alert('Click the submit button first');
        window.location.href='$previous_page_url';
        </script>
        "; 
    }
    
?>
</body>

</html>