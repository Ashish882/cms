<?php require_once("include/db.php"); ?>

<?php 

function redirect_to($url){

    header("location:$url");
    exit;


}


function checkusername($username){
  global  $Connectingdb;
$sql="SELECT * FROM admin WHERE username=:Username";
$stmt=$Connectingdb->prepare($sql);
    $stmt->bindValue(':Username',$username);
    $stmt->execute();
    $Result= $stmt->rowcount();
    if($Result==1)
    {
        return true;
    }
    
    else
    {

        return false;
    }
}

function login_atempt($UserName,$Password){
    global  $Connectingdb;
    $sql="SELECT * from admin WHERE username=:userName AND passsword=:passWord LIMIT 1";
    $stmt=$Connectingdb->prepare($sql);
     $stmt->bindValue(':userName',$UserName);
     $stmt->bindValue(':passWord',$Password);
     $stmt->execute();
     $result= $stmt->rowcount();
    if($result==1){
        return $founduser=$stmt->fetch();
    }
    else
    {
        return null;
    }
}
    
function confirm_login(){
        if(isset($_SESSION["id"])){
            
            return true;
        }
    
           else
           {
            $_SESSION["errormsg"]="Login Required";
               redirect_to("login.php");
           }

    
    }

    function approvecomment($postid){
         global  $Connectingdb;

        $sqlapprove="SELECT COUNT(*) FROM comment where postid='$postid' AND statues='ON'";
        $stmtapprove= $Connectingdb->query($sqlapprove);
        $rowtotal=  $stmtapprove->fetch();
        $total=array_shift($rowtotal);
        return $total;





    }

   function disapprove($postid){
     global  $Connectingdb;

        $sqlapprove="SELECT COUNT(*) FROM comment where postid='$postid' AND statues='OFF'";
        $stmtapprove=$Connectingdb->query($sqlapprove);
        $rowtotal=  $stmtapprove->fetch();
        $total=array_shift($rowtotal);
        return $total;





    }

   function catpostexit($CategoryName){
         global  $Connectingdb;

        $sql="SELECT * from post WHERE cat ='$CategoryName'";
        $stmt=$Connectingdb->query($sql);
        $result=$stmt->rowcount();
        if($result==0){
           return 0;
         
             }

             else{
             return $CategoryName;

             }




    }
     function totalpost(){
         global  $Connectingdb;


                $sql="select count(*) from post";
                $stmt=$Connectingdb->query($sql);
                $total=$stmt->fetch();
                $totalposts=array_shift($total);
                return $totalposts;

            }


               


    
    
    

?>