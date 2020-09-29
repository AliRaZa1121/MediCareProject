<?php include 'header.php'; 
?>
<?php
$query = $pdo->prepare("Select * from News where id =".$_GET['blogid']);
$query->execute();
                  
$row = $query->fetch(PDO::FETCH_ASSOC);


?>
    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Blog</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Blog</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <div class="bg-f8">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="margin-bottom-30">
                        <img class="img-responsive" src="../uploading/<?php echo $row['NewsCover'] ?>" alt="">
                        <div class="blog-post">
                            <ul class="list-inline blog-info">
                                <li>By <a href="#"><?php echo $row['Author'] ?></a></li>
                                <li>In <a href="#">Design</a></li>
                                <li>Posted <?php echo $row['PublishedOn'] ?></li>
                            </ul>
                            <h3><a href="#"><?php echo $row['Title'] ?></a></h3>
                            <p style=" color: #666; font-weight: bold;"><?php echo $row['ShortDiscription'] ?></p>
                            <p><?php echo $row['Content'] ?></p>
                            </div>
                    </div>

  
            </div>
        </div>
    </div>
    </div>
    <!-- End Blog Posts -->

    <?php include 'footer.php'; ?>