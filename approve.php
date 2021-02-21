<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>

<?php
if(isset($_GET["id"])){
  $search=$_GET["id"];

  $admin=$_SESSION["Username"];
  var_dump($admin);
  $sql="update comment set statues='ON' , approvedby='$admin'  where id='$search'";


  $execute=$Connectingdb->query($sql);
  var_dump($execute);
  if($execute){
  	
  	$_SESSION["successmsg"]="Comment Approved Successfully ! ";
   redirect_to("comment.php");
  
  }else {
    $_SESSION["errormsg"]="Something Went Wrong. Try Again !";
   redirect_to("comment.php");
  }
}






?>