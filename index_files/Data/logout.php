<?php
session_start();
session_unset();
session_destroy();
if($_GET['previous_page_url'])
{
    $previous_page_url = $_GET['previous_page_url'];
    header("location: $previous_page_url");

}
else
{
header("location: ../../index.php");
}
?>