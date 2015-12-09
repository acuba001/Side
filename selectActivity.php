<?php
include 'core/init.php'; 
include 'includes/overall/header.php';

?>

<html>
	<body>
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="page-header " style = "margin-top:5px; ">
							<h3> Activities: </h3>
							<br>
						</div>
						<div class="page-body" style = "margin-top:5px; ">
							<?php
								get_activities();
							?>
							<br>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php include 'includes/overall/footer.php';?>