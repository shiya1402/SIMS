<?php

session_start();
if(isset($_SESSION['studentname']))
{
    unset($_SESSION['studentname']);
}
elseif(isset($_SESSION['teachername']))
{
    unset($_SESSION['teachername']);
}
header("Location: adminhome.php");
exit;
?>