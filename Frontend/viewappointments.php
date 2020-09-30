<?php include 'header.php';

?>


    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Your Appointments </h3>
                        <p><a href="index-one.html">Appointment Details</a> <span class="fa fa-angle-right"></span> <a href="#">View Appointments </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SHOPING CART AREA START -->
    <section class="shoping-cart-area">
      <div class="container">
        <div class="row">
      
          <div class="col-md-12">
            <div class="product-list">
              <table>
                <thead>
                  <tr>
                    <th>Doctor Name</th>
                    <th>Doctor Specialty</th>
                    <th>Date</th>
                    <th>Day</th>
                  </tr>
                </thead>
                <tbody>

                    <?php
                    include 'dbconnection.php';
                    $query = $pdo->query("SELECT appointments.*,doctors.Name as DName,specialities.Name as SpecName from appointments
                                          JOIN doctors on doctors.id = appointments.doctorid
                                          JOIN specialities on specialities.id = doctors.SpecialityId
                                          where appointments.PatientId=". $_SESSION['id']);
                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                    ?>
                    <tr>
                    <td><?php echo $row['DName'] ?></td>
                    <td><?php echo $row['SpecName'] ?></td>
                    <td><?php echo $row['Date'] ?></td>
                    <td><?php echo $row['Day'] ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- SHOPING CART AREA END -->
    <hr>

<?php include 'footer.php'; ?>
