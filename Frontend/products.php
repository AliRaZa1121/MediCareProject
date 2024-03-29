<?php include 'header.php';

include("dbconnection.php");

if(isset($_GET['btnsearch'])){
    $query = $pdo->prepare("SELECT products.*,productcategories.Name as CateName from products
    JOIN productcategories on productcategories.id = products.CategoryId
    where Products.Name like :keyword");
    $k = "%" . $_GET['keyword'] . "%";
    $query->bindvalue("keyword",$k);
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);  
}

else{
$query = $pdo->query("SELECT products.*,productcategories.Name as CateName from products
JOIN productcategories on productcategories.id = products.CategoryId");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Shop</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-area">
        <div class="container">
            <div class="row">
                <div style="margin-left: 200px;" class="col-md-8">
                <div class="blog-search">
                                <form action="" method="GET" class="clearfix">
                                    <input name="keyword" type="search" placeholder="Search Here..">
                                    <button type="submit" value="Search"  name="btnsearch"><span class="pe-search"><i class="fa fa-search"></i></span></button>
                                </form>
                            </div>
                </div>
            </div>
            <hr>
            <hr>
            <hr>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="shop-right-area">
            
                        
                            <!--NAV PILL-->
                            <!-- <div class="shop-tab-pill">
                                <ul>
                                    <li class="active" id="p-mar">
                                        <a data-toggle="pill" href="#grid">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                            <span>Grid</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" href="#list">
                                            <i class="fa fa-th-list" aria-hidden="true"></i>
                                            <span>List</span>
                                        </a>
                                    </li>
                                    <li class="product-size-deatils">
                                        <div class="show-label">
                                            <label>Show : </label>
                                            <select>
                                                <option value="10" selected="selected">10</option>
                                                <option value="09">09</option>
                                                <option value="08">08</option>
                                                <option value="07">07</option>
                                                <option value="06">06</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-position">
                                            <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                                            <select>
                                                <option value="position" selected="selected">Position</option>
                                                <option value="Name">Name</option>
                                                <option value="Price">Price</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                            <!--NAV PILL-->
                            
                                
                                <?php
                  if (count($rows)>0) {
foreach ($rows as $row) {
                            ?>
                           
                            <div class="col-md-3 ">
                                        <div class="product-item">
                                            <div class="product-image">
                                                <a class="product-img" href="productdetails.php?id=<?php echo $row['Id'] ?>">
                                                    <img class="primary-img" height="260px" width="260px" src="../uploading/<?php echo $row['Photo'] ?>" alt="" />
                                                </a>
                                            </div>
                                            <!-- <span class="on-sale">
                                                <span class="sale-text">Sale</span>
                                            </span> -->
                                            <div class="product-action">
                                            <h4><a href="productdetails.php?id=<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></a></h4>
                                            <h4><a href="productdetails.php?id=<?php echo $row['Id'] ?>">(<?php echo $row['CateName'] ?>)</a></h4>
                                            <div class="mid-2">
                                                <span style="margin-left: 90px;" class="price">$ <?php echo $row['Price'] ?></span>
                                            </div>
                                             </div>
                                           
                                            </div>

                                
                                        </div>
                                
<?php

}
                  }
                  else{
                      echo "<h2 class='alert-danger' style='text-align: center'>No Records Found</h2>";
                  }
?>

                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'?>