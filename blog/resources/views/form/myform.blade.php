<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="get" action="/process">
	    Name: <input type="text" name="name"><br>
	    <?php echo csrf_field(); ?>
	    Email: <input type="text" name="email"><br>
	    <?php echo csrf_field(); ?>
	    Mobile: <input type="text" name="mobile"><br>
	    <?php echo csrf_field(); ?>
	    Roll: <input type="text" name="roll"><br>
	    <?php echo csrf_field(); ?>
		Status: <input type="text" name="status"><br>
		<?php echo csrf_field(); ?>
	    
    	<input type="submit" name="submit" value="send">
</form>
</body>
</html>