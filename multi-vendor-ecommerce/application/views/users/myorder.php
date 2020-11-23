
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
                            <th>Order Date</th>
                            <th>Order Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach($order as $key => $ord)
                      {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td>ORD0<?php echo $ord['id'] ?></td>
                          <td><?php echo date('d M,Y',strtotime($ord['created_at'])); ?></td>
                          <td><?php
                          $price=0;
                          foreach(json_decode($ord['product_info']) as $pi)
                          {
                            $qtot=$pi->qty*$pi->Price;
                            $price=$price+$qtot;
                          }
                          echo $price;
                          ?></td>
                          <td><?php  
                          if($ord['status']==0)
                            echo 'Pending';
                          else if($ord['status']==1)
                            echo "In Process";
                          else if($ord['status']==2)
                            echo "Completed";
                          else if($ord['status']==3)
                            echo "Cancel";
                          ?></td>
                          <td><a href="<?php echo base_url().'index.php/users/order_product/'.$ord['id'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <?php 
                      }
                      ?>
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order No</th>
                            <th>Order Date</th>
                            <th>Order Amount</th>
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