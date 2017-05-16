<?php
   session_start();
   unset($_SESSION["user"]);
 
   
   //echo  $_GET['origin'];
   header('Location:'. $_GET['origin']);
   die();
?>