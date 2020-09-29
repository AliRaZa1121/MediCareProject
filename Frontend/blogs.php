<?php include 'header.php'; 
?>

    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Blog / News</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Blog</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- Blog Posts -->
      <div class="blog-inner-section bg-f8">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    
               <?php
               $query = $pdo->query("SELECT * FROM `news` ORDER BY `news`.`PublishedOn` DESC");
               $rows = $query->fetchAll(PDO::FETCH_ASSOC);
               foreach ($rows as $row) {?>
               
                <div class="blog-item style-1 margin-bottom-30">
                        <div class="blog-img"><a href="#"><img src="../uploading/<?php echo $row['NewsCover'] ?>" alt=""></a>
                            <!-- <div class="blog-event-date">
                                 <h3>11 <small>Jun</small></h3> >
                            </div> -->
                        </div>
                        <div class="blog-content w100">
                                <div class="blog-date margin-bottom-20">
                                    <i class="fa fa-user-o"></i> <a href="#">Author:  <?php echo $row['Author'] ?></a> | <i class="fa fa-calendar"></i> <a href="#">Published On :  <?php echo $row['PublishedOn'] ?> </a> 
                                </div>
                            <a href="#"><h4><?php echo $row['Title'] ?></h4></a>
                            <p><?php echo $row['ShortDiscription'] ?>.</p>
                            <a href="blogdetails.php?blogid=<?php echo $row['Id'] ?>" class="btn btn-simple hvr-bounce-to-top">Read More</a>
                        </div>
                    </div>
<?php
               }
               ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Posts -->

<?php include 'footer.php'; ?>
