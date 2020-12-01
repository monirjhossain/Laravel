
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card pl-4 pt-4 pr-4 pb-4">
          <div class="row">
            <div class="col-sm-12">
              <a href="<?php echo base_url().'index.php/users/add_new_product/' ?>" class="btn btn-info btn-sm float-right">Add New</a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12"><br>
              <table  class="table table-striped table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php 
                     foreach($all_products as $key => $prod)
                     {
                      ?>
                      <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><img src="<?php echo base_url().'uploads/product_image/'.$prod['image'] ?>" width="100px" height="100px"></td>
                        <td><?php echo $prod['name'] ?></td>
                        <td><?php echo $prod['Price'] ?></td>
                        <td><?php echo $prod['qty'] ?></td>
                        <td><input type="checkbox" <?php if($prod['status']=='1') { echo "checked"; } ?> name="status" class="product_status" data-id="<?php echo $prod['id']; ?>" value="1"></td>
                        <td>
                          <a href="<?php echo base_url('index.php/users/edit_product/'.$prod['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="<?php echo base_url().'index.php/users/delete_product/'.$prod['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php 
                     }
                     ?>
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
          </div>
        </div>
         
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->