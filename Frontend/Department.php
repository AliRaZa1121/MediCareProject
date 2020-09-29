<?php include 'header.php'; 
?>

    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Depertment</h3>
                        <p><a href="index-2.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Depertment Dtails</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

include("dbconnection.php");

$query = $pdo->query("SELECT * from specialities");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>

    <!-- depertment start -->
    <section class="depertment-area">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="depertment-col">
                            <div class="depertment-list">
                                <?php
foreach ($rows as $row) {
    # code...

                                ?>
                                <a href="departmentdoctor.php?id=<?php echo $row['Id'] ?>"><i class="fa fa-medkit"></i><?php echo $row['Name']?></a>
                                
<?php }?>
                            </div>
                        </div>
                       
                    </div>

                    <div class="col-md-8">
                        <img src="img/depertment/1.jpg" alt="">
                        <h3 class="margin-top-30 margin-bottom-20"> <span class="color-defult">Medicative</span> Hospital</h3>
                        <p>Medicative <span class="color-defult">Hospital</span> adipisicing elit. Doloremque illum iure dolor dolore impedit adipisci, quibusdam dicta  facilis molestias libero, odit sint doloribus numquam aliquid quasi, suscipit eum iste praesentiu Quam ipsa rem blanditiis reiciendis veniam aperiam aspernatur iure error aut neque unde dicta open laboriosam, expedita, impedit, consequuntur placeat voluptates medicative molestias, deleniti officia maxime reprehenderit placeat fugit? Aut consectetur nemo vitae earum maxime magnam enim iure reiciendis totam necessitatibus corrupti a  velit laboriosam libero, commodi dicta recusandae.</p>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- depertment end -->

    <?php include 'footer.php'?>