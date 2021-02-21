<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php confirm_login();  ?>

<?php
if(isset($_GET["id"])){
  $search=$_GET["id"];

  $admin=$_SESSION["Username"];
  var_dump($admin);
  $sql="update comment set statues='OFF' , approvedby='$admin'  where id='$search'";


  $execute=$Connectingdb->query($sql);
  var_dump($execute);
  if($execute){
  	
  	$_SESSION["successmsg"]="Comment Dis-Approved Successfully ! ";
   redirect_to("comment.php");
  
  }else {
    $_SESSION["errormsg"]="Something Went Wrong. Try Again !";
   redirect_to("comment.php");
  }
}






?>