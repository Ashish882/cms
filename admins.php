<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php 

$role = $_SESSION["role"];
if($role=='admin'){


confirm_login();

}

else{

   $_SESSION["errormsg"] = "You Dont Have a premssion to Acccess that Page";

    redirect_to("dashboard.php");

}

?>



<?php if(isset($_POST["Submit"])){
    
    $username=$_POST["username"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $admin=$_SESSION["Username"];
    date_default_timezone_set("Asia/Kolkata");
    $time = time();
    $timedate = strftime("%B-%d-%y-%H-%M-%S",$time);


        if(empty($username)||empty($password)||empty($cpassword)){
            
            $_SESSION["errormsg"] = "This field Can't be empty";
            redirect_to("admins.php");
        } elseif(strlen($password)<4)
        {
              $_SESSION["errormsg"] = "Password should be greater than 4 charcacters";
            redirect_to("admins.php");
            
            
        }
    
     elseif(checkusername($username))
        {
              $_SESSION["errormsg"] = "Username already exist";
            redirect_to("admins.php");
            
            
        }
    elseif($password !== $cpassword)
        {
              $_SESSION["errormsg"] = "Password and confirm password is not marching";
            redirect_to("admins.php");
            
            
        }
    else{
        
        global $Connectingdb;
        $sql = "INSERT INTO admin(dateandtime,username,passsword,aname,addedby)";
        $sql .= "VALUES(:Dateandtime,:Username,:Password,:Name,:Addedby)";
        $stmt = $Connectingdb->prepare($sql);
        $stmt->bindValue(':Dateandtime',$timedate);
        $stmt->bindValue(':Username',$username);
        $stmt->bindValue(':Password',$password);
        $stmt->bindValue(':Name',$name);
        $stmt->bindValue(':Addedby',$admin);
        $excute=$stmt->execute();
        if($excute){
            
            $_SESSION["successmsg"]="Admin added Succesfully";
            redirect_to("admins.php");
            
        }
        
        else {
            
            $_SESSION["errormsg"]="Sometging went wrong Try again";
            var_dump($excute);
            redirect_to("admins.php");
        }    
    }
    
    
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="css/style.css"/>
    
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
<script src="https://use.fontawesome.com/f4f3f5cdac.js"></script>
   
</head>
<body>

    
    <div style="height:10px; background:#27aae1;"></div>
    <!-- Nav Bar!-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <a href="#" class="navbar-brand pl-1">RemarkableTrick</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="navbar-item">
                            <a href="myprofile.php" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> </i>My Profile</a>    </li>
                        <li class="navbar-item">
                            <a href="dashboard.php" class="nav-link">Dashboard</a>    </li>
                        <li class="navbar-item">
                            <a href="posts.php" class="nav-link">Posts</a>    </li>
                        <li class="navbar-item">
                            <a href="categories.php" class="nav-link">Categories</a>    </li>
                        <li class="navbar-item">
                            <a href="admins.php" class="nav-link">Manage Admins</a></li>
                        
            </ul>
        </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <a href=logout.php><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li></ul>
        </div>
        
        
        
        
        
        
        </div>

    
    </nav>
 <div style="height:10px; background:#34c0eb;"></div>

<!-- Header !-->


<header class="bg-dark text-white py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
         <h1><i class="fa fa-list-alt" aria-hidden="true"></i>Manage Admins</h1>
        
        </div>
        
        </div>
    
    </div>

</header>

<!-- Main !-->
<section class="container py-4 mb-4">
    <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px" >
        <?php 
         
        echo errormsg();
            echo successmsg();
        ?>
    
        <form class="" action="admins.php" method="post">
        <div class="card bg-secondary text-light mb-3">
            <div class="card-header">
            
            <h1>Add New Admins</h1>
            
            </div>
            <div class="card-body bg-dark">
            <div class="form-group">
                <label for="username"><span class="fieldinfo">Username:</span></label>
                
                <input class="form-control" type="text" name="username" id="title" value ="">
                </div>
                
                <div class="form-group">
                <label for="name"><span class="fieldinfo">Name:</span></label>
                
                <input class="form-control" type="text" name="name" id="title" value ="">
                    <small class="text-warnning text-muted">optional</small>
                
               
                </div>
                
                    <div class="form-group">
                <label for="password"><span class="fieldinfo">Password:</span></label>
                <input class="form-control" type="password" name="password" id="title"value ="">
                
                </div>
                
                    <div class="form-group">
                <label for="title"><span class="fieldinfo">Confirm Password:</span></label>
                <input class="form-control" type="password" name="cpassword" id="title" value ="">
                
                </div>

                
                </div>
                
                
                <div class="row">
                <div class="col-lg-6 mb-2">
                    <a href="dashboard.php" class="btn btn-warning btn-block"> <i class="fa fa-tachometer" aria-hidden="true"></i> Back To Dashboard</a></div>
                <div class="col-lg-6 mb-2">
                    <button type="submit" name="Submit" class="btn btn-success btn-block"> <i class="fa fa-upload" aria-hidden="true"></i> Publish</a></div>
                
                
                </div>
            </div>
            
            
            
            </div>
        
        
        
        
        </form>

         <h2>Existing Admins</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No. </th>
            <th>Date&Time</th>
            <th>Username</th>
            <th>Admin Name</th>
            <th>Added by</th>
            <th>Action</th>
          </tr>
        </thead>
      <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM admin ORDER BY id desc";
      $Execute =$Connectingdb->query($sql);
      $SrNo = 0;
      while ($DataRows=$Execute->fetch()) {
        $AdminId = $DataRows["id"];
        $DateTime = $DataRows["dateandtime"];
        $AdminUsername = $DataRows["username"];
        $AdminName= $DataRows["aname"];
        $AddedBy = $DataRows["addedby"];
        $SrNo++;
      ?>
      <tbody>
        <tr>
          <td><?php echo htmlentities($SrNo); ?></td>
          <td><?php echo htmlentities($DateTime); ?></td>
          <td><?php echo htmlentities($AdminUsername); ?></td>
          <td><?php echo htmlentities($AdminName); ?></td>
          <td><?php echo htmlentities($AddedBy); ?></td>
          <td> <a href="deleteadmin.php?id=<?php echo $AdminId;?>" class="btn btn-danger">Delete</a>  </td>

      </tbody>
      <?php } ?>
      </table>
        
        
        
        </div>
    </div>
    








</section>
    
    <!-- Foooter !-->
    <footer class="bg-dark text-white">
<div class="container">
    <div class="row">
        <div class="col-md-12">
    
    <p class="lead text-centre">Theme By| Ashish Sharma|&copy right Reserved</p>
    
    </div>
        </div>
    
    </div>
</footer>
    
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>