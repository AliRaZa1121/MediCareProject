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
      <td><a href="contact.php?id=<?php echo $row['Id'] ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger" >Delete</a>
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
