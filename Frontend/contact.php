
<?php include 'header.php';

if(isset($_POST['send']))
{

    $query = $pdo->prepare("insert into contactus (Email,Name,Subject,Message) values(:name,:email,:subject,:message)");
    $query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
    $query->bindparam("email",$_POST['email'],PDO::PARAM_STR);
    $query->bindparam("subject",$_POST['subject'],PDO::PARAM_STR);
    $query->bindparam("message",$_POST['message'],PDO::PARAM_STR);
    $query->execute();


  }



?>

<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mini-title inner-style-2">
                    <h3>CONNECT WITH US</h3>
                    <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section>
        <div class="container padding-bottom-80">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title margin-left-20 ">
                            <h6>Contact</h6>
                            <h2>Get in Touch</h2>
                            <div class="small-line-border-2"></div>
                        </div>
                        <form class="form" method="post" action="">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email"  required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-textarea">

                                    <textarea class="form-control" rows="6" placeholder="Wright Message" id="message" name="message" required></textarea>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button class="btn btn-theme" type="submit" name="send" value="Submit Form">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
