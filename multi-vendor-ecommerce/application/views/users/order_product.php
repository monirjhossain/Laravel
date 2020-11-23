
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card pl-4 pt-4 pr-4 pb-4">
          <div class="row">
            <div class="col-sm-12"><br>
              <table  class="table table-striped table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Total Amount</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach($prod_info as $key => $info)
                      {
                        ?>
                        <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $info->pname ?></td>
                          <td><?php echo $info->Price ?></td>
                          <td><?php echo $info->qty ?></td>
                          <td><?php echo $info->Price*$info->qty ?></td>
                          <td>
                            <a href="javascript:;" data-id="<?php echo $info->product_id ?>" class="btn btn-info btn-sm product_review"><i class="fa fa-star"></i></a>
                          </td>
                        </tr>
                        <?php 
                      }
                      ?> 
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Total Amount</th>
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
  <div class="modal" id="popup_review">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Product Review</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url().'index.php/users/product_review' ?>" class="database_operations">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input type="hidden" name="product_id" id="product_id">
              <select class="form-control" name="star">
                <option value="1">&#9733;</option>
                <option value="2">&#9733;&#9733;</option>
                <option value="3">&#9733;&#9733;&#9733;</option>
                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button class="btn btn-info">Review</button>
            </div>
          </div>
        </div>
       </form>
      </div>

    </div>
  </div>
</div>