<?php

include("dbconnection.php");

  //Delete Query
  $query = $pdo->prepare("delete from contactus where Id = :id");
  $query->bindparam("id",$_GET['id'],PDO::PARAM_INT); 
  $query->execute();

//Select-Fetch Data
$query = $pdo->query("SELECT * from contactus");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("header.php"); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <form class="form" action="" method="post">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
              </div>

                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>

                      </tr>
                    </thead>

                    <tbody>
<?php
if (count($rows)>0) {

foreach ($rows as $row): ?>

    <tr>
      <td><?php echo $row['Name'] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td><?php echo $row['Subject'] ?></td>
      <td><?php echo $row['Message'] ?></td>
      
      <td>
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['Id'] ?>">Delete</a>
        <!-- Modal Start -->
          <div class="modal fade" id="myModal<?php echo $row['Id'] ?>">
                           <div class="modal-dialog">
                             <div class="modal-content">

                               <!-- Modal Header -->
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                               </div>

                               <!-- Modal body -->

                               <!-- Modal body -->
                                      <div class="modal-body">
                                       <p>Are you sure you want to delete this brand?</p>
                                      </div>

                               <!-- Modal footer -->
                               <div class="modal-footer">
                                   <a href="contact.php?id=<?php echo $row['Id'] ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger" >Delete</a>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                               </div>

                             </div>
                           </div>
                         </div>
        <!-- Modal End -->
      </td>
    </tr>

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

<?php include("footer.php"); ?>
