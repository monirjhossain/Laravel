    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card pl-4 pt-4 pr-4 pb-4">
        <form action="<?php echo base_url().'index.php/users/add_new_product/' ?>" class="database_operations">
          <div class="row">
            <div class="col-sm-12">
            	<div class="form-group">
            		<label>Enter Product Title</label>
            		<input type="text" name="name" placeholder="Enter Name" class="form-control">
            	</div>
            </div>
            <div class="col-sm-12">
            	<div class="form-group">
            		<label>Enter Description</label>
            		<textarea name="description" class="form-control"></textarea>
            	</div>
            </div>
            <div class="col-sm-3">
            	<div class="form-group">
            		<label>Enter Qty</label>
            		<input type="number" name="qty" class="form-control" placeholder="Enter Qty">
            	</div>
            </div>
            <div class="col-sm-3">
            	<div class="form-group">
            		<label>Enter Price</label>
            		<input type="text" name="Price" class="form-control" placeholder="Enter Price">
            	</div>
            </div>
            <div class="col-sm-3">
            	<div class="form-group">
            		<label>Select Image</label>
            		<input type="file" name="image" class="form-control">
            	</div>
            </div>
            <div class="col-sm-3">
            	<div class="form-group">
            		<label>Enter Brand</label>
            		<select class="form-control" name="brand">
            			<option value="">Select Barnd</option>
            			<?php 
            			foreach($brands  as $b1)
            			{
            				?><option value="<?php echo $b1['id'] ?>"><?php echo $b1['brand_name'] ?></option><?php 
            			}
            			?>
            		</select>
            	</div>
            </div>
            <div class="col-sm-6">
            	<div class="form-group">
            		<label>Select Category</label>
            		<select class="form-control" name="category" id="product_category">
            			<option value="">Select Category</option>
            			<?php 
            			foreach($category  as $c1)
            			{
            				?><option value="<?php echo $c1['name'] ?>"><?php echo $c1['name'] ?></option><?php 
            			}
            			?>
            		</select>
            	</div>
            </div>
            <div class="col-sm-6">
            	<div class="form-group">
            		<label>Select Sub Category</label>
            		<select class="form-control" id="sub_cat" name="subcategory">
            			<option value="">Select Sub Category</option>

            		</select>
            	</div>
            </div>
            <div class="col-sm-12">
            	<div class="form-group">
            		<button class="btn btn-info">Add</button>
            	</div>
            </div>
          </div>
          </form>

        </div>
         
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->