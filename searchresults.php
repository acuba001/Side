<?php 
include 'core/init.php'; 
include 'includes/overall/header.php';

$value_searching = $_POST['search'];
$empty = empty($value_searching);
$set = isset($value_searching);

if( $set && !$empty){
	$keyword = $_POST['search'];

	$search_sql = "SELECT * FROM pages WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
	$search_query = mysql_query($search_sql);
	
	
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
								<h3>Search Results for: "<?php echo $keyword; ?>"</h3>
								<br>
							</div>
							<div class="page-body" style = "margin-top:5px; ">
								<?php
									search_results($keyword);
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
	
	
	<?php 
	
	
	
	/* if(mysql_num_rows($search_query) != 0){
		$search_rs = mysql_fetch_assoc($search_query);
	}
	?>

	<p> search results</p>
	<?php if(mysql_num_rows($search_query)!=0){
		do{ ?>
	<p><?php echo $search_rs['name']; ?></p>

	<?php	}
	
	while($search_rs = mysql_fetch_assoc($search_query));

	}else {
		echo "No results found";
	} */
}

	include 'includes/overall/footer.php';
?>