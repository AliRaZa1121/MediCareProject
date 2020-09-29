<?php
include 'header.php';

include("dbconnection.php");

$query = $pdo->query("SELECT patients.*,users.email as PEmail from patients JOIN users on users.id = patients.id where patients.Id=". $_SESSION['id']);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <?php foreach ($rows as $row): ?>

            <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <div class="panel panel-info panel-border">
                                <div class="panel-heading panel-bg">PROFILE DETAILS</div>
                                    <div class="panel-body">
                                      <form class="" action="index.html" method="post">
                                        <div class="form-group">
                                            <div class="col-md-12"><strong>Name:</strong></div>
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control" value="<?php echo $row['Name'] ?>" disabled />
                                            </div>
                                        </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Email:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="email" name="email" class="form-control" value="<?php echo $row['PEmail'] ?>" disabled />
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Contact:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="text" name="contact" class="form-control" value="<?php echo $row['Contact'] ?>" disabled />
                                              </div>
                                          </div>
                                      </form>


                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
            </div>

            <?php endforeach; ?>

            <div class="col-md-2"></div>
       </div>
    </div>
</section>

<?php include 'footer.php'; ?>
