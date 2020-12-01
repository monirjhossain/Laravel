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
                            <th>Order No</th>
                            <th>Users</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    	foreach($all_orders as $key => $order) {
                    	$user_info=json_decode($order['user_info']);
                    	?>
                    	<tr>
                    		<td><?php echo $key+1; ?></td>
                    		<td>ORD0<?php echo $order['id'] ?></td>
                    		<td><?php echo $user_info->name ?></td>
                    		<td><?php echo $order['payment_mode']; ?></td>
                    		<td>
                    			<select class="form-control order_status" data-id="<?php echo $order['id'] ?>" name="order_status" >
                    				<option  <?php if($order['status']==0) { echo "selected"; } ?> value="0">Pending</option>
                    				<option <?php if($order['status']==1) { echo "selected"; } ?> value="1">In Process</option>
                    				<option <?php if($order['status']==2) { echo "selected"; } ?> value="2">Completed</option>
                    				<option <?php if($order['status']==3) { echo "selected"; } ?> value="3">Cancel</option>
                    			</select>
                    		</td>
                    		<td>
                                <?php if($order['status']!=2) { ?>
                    			<a href="<?php echo base_url().'index.php/orders/edit_order/'.$order['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <?php } ?>
                    		</td>
                    	</tr>
                    	<?php 
                    	}
                    	?>
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order No</th>
                            <th>Users</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
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