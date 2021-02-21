<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php

if(isset($_SESSION["id"])){
       redirect_to("dashboard.php");
  }

if(isset($_POST["Submit"])){
     $UserName = $_POST["Username"];
     $Password = $_POST["Password"];
  if (empty($UserName)||empty($Password)) {
    $_SESSION["errormsg"]= "All fields must be filled out";
    Redirect_to("login.php");
  }else {
      
     $founduser=login_atempt($UserName,$Password);
      if($founduser){
      $_SESSION["id"]=$founduser["id"];
      $_SESSION["Username"]=$founduser["username"];
      $_SESSION["aname"]=$founduser["aname"];
      $_SESSION["role"]=$founduser["role"];
          
         $_SESSION["successmsg"]= "Welecome ".$_SESSION["aname"]; 
          if(isset($_SESSION["Tracking"]))
          {
            redirect_to($_SESSION["Tracking"]);
          }
          else {
              redirect_to("dashboard.php");
          }
      }
      else{
          
              $_SESSION["errormsg"]= "Incorrect Password/Username";
            redirect_to("login.php");
          
          
      }
      
  }
    
}
    
    
    





?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://use.fontawesome.com/f4f3f5cdac.js"></script>

    
    
	<title>Login</title>
</head>
<body>
    <div style="height:10px; background:#27aae1;"></div>
    <!-- Nav Bar!-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">RemarkableTrick</a>
        </div>
        </div>
    </nav>
    
 <div style="height:10px; background:#34c0eb;"></div>


<header class="bg-dark text-white py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
        </div>
    </div>
</header>
    
    <section class="container py-2 mb-3">
        <div class="row">
        <div class="offset-sm-3 col-sm-6" style="min-height:200px;">
               <?php echo errormsg();
            echo successmsg();
        ?>
            <div class="card bg-secondary text-light">
            <div class="card-header">
                <h4>Welcome to the login page</h4>
                </div>
                
            <div class="card-body bg-dark">
                
                <form class="" action="login.php" method="post">
                <div class="form-group">
                  <label for="username"><span class="FieldInfo">Username:</span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="Username" id="username" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password"><span class="FieldInfo">Password:</span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white bg-info"> <i class="fa fa-key" aria-hidden="true"></i> </span>
                    </div>
                    <input type="password" class="form-control" name="Password" id="password" value="">
                  </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
              </form>
                </div>
            </div>
            </div>
        </div>
    </section>
    
    
    
 
    
    <br>
    
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