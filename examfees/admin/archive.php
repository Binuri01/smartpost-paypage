<!DOCTYPE html>
<?php require 'deleteexam.php'?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	</head>
<body>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<a href="index.php" class="pull-right">Main Page</a>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Exam Name</th>
					<th>Date</th>
					<th>Fee</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
 
					$query = mysqli_query($connection, "SELECT * FROM `exams` where status=0") or die(mysqli_error($conn));
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['ename']?></td>
					<td><?php echo $fetch['duration']?></td>
					<!--<td><?php echo $fetch['date_archived']?></td>-->
					<td><?php echo $fetch['amount']?></td>
					<td hidden><?php echo $fetch['status']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>	
</html>



<tr>
