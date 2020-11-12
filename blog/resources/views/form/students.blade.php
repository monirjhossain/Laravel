<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<table class="table table-bordered">
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
			</tr>
			<?php foreach ($students as $student) {?>
				<tr>
					<th><?php echo $student->id; ?></th>
					<th><?php echo $student->name; ?></th>
					<th><?php echo $student->email; ?></th>
				</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>