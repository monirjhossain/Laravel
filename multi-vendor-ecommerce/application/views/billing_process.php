<form action="<?php echo base_url().'index.php/home/process_to_pay' ?>" method="post">
<div class="row">
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Enter Name</label>
					<input type=" text" name="name" required="required" placeholder="Enter Name" class="form-control">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Enter E-Mail</label>
					<input type="email" name="email" required="required" placeholder="Enter E-Mail" class="form-control">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Enter Mobile No</label>
					<input type="text" name="mobile_no" required="required" placeholder="Enter Mobile No" class="form-control">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" required="required" name="address"></textarea>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Country</label>
					<select required="required" class="form-control" required="required" name="country" id="country">
						<option value="">Select</option>
						<option value="1">India</option>
						<option value="2">USA</option>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>State</label>
					<select required="required" class="form-control" name="state" id="state">
						<option value="">Select</option>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>City</label>
					<select required="required" class="form-control" name="city" id="city">
						<option value="">Select</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product_info">
			<?php 
			$Total=0;
			foreach($cart_product as $cart)
			{
			?>
			<div  class="row">
				<div class="col-sm-10">
					<p><?php echo $cart['pname'] ?></p>	
				</div>
				<div class="col-sm-2"><p><?php echo $cart['Price']*$cart['qty'] ?></p></div>
				<?php $Total=$Total+$cart['Price']*$cart['qty'] ?>
			</div>
			<?php 
			}
			?> 
			<hr>
			<div  class="row">
				<div class="col-sm-10">
					<p>Total</p>	
				</div>
				<div class="col-sm-2"><p><?php echo $Total; ?></p></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<button class="btn btn-info pull-right mb-4">Continue</button>
	</div>
</div>
</form>