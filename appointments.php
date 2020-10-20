<?php

include("dbconnection.php");
include("header.php");


if (isset($_SESSION['utid']) && $_SESSION['utid'] == 1) {
$query = $pdo->query("SELECT appointments.*,patients.Name as PName,patients.Id as Pid,doctors.Name as DName,specialities.Name as SpecName from
appointments JOIN doctors on doctors.id = appointments.doctorid JOIN patients on patients.id = appointments.patientid
JOIN specialities on specialities.id = doctors.SpecialityId 
ORDER BY `appointments`.`Id` DESC");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
}

else if (isset($_SESSION['utid']) && $_SESSION['utid'] == 2){
  $query = $pdo->query("SELECT appointments.*,patients.Name as PName,patients.Id as PId,doctors.Id as DId,doctors.Name as DName,specialities.Name as SpecName from appointments
                        JOIN doctors on doctors.id = appointments.doctorid
                        JOIN patients on patients.id = appointments.patientid
                        JOIN specialities on specialities.id = doctors.SpecialityId  where appointments.DoctorId=". $_SESSION['id']);
  $rows = $query->fetchAll(PDO::FETCH_ASSOC);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments</title>
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<style>
.form-control-sm {
    height: calc(1.5em + .5rem + 2px);
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
    margin-right:20px;
    
}
.custom-select-sm {
    height: calc(1.5em + .5rem + 2px);
    padding-top: .25rem;
    padding-bottom: .25rem;
    padding-left: .5rem;
    font-size: .875rem;
    margin-left:5px;

}

div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    margin-left:25px;
    white-space: nowrap;
}

div.dataTables_wrapper div.dataTables_length select {
    width: 60px;
    display: inline-block;
}


.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #00b092;
    border-color: #00B090;
}



</style>


</head>
<script>
  $(document).ready(function() {
    $('table').DataTable();
} );
</script>




        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <form class="form" method="post">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 style="font-weight: bold; color: #00b092;">Patients Appointments</h6>
              </div>
              <hr>

            <div class="card shadow mb-4">

                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                    <?php if($_SESSION['utid'] == 1){ ?>
                    <thead>
                      <tr>
                        <th>Patient Id</th>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Doctor Speciality</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                  <?php } else if($_SESSION['utid'] == 2){ ?>
                    <thead>
                      <tr>
                      <th>Id</th>
                      <th>Patient Name</th>
                        <th>Day</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                  <?php } ?>


                    <tbody>
<?php
if (count($rows)>0) {

foreach ($rows as $row): ?>

  <?php if($_SESSION['utid'] == 1){ ?>
    <tr>
    <td><?php echo $row['Pid'] ?></td> 
      <td><?php echo $row['PName'] ?></td>
      <td><?php echo $row['DName'] ?></td>
      <td><?php echo $row['SpecName'] ?></td>
      <td><?php echo $row['Date'] ?></td>
      <td><?php echo $row['Day'] ?></td>
      <td>
      <a href="deleteappointment.php?aid=<?php echo $row['Id'] ?>" onclick="return confirm('Are you sure to delete Record?');" class="btn btn-danger">Delete</a>
      </td>
    </tr>
  <?php } else if($_SESSION['utid'] == 2){ ?>
    <tr>
    <td><?php echo $row['PId'] ?></td>    
      <td><?php echo $row['PName'] ?></td>
      <td><?php echo $row['Day'] ?></td>
      <td><?php echo $row['Date'] ?></td>
    </tr>
  <?php } ?>

  <?php endforeach; ?>

<?php }

else { ?>
  <tr>
    <th colspan="4" class="alert-danger text-center" >No Result Found</th>
  </tr>
<?php } ?>

                    </tbody>
                  </table>

              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
