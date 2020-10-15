<?php


include("dbconnection.php");

//Appointments
$query = $pdo->query("SELECT COUNT(appointments.Id) AS total_appointments FROM appointments
");
$allapp = $query->fetch(PDO::FETCH_ASSOC);

$query = $pdo->query("SELECT COUNT(*) as cnt FROM appointments where month(now()) = month(`Date`) and year(now()) = year(`Date`)");
$appmonthly = $query->fetch(PDO::FETCH_ASSOC);

//Earning
$query = $pdo->query("SELECT SUM(orders.Amount) AS total_earning FROM orders
");
$allearning = $query->fetch(PDO::FETCH_ASSOC);

$query = $pdo->query("SELECT SUM(orders.Amount) as thismonthearning FROM orders where month(now()) = month(`OrderDate`) and year(now()) = year(`OrderDate`)
");
$earningmonthly = $query->fetch(PDO::FETCH_ASSOC);

//Latest Customers
$query = $pdo->query("SELECT * FROM orders ORDER BY id DESC LIMIT 5
");
$latestorders = $query->fetchAll(PDO::FETCH_ASSOC);

//top products
$query = $pdo->query("SELECT products.Name, Products.Id, COUNT(orderdetails.ProductId) * orderdetails.Quantity topproduct FROM
products join orderdetails on orderdetails.ProductId = products.Id GROUP BY products.Name ORDER BY topproduct DESC LIMIT 5
");
$topprdocts = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->query("SELECT doctors.* , COUNT(appointments.DoctorId) topdoctor FROM doctors
join appointments on doctors.Id = appointments.DoctorId GROUP BY doctors.Name ORDER BY topdoctor DESC LIMIT 5
");
$topdoc = $query->fetchAll(PDO::FETCH_ASSOC);
?>



<?php
include 'header.php';
?>




<?php
//doctor top patient
$did = $_SESSION['id'];

$query = $pdo->prepare("SELECT appointments.*,patients.Name as PName, patients.Id as PId  from appointments JOIN patients on patients.id = appointments.patientid where appointments.DoctorId=:did AND appointments.Date = date(now())");

$query->bindParam("did",$did, PDO::PARAM_INT);
$query->execute();
$toppat = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare("SELECT COUNT(*) as cnt FROM appointments where month(now()) = month(`Date`) and year(now()) = year(`Date`) and appointments.DoctorId =:did
");
$query->bindParam("did",$did, PDO::PARAM_INT);
$query->execute();
$docmonthlyapp = $query->fetch(PDO::FETCH_ASSOC);


$query = $pdo->prepare("SELECT COUNT(*) as cnt FROM appointments where date(now()) = date(`Date`) and appointments.DoctorId =:did
");
$query->bindParam("did",$did, PDO::PARAM_INT);
$query->execute();
$doctodayapp = $query->fetch(PDO::FETCH_ASSOC);



?>


<?php if (isset($_SESSION['utid']) && $_SESSION['utid'] == 1) { ?>
  <div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Total Appointments</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $allapp['total_appointments']?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Appointments (This Month)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $appmonthly['cnt']?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Sales (Monthly)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $earningmonthly['thismonthearning']?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Sales (Annual)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $allearning['total_earning']?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


</div>

          <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Top 5 Doctors</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered"  width="100%" cellspacing="0">
      <thead>
        <tr>
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Contact</th>
      
        </tr>
      </thead>

<?php 
foreach ($topdoc as $row): ?>
<tbody>
    <tr>
      
      <td style="text-align: center; line-height: 80px;"><?php echo $row['Id'] ?></td>
      <td style="text-align: center; line-height: 80px;"><img src="uploading/<?php echo $row['Photo'] ?>" width="80px" height="80px" style="border-radius:100px" ></td>
      <td style="text-align: center; line-height: 80px;"><?php echo $row['Name'] ?></td>
      <td style="text-align: center; line-height: 80px;"><?php echo $row['Contact'] ?></td>
    </tr>
    </tbody>
  <?php endforeach;
  
  ?>


    </table>
  </div>
    </div>
  </div>
</div>


</div>

<div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">latest Customers</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>City</th>
                  
                    </tr>
                  </thead>
                  <?php
                  foreach ($latestorders as $row) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['CustomerName']?></td>
                      <td><?php echo $row['Email']?></td>
                      <td><?php echo $row['Phone']?></td>
                      <td><?php echo $row['City']?></td>      
                    </tr>
                    
                  </tbody>
                  <?php }
                  ?>
                </table>
              </div>
                
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Top Selling Products</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Product Name</th>
                     
                  
                    </tr>
                  </thead>

                  <?php
                  foreach ($topprdocts as $row) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['Id']?></td>
                      <td><?php echo $row['Name']?></td>
                      </tr>
                    
                  </tbody>
                  <?php }
                  ?> 
                </table>
              </div>
               
                </div>
              </div>
            </div>

          </div>
          <?php } else if(isset($_SESSION['utid']) && $_SESSION['utid'] == 2) { ?>
            
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

</head>
<script>
  $(document).ready(function() {
    $('table').DataTable();
} );
</script>

            <div class="row">
            <div class="col-xl-1 col-md-3 mb-2">
  
</div>


            <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Appointments (Today)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $doctodayapp['cnt']?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold" style=" color: #00b092; font-size: 14px;">Appointments (Monthly)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $docmonthlyapp['cnt'] ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
          <div class="row">
          <div class="col-xl-1 col-md-3 mb-2">
  
  </div>
<!-- Area Chart -->
<div class="col-xl-10 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 style="font-weight: bold; color: #00b092;">Today's Appointments </h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Patient Name</th>
                        <th>Day</th>
                        <th>Date</th>
                      </tr>
                    </thead>

                    <?php
if (count($toppat)>0) {

foreach ($toppat as $row): ?>

    <tr>
    <td><?php echo $row['PId'] ?></td>    
      <td><?php echo $row['PName'] ?></td>
      <td><?php echo $row['Day'] ?></td>
      <td><?php echo $row['Date'] ?></td>
    </tr>

  <?php endforeach; ?>

<?php }

else { ?>
  <tr>
    <th colspan="4" class="alert-danger text-center" >No Result Found</th>
  </tr>
<?php } ?>
    </table>
  </div>
      
    </div>
  </div>
</div>


</div>
            
            <?php } ?>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-outline-success" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Core plugin JavaScript-->
  <script src="Backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Backend/sjs/sb-admin-2.min.js"></script>

</body>

</html>
