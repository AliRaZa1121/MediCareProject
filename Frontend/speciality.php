<?php
$spid = $_GET['id'];
$query = $pdo->query("SELECT doctors.*,specialities.name as SpecName, cities.name as CityName  from doctors
                                        JOIN specialities on specialities.id = doctors.SpecialityId
                                        Join cities on specialities.id = doctors.SpecialityId
                                        where specialities.id =:id
                                        ");
                                        $query->bindparm("id",$spid, PDO::FETCH_ASSOC);
                  $rows = $query->fetchAll(PDO::FETCH_ASSOC);


?>


<div id="doctorsgird" class="section-content">
                <div class="row">

                  <div class="col-md-4">
                    <div class="team-item-2">
                        <img style="height: 300px; width: 400px;" src="../uplo" alt="">
                        <div class="team-contact">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h4><a href="#">nsakljn</a></h4>
                            <h6>njksnad</h6>
                            <h6>nksljadnkla</h6>
                        </div>
                        <div class="timetable">
                            
                            <a href="doctordetails.php?iid=" class="btn-theme text-center btn-block"> Request A​n Appointment​​​</a>
                        </div>
                    </div>
                  </div>
  <div class="col-md-12">
    <h1  class="alert-danger text-center" >No Doctor found</h1>
  </div>


                </div>
            </div>
