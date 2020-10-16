
<?php
include 'dbconnection.php';

$query = $pdo->prepare("delete from orderdetails where OrderId = :id");
$query->bindparam("id",$_GET['id'],PDO::PARAM_INT); 
$query->execute();

$query = $pdo->prepare("delete from orders where Id = :id");
$query->bindparam("id",$_GET['id'],PDO::PARAM_INT); 
$query->execute();




$query = $pdo->query("Select * from orders");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>






<?php
include 'header.php';
?>

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
          <form class="form" action="" method="post">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 style="font-weight: bold; color: #00b092;">Customers</h6>
              </div>

            <div class="card shadow mb-4">
              
<hr>
                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>CustomerName</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Order Date</th>
                        <th>Total Ammount</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
<?php
if (count($rows)>0) {

foreach ($rows as $row): ?>

    <tr>
      
    <td><?php echo $row['Id'] ?></td>
      <td><?php echo $row['CustomerName'] ?></td>
      <td><?php echo $row['City'] ?></td>
      <td><?php echo $row['Address'] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td><?php echo $row['Phone'] ?></td>
      <td><?php echo $row['OrderDate'] ?></td>
      <td><?php echo $row['Amount'] ?></td>
      <td style="text-align: center;">
        <a href="customershoppinglist.php?id=<?php echo $row['Id'] ?>" class="btn btn-info">Customer Shopping list</a>
        <a href="orders.php?id=<?php echo $row['Id'] ?>" onclick="return confirm('Are you sure to delete Order?');" class="btn btn-danger">Delete</a>
      </td>
    </tr>

  <?php endforeach; ?>

<?php }

else { ?>
  <tr>
    <th colspan="12" class="alert-danger text-center" >No Result Found</th>
  </tr>
<?php } ?>

                    </tbody>
                  </table>

              </div>
            </div>

        </div>

  
        <!-- /.container-fluid -->
        
        



        </div>
      <!-- End of Main Content -->

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
