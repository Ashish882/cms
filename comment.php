<?php require_once("include/db.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
$_SESSION["Tracking"]=$_SERVER["PHP_SELF"];
confirm_login();?>

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
         <h1><i class="fa fa-list-alt" aria-hidden="true"></i> Manage Categories</h1>
        
        </div>
        
        </div>
    
    </div>

</header>

  <!-- NAVBAR END -->
    <!-- HEADER -->
<section class="container py-2 mb-4">
      <div class="row" style="min-height:30px;">
        <div class="col-lg-12" style="min-height:400px;">
          <?php
           echo errormsg();
           echo successMsg();
           ?>
          <h2>Un-Approved Comments</h2>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No. </th>
                <th>Date&Time</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Aprove</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
       
          $sql = "SELECT * FROM comment WHERE statues='OFF' ORDER BY id desc";
          $Execute =$Connectingdb->query($sql);
          $SrNo = 0;
          while ($DataRows=$Execute->fetch()) {
            $CommentId = $DataRows["id"];
            $DateTimeOfComment = $DataRows["dateandtime"];
            $CommenterName = $DataRows["name"];
            $CommentContent= $DataRows["comment"];
            $CommentPostId = $DataRows["postid"];
            $SrNo++;
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($SrNo); ?></td>
              <td><?php echo htmlentities($DateTimeOfComment); ?></td>
              <td><?php echo htmlentities($CommenterName); ?></td>
              <td><?php echo htmlentities($CommentContent); ?></td>
              <td> <a href="approve.php?id=<?php echo $CommentId;?>" class="btn btn-success">Approve</a>  </td>
              <td> <a href="dcom.php?id=<?php echo $CommentId;?>" class="btn btn-danger">Delete</a>  </td>
              <td style="min-width:140px;"> <a class="btn btn-primary"href="fullPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a> </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>
          <h2>Approved Comments</h2>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No. </th>
                <th>Date&Time</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Approved by</th>
                <th>Revert</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
       
          $sql = "SELECT * FROM comment WHERE statues='ON' ORDER BY id desc";
          $Execute =$Connectingdb->query($sql);
          $SrNo = 0;
          while ($DataRows=$Execute->fetch()) {
            $CommentId         = $DataRows["id"];
            $DateTimeOfComment = $DataRows["dateandtime"];
            $CommenterName     = $DataRows["name"];
            $ApprovedBy        = $DataRows["approvedby"];
            $CommentContent    = $DataRows["comment"];
            $CommentPostId     = $DataRows["postid"];
            $SrNo++;
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($SrNo); ?></td>
              <td><?php echo htmlentities($DateTimeOfComment); ?></td>
              <td><?php echo htmlentities($CommenterName); ?></td>
              <td><?php echo htmlentities($CommentContent); ?></td>
              <td><?php echo htmlentities($ApprovedBy); ?></td>
              <td style="min-width:140px;"> <a href="disapprove.php?id=<?php echo $CommentId;?>" class="btn btn-warning">Dis-Approve</a>  </td>
              <td> <a href="dcom.php?id=<?php echo $CommentId;?>" class="btn btn-danger">Delete</a>  </td>
              <td style="min-width:140px;"> <a class="btn btn-primary"href="fullpost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a> </td>
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