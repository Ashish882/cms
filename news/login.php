 <?php 
    require_once 'config.php'; 
    if(logged_in()) {header('Location: index.php');} 
    $title = "login"; 
    $nonav = true; 
    $mini = true; 
    if($_POST && (!empty($_POST['username']) ) && (!empty($_POST['password']))) { 
        validate_user($_POST['username'], $_POST['password']); 
    } 
    $error = $_SESSION['error']; 
    $content = <<<EOF 
    $error
    <form action="login.php" method="post"> 
        <p> 
            <label for="username">username:</label><br /> 
            <input type="text" name="username" class="text" /> 
        </p> 
        <p> 
            <label for="password">password:</label><br /> 
            <input type="password" name="password" class="text" /> 
        </p> 
        <p> 
            <input type="submit" value="login" /> 
        </p> 
    </form> 
    EOF; 
    include 'layout.php'; ?>