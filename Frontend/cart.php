<?php
include 'header.php'; 

include("dbconnection.php");
?>
    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Shop </h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
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
                    <th>Remove</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="#"><i class="fa fa-trash-o"></i></a>
                    </td>
                    <td class="product-image">
                      <a href="#"><img alt="#" src="img/shop/s5.jpg"></a>
                    </td>
                    <td>
                      <h4><a href="#">Men T-shirt</a></h4>
                    </td>
                    <td>
                      <p>$ 100</p>
                    </td>
                    <td>
                      <input class="text-center" type="number" value="1">
                    </td>
                    <td>
                      <p>$ 100</p>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <!-- <a href="#" class="btn-theme">Continue Shopping</a> -->
          </div>
          <div class="col-md-6 text-right">
            <ul class="list-inline">
              <li><a href="checkout.php" class="btn-theme">Go to Checkout</a></li>
              <li><a href="#" class="btn-theme">Cler Shopping Cart</a></li>
            </ul>
          </div>
        </div>  
      </div>
    </section>
    <!-- SHOPING CART AREA END -->
    <?php include 'footer.php'?>