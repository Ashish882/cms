<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php  

   $searchid=$_GET["slug"];
   if(isset($_GET["slug"])){
   $sql="select slug from post WHERE slug='$searchid'";
             $stmt=$Connectingdb->query($sql);
             $newresult=$stmt->rowcount();
             if($newresult==0){
          //  $_SESSION["errormsg"]= "Bad Request related to full post";
            redirect_to("eroor.php");
        }
      }

?>


<?php if(isset($_POST["Submit"])){
    $cname=$_POST["commentname"];
    $cemail=$_POST["commentemail"];
    $ctext=$_POST["commenttext"];
    date_default_timezone_set("Asia/Kolkata");
    $time = time();
    $timedate = strftime("%B-%d-%y-%H-%M-%S",$time);
        if(empty($cname)||empty($cemail)||empty($ctext)){
            
            $_SESSION["errormsg"] = "This field Can't be empty";
            redirect_to("$searchid");
        } 
    elseif(strlen($ctext)>500)
        {
              $_SESSION["errormsg"] = "comment should not greater than 500 charcacters";
            redirect_to("$searchid");
            
            
        }
    else{

      //To insert comment

         if (isset($_GET["slug"])){
        $sql = "SELECT id from post where slug='$searchid'";
         $stmt = $Connectingdb->query($sql);
         $newid=$stmt->fetch();
         $newid = array_shift($newid);

              }

        $sql ="INSERT into comment(dateandtime,name,email,comment,approvedby,statues,postid)";
        $sql.="values(:dyname,:Cname,:Cemail,:Ctext,'pending','OFF',:Postid)";
        $stmt= $Connectingdb->prepare($sql);
        $stmt->bindValue(':dyname',$timedate);
        $stmt->bindValue(':Cname',$cname);
        $stmt->bindValue(':Cemail',$cemail);
        $stmt->bindValue(':Ctext',$ctext);
        $stmt->bindValue(':Postid',$newid);
        $excute=$stmt->execute();
        if($excute){
            
            $_SESSION["successmsg"]="Comment has been added Succesfully";
            redirect_to("$searchid");
            
        }
        
        else{
            $_SESSION["errormsg"]="Sometging went wrong Try again";
           redirect_to("$searchid");
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

    
    
	<title>Blog</title>
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
                            <a href="" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> </i>Home</a>    </li>
                        <li class="navbar-item">
                            <a href="dashboard.php" class="nav-link">About Us</a></li>
                        <li class="navbar-item">
                            <a href="blog.php" class="nav-link">Blogs</a></li>
                        <li class="navbar-item">
                            <a href="categories.php" class="nav-link">Contact us</a></li>
                        <li class="navbar-item">
                            <a href="admins.php" class="nav-link">Features</a></li>
                        
            </ul>
         <ul class="navbar-nav ml-auto">
        <form class="form-inline d-none d-sm-block" action="blog.php">
          <div class="form-group">
          <input class="form-control mr-2" type="text" name="Search" placeholder="Search here"value="">
          <button  class="btn btn-primary" name="SearchButton">Go</button>
          </div>
        </form>
      </ul>
        </div>
        </div>
    </nav>
 <div style="height:10px; background:#34c0eb;"></div>
  <!-- NAVBAR END -->

    <!-- HEADER -->
<div class="container">
<div class="row mt-4">
    <!--Main class-->
    
    <div class="col-sm-8">  
    
        <br>
        <br>
          <?php
        echo errormsg();
        echo successmsg();

           ?>


          <?php

          //Search
        
            if(isset($_GET["SearchButton"])){
            $search=$_GET["Search"];
            $sql="SELECT * FROM post WHERE dateandtime LIKE :search OR title LIKE :search OR cat LIKE :search OR post LIKE :search";
            $stmt=$Connectingdb->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%');
            $stmt->execute();

        }
            
        else{

           

             if(!isset($searchid)){

            $_SESSION["errormsg"]="Bad Request search id is not set";
           redirect_to("blog.php");

        }
             $searchid=$_GET["slug"];
             $sql="select * from post WHERE slug='$searchid'";
             $stmt=$Connectingdb->query($sql);
       
        }
        
    while($DataRows = $stmt->fetch()){
        
        
            $id=$DataRows["id"];
            $datetime=$DataRows["dateandtime"];
            $title=$DataRows["title"];
            $cat=$DataRows["cat"];
            $author=$DataRows["author"];
            $image=$DataRows["image"];
            $posts=$DataRows["post"];
            $slug=$DataRows["slug"];
    ?>
        
        
        
<div class="card">
            <img src="uploads/<?php echo htmlentities($image);?>" style="max-height:450px;" class="img-fluid card-img-top"/>
            <div class="card-body">
            <h4 class="card-title"><?php echo htmlentities($title)?></h4>
            <small class="text-muted">Written by:-<?php echo $author; ?>
                 <span style="float:right;" class="badge badge-dark text-light"><?php echo approvecomment($id);?></span>On <span class="text-dark"><?php echo htmlentities($datetime); ?></span></small>
                <hr>
                <div class="card-text">
                <?php echo $posts;?>
                </div>
                <br>
                <?php
                if(isset($_SESSION["id"]))
                { ?>
                       <a href="editpost.php?id=<?php echo $id;?>"><button type=submit class="btn btn-primary" name="edit">Edit</button>
                               </a>
                       <?php } ?>
          
            </div>
        </div>
    <br>
     <?php }?>
    
    
    <!-- Comment box fetchhing  !-->
   <h1> <span class="fieldinfos">Comments</span></h1>
         <br><br>
    
    <?php
             

      if (isset($_GET["slug"])){
        $sql="SELECT id from post where slug='$searchid'";
         $stmt= $Connectingdb->query($sql);
         $coid=$stmt->fetch();
         $newid=array_shift($coid);
        

              }

      
    
    $sql="SELECT * FROM comment WHERE postid='$newid'  and statues='ON'";
    $stmt=$Connectingdb->query($sql);
     while($DataRows = $stmt->fetch()){
        
        $datetime=$DataRows["dateandtime"];
        $cname=$DataRows["name"];
        $ctext=$DataRows["comment"];
    ?>
    
    <div class="media CommentBlock">
        <img class="d-block img-fluid align-self-start" src="images/comment.png" height=110px width="150px" alt="">
        <div class="media-body ml-2">
            <h6 class="lead"><?php echo $cname;?></h6>
            <p class="small"><?php echo $datetime;?></p>
            <p><?php echo $ctext;?></p>
        </div>  
    </div>
    <hr>
        <?php } ?>
    
      <!-- Comment box start !-->
    <div class="">
        <form action="<?php echo $searchid; ?>" method="post" >
            <div class="card mb-3">
            <div class="card-header">
                <h5>Share you thought about this post</h5>
                </div>
                
                <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                         <input class="form-control" type="text" name="commentname" placeholder="name" value="">
                    </div>
                    </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend  ">
                            <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                          
                    
                    </div>
                          <input class="form-control" type="email" name="commentemail" placeholder="email" value="">
                </div>
            </div>
                    <div class="form-group">
                        <textarea name=commenttext class="form-control" rows=6 cols=60></textarea>
                    </div>
                    
                    <button type=submit class="btn btn-primary" name="Submit">Submit</button>
        </form>
    </div>
      <!-- comment box end !-->
                
    </div>
    </div>
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