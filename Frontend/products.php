<?php include 'header.php';

include("dbconnection.php");



$query = $pdo->query("SELECT products.*,productcategories.Name as CateName from products
  JOIN productcategories on productcategories.id = products.CategoryId");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

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
                <div class="col-md-3">
                    <div class="blog-sideber">
                        <div class="widget clearfix">
                            <div class="blog-search">
                                <form action="#" class="clearfix">
                                    <input type="search" placeholder="Search Here..">
                                    <button type="submit">
                                        <span class="pe-7s-search"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widget clearfix">
                            <div class="sideber-title">
                                <h4>Best PRODUCTS</h4>
                            </div>
                            <div class="product-item">
                                <a href="#"><img src="img/shop/b1.jpg" alt="" />
                                <span>$ 60 /<sub>Only</sub></span>
                                <p>SAVE UP TO 25% OFF</p>
                                </a>
                            </div>
                        </div>
                        <div class="widget clearfix">
                            <div class="sideber-title">
                                <h4>TOP SELLERS</h4>
                            </div>
                            <div class="shop-single-item">
                                <div class="shop-sell-item">
                                    <img alt="#" src="img/shop/1.jpg">
                                </div>
                                <div class="shop-sell-details">
                                    <h5><a href="#">Your Title Here</a></h5>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="shop-sell-item">
                                    <img alt="#" src="img/shop/2.jpg">
                                </div>
                                <div class="shop-sell-details">
                                    <h5><a href="#">Boys T-shirt</a></h5>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-md-9">
                    <div class="shop-right-area">
                        <div class="shop-banner">
                            <img src="img/shop/bg1.jpg" alt="" />
                        </div>
                        <div class="shop-tab-area">
                            <!--NAV PILL-->
                            <div class="shop-tab-pill">
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
                            </div>
                            <!--NAV PILL-->
                            <div class="tab-content">
                                <div class="row tab-pane active" id="grid">
                                
                                <?php

foreach ($rows as $row) {
?>
                                <div class="col-md-4 col-sm-4">
                                        <div class="product-item">
                                            <div class="product-image">
                                                <a class="product-img" href="#">
                                                    <img class="primary-img" src="../uploading/<?php echo $row['Photo'] ?>" alt="" />
                                                </a>
                                            </div>
                                            <!-- <span class="on-sale">
                                                <span class="sale-text">Sale</span>
                                            </span> -->
                                            <div class="product-action">
                                            <h4><a href="#"><?php echo $row['CateName'] ?></a></h4>
                                            <h4><a href="#"><?php echo $row['Name'] ?></a></h4>

                                                <span class="price">$ <?php echo $row['Price'] ?></span>
                                            </div>
                                           <!-- <div>
                                         <a class="" href="#">
                                                            <i class="fa fa-shopping-cart" style="" ></i>
                                                        </a>
                                             </div> -->

                                            <div class="pro-action">
                                                <ul>
                                                    <li>
                                                        <a class="" href="#">
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
<?php

}?>

                                </div>
                                <div id="list" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="shop-list-single shop-product-item-area">
                                                <div class="shop-list-left-content">
                                                    <a href="#"><img src="img/shop/s5.jpg" alt="" /></a>
                                                    <span class="shop-cart-icon">
                                                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                                                    </span>
                                                </div>
                                                <div class="shop-list-right-content">
                                                    <div class="product-content">
                                                        <h2><a href="#">Boy’s Cloths</a></h2>
                                                        <p><b>$ 65.00</b></p>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
                                                        <p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="shop-list-single shop-product-item-area">
                                                <div class="shop-list-left-content">
                                                    <a href="#"><img src="img/shop/s4.jpg" alt="" /></a>
                                                    <span class="shop-cart-icon">
                                                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                                                    </span>
                                                </div>
                                                <div class="shop-list-right-content">
                                                    <div class="product-content">
                                                        <h2><a href="#">Boy’s Cloths</a></h2>
                                                        <p><b>$ 65.00</b></p>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
                                                        <p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="shop-list-single shop-product-item-area">
                                                <div class="shop-list-left-content">
                                                    <a href="#"><img src="img/shop/s6.jpg" alt="" /></a>
                                                    <span class="shop-cart-icon">
                                                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                                                    </span>
                                                </div>
                                                <div class="shop-list-right-content">
                                                    <div class="product-content">
                                                        <h2><a href="#">Boy’s Cloths</a></h2>
                                                        <p><b>$ 65.00</b></p>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="product-details">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
                                                        <p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="shop-list-single shop-product-item-area">
                                                <div class="shop-list-left-content">
                                                    <a href="#"><img src="img/shop/s5.jpg" alt="" /></a>
                                                    <span class="shop-cart-icon">
                                                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                                                    </span>
                                                </div>
                                                <div class="shop-list-right-content">
                                                    <div class="product-content">
                                                        <h2><a href="#">Boy’s Cloths</a></h2>
                                                        <p><b>$ 65.00</b></p>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
                                                        <p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'?>