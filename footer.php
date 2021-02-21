<!-- Side Area Start -->
      <div class="col-sm-4">
          <div class="card mt-4">
            <div class="card-body">
              <img src="uploads/c-c.jpg" class="d-block img-fluid mb-3" alt="">
              <div class="text-center">
                Any sufficiently advanced technology is indistinguishable from magic.
             You never change things by fighting the existing reality.It's still magic even if you know how it's done.We are stuck with technology when what we really want is just stuff that works.
              </div>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-dark text-light">
                <h2 class="lead">Sign up</h2>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-success btn-block text-center text-white mb-4" name="button">Join the Forum</button>
              <button type="button" class="btn btn-danger btn-block text-center text-white mb-4" name="button">Login</button>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="" placeholder="Enter your email"value="">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary btn-sm text-center text-white" name="button">Subscribe Now</button>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="card">
             <div class="card-header bg-primary text-light">
              <h2 class="lead">Categories</h2>
              </div>
              <div class="card-body">
                <?php 
                      $sql="SELECT * FROM cat order by id desc";
                      $stmt=$Connectingdb->query($sql);
                      while ($DataRows = $stmt->fetch()) {
                      $CategoryId = $DataRows["id"];
                     $CategoryName=$DataRows["title"];
                     $CategoryName=catpostexit($CategoryName);
                     if ($CategoryName!='0'){ ?>
              
                <a href="blog.php?category=<?php echo $CategoryName; ?>"> <span class="heading"> <?php echo $CategoryName; ?></span> </a><br>
               <?php }} ?>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-info text-white">
                <h2 class="lead"> Recent Posts</h2>
            </div>
            <div class="card-body">

              <?php 
                    $sql="SELECT * FROM post ORDER BY id desc  LIMIT 0,5 ";
                    $stmt=$Connectingdb->query($sql);
                    while ($DataRows = $stmt->fetch()){
                        $id = $DataRows['id'];
                        $title = $DataRows['title'];
                        $datetime = $DataRows['dateandtime'];
                        $image = $DataRows['image'];
                        $slug = $DataRows['slug'];

                    ?>

                    <div class="media">

                    <img src="uploads/<?php echo htmlentities($image); ?>" class="d-block img-fluid algin-self-start" width="90" height="94" alt=""> 
                    <div class="media-body ml-2">

                    <a style="text-decoration:none;" href="<?php echo htmlentities($slug); ?>" target="_blank"><h6 class="lead"><?php echo htmlentities($title);?> </h6></a>
                    <p class="small"><?php echo htmlentities($datetime);?></p>
                    </div>

                    </div>
                    <hr>
                    <?php } ?>
                    </div>
                    </div>
    </div>

      <!-- Side Area End -->


</div>
</div>

    <br>

    
    <!-- Foooter !-->
    <footer class="bg-dark text-white">
<div class="container">
    <div class="row">
        <div class="col-md-12">
    
    <p class="lead text-centre">Theme By| Ashish Sharma| <span id="year"></span> &copy; All right Reserved</p>
    
    </div>
        </div>
    
    </div>
</footer>
    
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body>
</html>