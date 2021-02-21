<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php confirm_login(); ?>



<?php 
$searchid=$_GET["id"];
if(!isset($searchid)){
    
    
    redirect_to("posts.php");
}
if(isset($_POST["Submit"])){
    $posttitle=$_POST["posttitle"];
    $cat=$_POST["cat"];
    $slug=$_POST["slugtitle"];
    $slug =str_replace(' ', '-', strtolower($slug));
    $image=$_FILES["image"]["name"];
    $Target ="uploads/".basename($_FILES["image"]["name"]);
    $post= $_POST["fullpost"];
    $admin=$_SESSION["Username"];
    date_default_timezone_set("Asia/Kolkata");
    $time = time();
    $timedate = strftime("%B-%d-%y-%H-%M-%S",$time);

        if(empty($posttitle)){
            
            $_SESSION["errormsg"] = "This field Can't be empty";
            redirect_to("posts.php");
        } elseif(strlen($posttitle)<5)
        {
              $_SESSION["errormsg"] = "Title should be greater than 2 charcacters";
            redirect_to("posts.php");
            
            
        }
    elseif(strlen($posttitle)>69)
        {
              $_SESSION["errormsg"] = "Post Title should be not greater than 60 charcacters";
            redirect_to("posts.php");
            
            
        }
     elseif(strlen($post)>4999)
        {
              $_SESSION["errormsg"] = "Post Should not be greater than 5000 charcacters";
            redirect_to("posts.php");
            
            
        }
    else{
        
        //Post
        global $Connectingdb;
        
        if(!empty($image)){
        $sql ="UPDATE post SET title='$posttitle', cat='$cat', image='$image', post='$post' ,slug='$slug' WHERE id='$searchid'";
           
        }
        else
            {
            
             $sql ="UPDATE post SET title='$posttitle', cat='$cat', post='$post' , slug='$slug' WHERE id='$searchid'";
            }
        
        $stmt= $Connectingdb->query($sql);
        
       
    
          move_uploaded_file($_FILES["image"]["tmp_name"],$Target);
       
       
        if($stmt->execute()){
            
            $_SESSION["successmsg"]="Post updated Succesfully";
           redirect_to("posts.php");
            
        }
        
        else {
            
            $_SESSION["errormsg"]="Sometging went wrong Try again";
            redirect_to("posts.php");
            
        }
        
        
        
        
    }
    
    
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="css/style.css">
    
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
         <h1><i class="fa fa-list-alt" aria-hidden="true"></i> Update Post</h1>
        
        </div>
        
        </div>
    
    </div>

</header>

<!-- Main !-->


<section class="container py-4 mb-4">
    <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px" >
        <?php echo errormsg();
            echo successmsg();  ?>
            <?php 
        $sql="SELECT * FROM post WHERE id='$searchid'";
        $stmt=$Connectingdb->query($sql);
            while($DataRows=$stmt->fetch()) {
                $title= $DataRows["title"];
                $cat =$DataRows["cat"];
                $image =$DataRows["image"];
                $post =$DataRows["post"];
                $slug  =$DataRows["slug"];
                
                
            }
            
        ?>
    
        <form class="" action="editpost.php?id=<?php echo $searchid ?>" method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
            <div class="card-body bg-dark">
            <div class="form-group">
                <label for="title"><span class="fieldinfo">Post Title:</span></label>
                <input class="form-control" type="text" name="posttitle" id="title" placeholder="Type title of post name" value ="<?php echo $title ?>">
                   <!-- Slug !-->

                 <label for="title"><span class="fieldinfo">Slug Title:</span>   <small class="mya"><a href="<?php echo $slug?>">  http://localhost/cms/<?php echo $slug?></a></small></label>
              

                <input class="form-control" type="text" name="slugtitle" id="title" placeholder="Type title of post name" value ="<?php 
                echo $slug ?>">
                </div>
                <span class="fieldinfo">Current Category:--</span><?php echo $cat;?><br>
                 <label for="cattitle"><span class="fieldinfo">Choose Category:</span></label>
                
                <select class="form-control" id="cattitle" name="cat">
                    <?php
                    //fetching categorys
                    
                    $sql="SELECT * from cat";
                    $stmt=$Connectingdb->query($sql);
                    while($DataRows= $stmt->fetch()){
                        
                        $id=$DataRows["id"];
                        $catname=$DataRows["title"];
                        
                        ?>
                    
                    <option> <?php echo $catname; ?> </option>
                    <?php } ?>
                </select>
    
            <div class="form-group mb-1 pt-3">
                <span class="fieldinfo"> Current banner</span><br><img src="uploads/<?php echo $image?>" height=120px width=300px ></img><br>
            
                <labe for="image"><span class="fieldinfo"> Select Image:-- </span></label>
            <div class="custom-file">
            <input class="custom-file-input" type="File" name="image" id="imageselect" value="">
                <label for="imageselect" class="custom-file-label">Select image:-- </label>
            </div>
            </div>
              
            
            <div class="form-group mb-1"> 
                
               <label for="post"><span class="fieldinfo">Post:</span></label>
                <textarea class="form-control" id="post" name="fullpost" rows="8" cols="80" ><?php echo $post ?>
                </textarea>
            </div>
        
        
                <div class="row">
                    
                <div class="col-lg-6 mb-2">
                    <a href="dashboard.php" class="btn btn-warning btn-block"><i class="fa fa-tachometer" aria-hidden="true"></i> Back To Dashboard</a></div>
                <div class="col-lg-6 mb-2">
                    <button type="submit" name="Submit" class="btn btn-success btn-block"> <i class="fa fa-upload" aria-hidden="true"></i> Publish</a></div>
                
                
                </div>
                 </div>
            </div>
        
        </form>
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