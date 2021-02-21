<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
$_SESSION["id"]=null;
  $_SESSION["Username"]=null;
  $_SESSION["aname"]=null;
  session_destroy();
redirect_to("login.php");


