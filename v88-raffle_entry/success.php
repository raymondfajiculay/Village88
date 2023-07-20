<?php
    session_start();
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Raffle</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  	</head>
  	<body>
		<div class="container">
			<p class="text-success bg-success text-light text-center mt-5 p-4">
				Success! Contact number <?= $_SESSION['phone']?> is now added.
			</p>
			<table class="table table-primary text-center mt-5">
				<thead class="table-dark">
					<tr>
						<th>Number</th>
						<th>Created At</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($_SESSION['all-data'] as $data): ?>
					<tr>
						<td><?php echo $data['contact_num']; ?></td>
						<td><?php echo $data['created_at']; ?></td>
					</tr>
<?php endforeach; ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary d-flex justify-content-center">Back</a>
		</div>
	</body>
</html>