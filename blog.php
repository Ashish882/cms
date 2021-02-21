<?php
require_once("include/db.php"); 
require_once("include/function.php"); 
require_once("include/session.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://use.fontawesome.com/f4f3f5cdac.js"></script>

    
    
	<title>Blog Page</title>
    <style media="screen">
        .heading{
            font-family:Bitter,Georgia,"Times New Roman",Times,serif;
            font-weight: bold;
            color: #005E90;


        }

        .heading:hover{
color: #0090DB;

        }

    </style>
</head>
<body>
    
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
                            <a href="#" class="nav-link">About Us</a></li>
                        <li class="navbar-item">
                            <a href="blog.php" class="nav-link">Blogs</a></li>
                        <li class="navbar-item">
                            <a href="contact-us.php" class="nav-link">Contact us</a></li>
                        <li class="navbar-item">
                            <a href="#" class="nav-link">Features</a></li>
                        
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
      <h1>Blog Posts</h1>
          <h1 class="lead">The Blogs that helps the coders</h1>
          <br>

        <?php
           echo errormsg();
           echo successmsg();
        //Search button php
        if(isset($_GET["SearchButton"])){
            $search=$_GET["Search"];
            $sql="SELECT * FROM post WHERE dateandtime LIKE :search OR title LIKE :search OR cat LIKE :search OR post LIKE :search";
            $stmt=$Connectingdb->prepare($sql);
            //searching
            $regex = '/^[a-zA-Z0-9 ]*$/'; 
            if(preg_match($regex, $search)) { 
             $stmt->bindValue(':search','%'.$search.'%');
             $stmt->execute(); 
                     } 
else { 

    $_SESSION["errormsg"]="Only letters and white space"
        . " allowed in name string";
            redirect_to("blog.php");
             }  
$new=$stmt->rowcount();
    if($new=='0'){
         $_SESSION["errormsg"]="Search iteam not found in this blog";
            redirect_to("blog.php");
             }

           }



        else if(isset($_GET["page"])){
        $Page=$_GET["page"];
        if(!is_numeric($Page))
        {
           $_SESSION["errormsg"]="Page shoul always numeric";
            redirect_to("blog.php");

        }
        if($Page==0||$Page<1){

        $totalpost=0;

    }
    else{

    $totalpost=($Page*4)-4;
}
    $sql="select * from post order by id desc limit $totalpost,4";
    $stmt=$Connectingdb->query($sql);
    $new=$stmt->rowcount();
    if($new=='0'){
         $_SESSION["errormsg"]="No post on this pages";
            redirect_to("blog.php");
             }
    else
    {
    $stmt->execute(); 
} 
}

else if(isset($_GET["category"])){
    $getcat=$_GET["category"];

             if(!isset($getcat)){

            $_SESSION["errormsg"]="Bad Category Request";
            redirect_to("blog.php");

          }


$sql="SELECT * from post WHERE cat ='$getcat' ORDER BY id desc ";
$stmt=$Connectingdb->query($sql);

$result=$stmt->rowcount();
if($result<1){

   $_SESSION["errormsg"]="Bad Request related to category";
            redirect_to("blog.php");
}

$stmt->execute();
}           
        
        else{

    $sql="select * from post";
    $stmt=$Connectingdb->query($sql);
    $stmt->execute();
            
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
            <h4 class="card-title"><?php echo htmlentities($title) ?></h4>

            <small class="text-muted">Category: <span class="text-dark"> <a href="blog.php?category=<?php echo htmlentities($cat); ?>"> <?php echo htmlentities($cat); ?> </a></span> & Written by:-<?php echo $author; ?>

                 <span style="float:right;" class="badge badge-dark text-light"><?php $total = approvecomment($id); echo $total; ?></span>On <span class="text-dark"><?php echo htmlentities($datetime); ?></span></small>
                <hr>
                <p class="card-text">
                <?php if(strlen($posts)>150){
    $posts= substr($posts,0,149)."...";
    
} echo $posts;?> </p>

       <a href="<?php echo $slug; ?>" style="float:right;">
            <span class="btn btn-info">Read More &rang;&rang;</span>
                </a>
            </div>
        </div>
    <br>
     <?php }?>

      <!-- Pagination -->
          <nav>
            <ul class="pagination pagination-lg">
              <!-- Creating Backward Button -->
              <?php if( isset($Page) ) {
                if ( $Page>1 ) {?>
             <li class="page-item">
                 <a href="blog.php?page=<?php  echo $Page-1; ?>" class="page-link">&laquo;</a>
               </li>
             <?php } }?>
            <?php
            global $Connectingdb;
            $sql           = "SELECT COUNT(*) FROM post";
            $stmt          = $Connectingdb->query($sql);
            $RowPagination = $stmt->fetch();
            $TotalPosts    = array_shift($RowPagination);
            $PostPagination=$TotalPosts/5;
            $PostPagination=ceil($PostPagination);
       
            for ($i=1; $i <=$PostPagination ; $i++) {
              if( isset($Page) ){
                if ($i == $Page) {  ?>
              <li class="page-item active">
                <a href="blog.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
              </li>
              <?php
            }else {
              ?>  <li class="page-item">
                  <a href="blog.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                </li>
            <?php  }
          } } ?>
          <!-- Creating Forward Button -->
          <?php if (isset($Page) && !empty($Page) ) {
            if ($Page+1 <= $PostPagination) {?>
         <li class="page-item">
             <a href="blog.php?page=<?php  echo $Page+1; ?>" class="page-link">&raquo;</a>
           </li>
         <?php } }?>
            </ul>
          </nav>
        </div>
        <!-- Main Area End-->
  

    <?php require_once("footer.php"); ?>
  



      