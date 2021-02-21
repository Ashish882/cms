<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php 

$role = $_SESSION["role"];
confirm_login();
?>
<?php
if(isset($_GET["id"])){
  $SearchQueryParameter = $_GET["id"];
   global $ConnectingDB;

  if($role!='admin'){

    $sql = "DELETE FROM cat WHERE id = '$SearchQueryParameter'AND author = '$role' ";
    $stmt = $Connectingdb->query($sql);
    $execute=$stmt->rowCount();
  


if($execute){
    $_SESSION["successmsg"]="Category Deleted Successfully ! ";
   redirect_to("categories.php");

  }
  else

   {
    $_SESSION["errormsg"]="You Dont Have a premssion to Acccess that Page";
    redirect_to("categories.php");
  }
}


  if($role=='admin'){

 
  $sql = "DELETE FROM cat WHERE id='$SearchQueryParameter'";
  $Execute = $Connectingdb->query($sql);
  if ($Execute){
    $_SESSION["successmsg"]="Category Deleted Successfully ! ";
    redirect_to("categories.php");

  }

  else

   {
    $_SESSION["errormsg"]="Something Went Wrong. Try Again !";
    redirect_to("categories.php");
  }

}

}
