<?php
require_once("include/db.php");
?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
$_SESSION["Tracking"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["Tracking"];

confirm_login(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://use.fontawesome.com/f4f3f5cdac.js"></script>

    
    
	<title>Manage Posts</title>
</head>
<body>
    <div style="height:10px; background:#27aae1;"></div>
    
    <!-- Nav Bar!-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <a href="#" class="navbar-brand pl-1">       RemarkableTrick</a>

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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <a href=logout.php><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li></ul>
        </div>
        </div>
    </nav>
   <!-- Nav Bar Ending!-->
 <div style="height:10px; background:#34c0eb;"></div>

   <!-- Header!-->


<header class="bg-dark text-white py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        
        <h1><i class="fas fa-blog" ></i>Blog Posts</h1>
        
        </div>
        
        <div class="col-lg-3 mb-2">
        <a href="addnewpost.php" class="btn btn-primary btn-block">
            <i class="fa fa-upload" aria-hidden="true"></i> Add New Post
            
            </a>
        
        </div>
         
        <div class="col-lg-3 mb-2">
        <a href="categories.php" class="btn btn-info btn-block">
            <i class="fa fa-edit" aria-hidden="true"></i> Add New Categories
            
            </a>
        
        </div>
        <div class="col-lg-3 mb-2">
        <a href="admins.php" class="btn btn-warning btn-block">
            <i class="fa  fa-user" aria-hidden="true"></i> Add New Admins
            
            </a>
        
        </div>
        <div class="col-lg-3 mb-2">
        <a href="/categories.php" class="btn btn-success btn-block">
            <i class="fa fa-check" aria-hidden="true"></i>Approved Comments
            
            </a>
        
        </div>
        
        </div>
    
    </div>

</header>
   <!-- Header closed!-->

  <!-- Main!-->
<section class="container py-2 mb-4">
<div class="row">
    <div class="col-lg-12">
               <?php
           echo errormsg();
        echo successmsg();
           ?>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
        <tr>
         
         <th>#</th>
         <th>Title</th>
         <th>Date</th>
         <th>Category</th>
         <th>Author</th>
         <th>Banner</th>
         <th>Comments</th>
         <th>Actions</th>
         <th>Live Preview</th>
         
        </tr>
            </thead>
        <?php 
        $sr=0;
        $sql="select * from post";
         $stmt = $Connectingdb->query($sql);
        while($DataRows = $stmt->fetch()){
            
            $id=$DataRows["id"];
            $datetime=$DataRows["dateandtime"];
            $title=$DataRows["title"];
            $cat=$DataRows["cat"];
            $author=$DataRows["author"];
            $image=$DataRows["image"];
            $posts=$DataRows["post"];
            $sr++;
            
            
        ?>
        <tbody>
        <tr>
            <td><?php echo $sr; ?></td>
            <td><?php if(strlen($title)>20){ $title = substr($title,0,15)."..";} echo $title; ?></td>
            <td><?php if(strlen($datetime)>12){ $datetime = substr($datetime,0,10).".." ;} echo $datetime; ?></td>
            <td><?php if(strlen($cat)>20){ $cat = substr($cat,0,15);} echo $cat; ?></td>
            <td><?php if(strlen($author)>6){ $cat = substr($author,0,6);} echo $author; ?></td>
            <td><img src="uploads/<?php echo $image; ?>" width="170px;" height="80px;"</td>
            <td>comment</td>           
            <td> <a href="editpost.php?id=<?php echo $id ?>"><span class="btn btn-warning">Edit</span></a>
                <a href="deletepost.php?id=<?php echo $id ?>"><span class="btn btn-danger">Delete</span></a>
            </td>
            <th><a href="fullpost.php?id=<?php echo $id ?>"><span class="btn btn-primary">Live Preview</span></a></td>
        
        </tr>
            </tbody>
        <?php } ?>
        
        
        
        </table>
    
    
    
    
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