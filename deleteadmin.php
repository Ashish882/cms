<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php confirm_login();  ?>
<?php
if(isset($_GET["id"])){
  $SearchQueryParameter = $_GET["id"];
  global $ConnectingDB;
  $sql = "DELETE FROM admin WHERE id='$SearchQueryParameter'";
  $Execute = $Connectingdb->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Admin Removed Successfully ! ";
    redirect_to("admins.php");
    // code...
  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    redirect_to("admins.php");
  }
}