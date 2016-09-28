<?php 
    require_once("../resources/config.php");
    include(TEMPLATE_FRONT.DS."header.php");
    
    if (isset($_SESSION['cartStatus']))
      echo "<h4 class='text-center bg-danger'>".$_SESSION['cartStatus']."</h4>";
?>
<div class="container">

    <div class="row">

      <h1>Checkout</h1>

<!--Form Needed for processing via paypal-->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <!-- Use your paypal sandbox seller-email-account here -->
  <input type="hidden" name="business" value="paypal_developer_account@gmail.com">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Image</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub Total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php get_items_checkout();?>
        </tbody>
    </table>
  <?php
    if($_SESSION['cart_items']!=0){
        show_paypal_button();
    }
  ?>
  



      <!--Cart Details-->
                  
      <div class="col-xs-4 pull-right ">
      <h2>Cart Totals</h2>

      <table class="table table-bordered" cellspacing="0">

      <tr class="cart-subtotal">
      <th>Items:</th>
      <td><span class="amount">
        <?php if(isset($_SESSION['cart_items'])){
            echo $_SESSION['cart_items'];
          } 
        ?>
        </span></td>
      </tr>
      <tr class="shipping">
      <th>Shipping and Handling</th>
      <td>Free Shipping</td>
      </tr>

      <tr class="order-total">
      <th>Order Total</th>
      <td><strong><span class="amount">
      <?php 

        if(isset($_SESSION['cart_cost'])){
          echo "&#36;".$_SESSION['cart_cost'];
          }
      ?>
        </span></strong> </td>
      </tr>


      </tbody>

      </table>

      </div><!--End of cart details-->


  </div><!--end of Main Content-->

</div>
<?php include(TEMPLATE_FRONT.DS."footer.php");?>