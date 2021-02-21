<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php

    // Check if email already exists


// SIGN UP USER
if (isset($_POST['signup-btn'])) {
  $username = $_POST['username'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    if (empty($_POST['username'])) {
         $_SESSION["errormsg"] = 'Username required';
         redirect_to("signup.php");
    }
    elseif (empty($_POST['email'])) {
         $_SESSION["errormsg"] = 'Email required';
         redirect_to("signup.php");
    }
    elseif (empty($_POST['password'])) {
        $_SESSION["errormsg"] = 'Password required';
        redirect_to("signup.php");
    }
    elseif (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
         $_SESSION["errormsg"] = 'The two passwords do not match';
         redirect_to("signup.php");
    }

    else{
      $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $stmt=$Connectingdb->query($sql);
    $result=$stmt->rowcount();
    if ($result >0) {
         $_SESSION["errormsg"]= "Email already exists";
         redirect_to("signup.php");

    }

  }
    
    
  
  
        $sql = "INSERT INTO users(username,email,token,password)";
        $sql .= "VALUES(:user,:ema,:tok,:pas)";
        $stmt = $Connectingdb->prepare($sql);
        $stmt->bindValue(':user',$username);
        $stmt->bindValue(':ema',$email);
        $stmt->bindValue(':tok',$token);
        $stmt->bindValue(':pas',$password);
        $result=$stmt->execute();
        if ($result) {
        
            // TO DO: send verification email to user
            // sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';

            $_SESSION["successmsg"] = $_SESSION['username']." you are susefully register";

            redirect_to("blog.php");
          

        } else {
              $_SESSION["errormsg"] = "Database error: Could not register user";
                redirect_to("blog.php");
        }
    }




    

    /*

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
*/
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

 <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth">
          <?php 
         
        echo errormsg();
            echo successmsg();
        ?>
        <h3 class="text-center form-title">Register</h3>
        <form action="signup.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control form-control-lg" value="">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control form-control-lg" value="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password Confirm</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-lg btn-block">Sign Up</button>
          </div>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>
    
    
    
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