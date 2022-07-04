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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link href='https://fonts.googleapis.com/css?family=Fredericka the Great' rel='stylesheet'>

   <style>
      .disclaimer {
         display: none;
      }
      

body {
  margin: 0%;
  padding: 0%;
  background-color: #065F04;
  font-family: 'Fredericka the Great';
  color: #fff;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: -moz-none;
  -ms-user-select: none;
  user-select: none;
}

#notice_frame {
  border-image-slice: 27 27 27 27;
  border-image-width: 20px 20px 20px 20px;
  border-image-outset: 0px 0px 0px 0px;
  border-image-repeat: stretch stretch;
  border-image-source: url("./index_files/image/border.png");
  border-style: solid;
  width: 100%;
  height: 100vh;
  box-sizing: border-box;
  margin: 0%;
}

a {
  text-decoration: none;
  color: #fff;
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

.notice_container {
  width: calc(100vw - 26px);
  margin: 20px 0 0 20px;
  height: calc(100vh - 42.5px);
  box-sizing: border-box;
  display: flex;
  overflow-y: auto;
  flex-wrap: wrap;
  justify-content: space-evenly;
}
.notice_iframe_writer_role
{
  margin-bottom: 0px;
}
.notice_iframe_heading, .notice_iframe_writer_name
{
  margin: 0px;
}
.notice_iframe_body
{
  margin: 0px;
}
/* width */
.notice_iframe::-webkit-scrollbar {
  width: 10px;
}

/* Track */
.notice_iframe::-webkit-scrollbar-track {
  background: #f1f1f1; 
  border-radius: unset;
  box-shadow: unset;
  -webkit-box-shadow: unset;

}

/* Handle */
.notice_iframe::-webkit-scrollbar-thumb {
  background: #fff;
  border-radius: unset;
  box-shadow: unset;
  -webkit-box-shadow: unset;

}
.notice_iframe::-webkit-scrollbar-thumb:hover {
  background: rgb(255, 223, 223);
  border-radius: unset;
  box-shadow: unset;
  -webkit-box-shadow: unset;

}

.notice_body {
  width: 31.25rem;
}

.notice_head {
  text-align: center;
  margin-top: 2rem;
  width: 100%;
}

.notice_nav_setting {
  border: 3px solid #fff;
  width: 100%;
  height: 3rem;
  margin-bottom: 8px;
  box-sizing: border-box;
  display: grid;
  grid-template-columns: 62px 1fr;
  justify-items: end;
}

#word_no_holder,
#edit_del_holder {
  display: flex;
  justify-content: flex-end;
}

#word_no {
  margin: 7px 0;
  font-weight: bold;
  font-size: 1.6rem;
}

.notice_head {
  font-size: 2.5rem;
  margin-bottom: 5rem;
}

.edit_del_btn {
  border: none;
  height: 3rem;
  box-sizing: border-box;
  background: transparent;
}
.notice_iframe_date, .notice_iframe_writer_role, .notice_iframe_writer_name
{
  text-align: left;
}
.notice_iframe {
  border: 3px solid #fff;
  width: 100%;
  height: 18.75rem;
  box-sizing: border-box;
  overflow-y: hidden;
  text-align: center;
  padding: 25px;
}
.notice_iframe:hover
{
  overflow-y: auto;
}
.notice_body {
  margin-bottom: 3rem;
}

.edit_tab
{
    background: -webkit-linear-gradient(to right, #32e79b, #29c5d2);
    background: linear-gradient(to right, #32e79b, #29c5d2);
    box-sizing: border-box;
    text-align: right;
}
#edit_panel
{
    display: grid;
    grid-template-columns: 20px 1fr;

}
#word_no
{
    margin: 9px 0;
    font-weight: bold;
    font-size: 1.1rem;
}
.edit_tab td
{
  box-sizing: border-box;
}
.edit_del_btn
{
    border: none;
    box-sizing: border-box;
    background: transparent;
}
#word_no_holder, #edit_del_holder
{
    display: flex;
    justify-content: flex-end;
}
.warning_holder
{
    height: 100vh;
    width: 100%;
    backdrop-filter: blur( 4px );
    background: rgb(255 255 255 / 54%);
    display: flex;
    position: fixed;
    overflow: hidden;
    display:none;

}
.warning
{
    width: 20rem;
    height: 15rem;
    font-size: 1.1rem;
    font-family: sans-serif;
    font-weight: 600;
    background: rgb(255 255 255 / 54%);
    backdrop-filter: blur( 4px );
    -webkit-backdrop-filter: blur( 4px );
    border: 1px solid rgb(255 255 255 / 56%);
    text-align: center;
    color: #000;
    box-sizing: border-box;
    padding: 50px 20px 0 20px;
    color: #67D3B6;
    position: absolute;
    top: 50%; 
    right: 50%;
    transform: translate(50%,-50%);

}
.warning button
{
    background: #32e79bd4;
    border: none;
    width: 5rem;
    height: 2rem;
    cursor: pointer;
    color: #fff;
}

@media screen and (max-width:1200px) {
  .notice_body {
    width: 41vw;
  }
}

@media screen and (max-width: 1030px) {
  .notice_container {
    padding: 0 10px;
  }

  .notice_body {
    width: 100%;
  }
}


   </style>

</head>

<body>
   <div id="notice_frame">
      <div class="notice_container">
         <p class='notice_head'>All notices</p>
         <?php
            $selectquery = "select * from notice ";
            $query = mysqli_query($con,$selectquery);
            while($res = mysqli_fetch_array($query))
            {
        ?>
         <div class='notice_body'>
            <div class="menu_header">
               <div class='notice_nav_setting'>
                  <div id="word_no_holder">
                     <p id="word_no"><?php echo $res['notice_id']; ?></p>
                  </div>
                  <div id="edit_del_holder">
                     <button id="editting_btn" onclick = "edit_word('<?php echo $res['notice_id']; ?>')" class="edit_del_btn">

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
                     <button id="delete__btn" onclick = "edit_word('<?php echo $res['notice_id']; ?>')" class="edit_del_btn">

                        <svg xmlns="http://www.w3.org/2000/svg" class="cancel" fill="#fff" viewBox="0 0 30 30"
                           width="30px" style="cursor:pointer;" height="30px">
                           <path
                              d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16.414,15 c0,0,3.139,3.139,3.293,3.293c0.391,0.391,0.391,1.024,0,1.414c-0.391,0.391-1.024,0.391-1.414,0C18.139,19.554,15,16.414,15,16.414 s-3.139,3.139-3.293,3.293c-0.391,0.391-1.024,0.391-1.414,0c-0.391-0.391-0.391-1.024,0-1.414C10.446,18.139,13.586,15,13.586,15 s-3.139-3.139-3.293-3.293c-0.391-0.391-0.391-1.024,0-1.414c0.391-0.391,1.024-0.391,1.414,0C11.861,10.446,15,13.586,15,13.586 s3.139-3.139,3.293-3.293c0.391-0.391,1.024-0.391,1.414,0c0.391,0.391,0.391,1.024,0,1.414C19.554,11.861,16.414,15,16.414,15z">
                           </path>
                        </svg>

                     </button>
                  </div>
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
      </div>
   </div>
   

   <div class="warning_holder warning1">
      <div class='warning'>
      <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <h3>Do you want to <span style='color: #CC313D;'>Delete</span> the word</h3>
        <div>
            <form method='POST' style='display: inline;' action='./index_files/remove_word.php' name = 'del_form' id='cancel_btn'>
            <input type='hidden' name='rmv_word_id' >
            <button name='Del_word' type='submit'>Yes</button>
            </form>
            <button class='del_no'>No</button>
        </div>
        ";
      }
      else
      {
        echo"
        <div style='margin-top: 3.3rem;'>
        <a style='text-decoration:none;' href='./index_files/Admin Login.php'>
        <button class='account_button_signin' type='button'>
          Sign in
        </button>
        </a>
        <button class='del_no'>No</button>
        </div>
      ";
      }
      ?>
      </div>
    </div>
    <div class="warning_holder warning2">
    <div class='warning'>
            <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <h3>Do you want to <span style='color: #31cc9d;'>Edit</span> the word</h3>
        <div>
            <form method='POST' style='display: inline;' action='./index_files/edit_word.php' name = 'edit_form' id='edit_btn'>
            <input type='hidden' name='edit_word_id'>
            <button name='edit_word' type='submit'>Yes</button>
            </form>
            
            <button class='edit_no'>No</button>
        </div>

      ";
      }
      else
      {
        echo"
        <div style='margin-top: 3.3rem;'>
        <a style='text-decoration:none;' href='./index_files/Admin Login.php'>
        <button class='account_button_signin' type='button'>
          Sign in
        </button>
        </a>
        <button class='edit_no'>No</button>
        </div>
      ";
      }
      ?>

    </div>
   <script>
        //cancel tab button
                $(document).ready(function() {
        
                   $(".cancel").click(function(){
                      $(".warning1").toggle();
                   });
                });
        //cancel no button
                $(document).ready(function() {
        
                   $(".edit_no").click(function(){
                      $(".warning2").toggle();
                   });
                });
        //edit tab button
                $(document).ready(function() {
        
                   $(".edit").click(function(){
                      $(".warning2").toggle();
                   });
                });
        //edit no button
                $(document).ready(function() {
        
                   $(".del_no").click(function(){
                      $(".warning1").toggle();
                   });
                });
    </script>
    <script>
        function edit_word(id)
        {
                del_form.rmv_word_id.value = id;
                edit_form.edit_word_id.value = id;
        }
        
    </script>
</body>

</html>