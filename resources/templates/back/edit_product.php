<div class="col-md-12">
    <?php admin_edit_products(); 
                ?>
        <div class="row">
            <h1 class="page-header">
               Editing <?php 
                $query=query("SELECT * from `products` WHERE `product_id`='".$_GET['pid']."'");
                confirm($query);
                while($res=fetch_array($query)):
                    echo $res['product_title'];
                
               ?>
                
            </h1>
        </div>

        <form action="" method="post" enctype="multipart/form-data">


            <div class="col-md-8">

                <div class="form-group">
                    <label for="product-title">Product Title </label>
                    <input type="text" name="product_title" class="form-control" value="<?php echo $res['product_title']?>">
                   
                </div>


                <div class="form-group">
                       <label for="product-title">Product Description</label>
                  <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $res['product_description']?></textarea>
                </div>

                <div class="form-group">
                       <label for="product-title">Product Short Description</label>
                  <textarea name="product_description_short" id="" cols="30" rows="3" class="form-control"><?php echo $res['product_description_short']?></textarea>
                </div>

                <div class="form-group row">

                  <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $res['product_price']?>">
                  </div>
                </div>
            </div><!--Main Content-->


        <!-- SIDEBAR-->


          <aside id="admin_sidebar" class="col-md-4">

             
             <div class="form-group">
               <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                <input type="submit" name="edit" class="btn btn-primary btn-lg" value="Edit">
             </div>


             <!-- Product Categories-->

             <div class="form-group">
                 <label>Product Category</label>
                <select name="product_category" id="" class="form-control">
                    <option value="<?php echo $res['product_category_id']; ?>"><?php echo show_category_name($res['product_category_id']); ?></option>
                    <?php admin_add_products_categories(); ?>
                </select>


             </div>

             <!-- Product Quantity-->

             <div class="form-group">
                 <label for="product_quantity">Product Quantity</label>
                    <input type="number" name="product_quantity" class="form-control" value="<?php echo $res['product_quantity']?>">
             </div>
            

            <!-- Product Image -->
            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="file"><br/>
                <img width="300" src="<?php echo "../../resources/uploads/".$res['product_image']?>">
            </div>

          </aside><!--SIDEBAR-->
        </form>
    <?php endwhile; ?>
</div>
<!-- /.col-md-12 -->

       