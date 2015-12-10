<?php
include 'core/init.php'; 
include 'includes/overall/header.php'; 


if(!isset($_SESSION['logged_in'])){
	header("location:login.php");
}
?>
<html>
	<body>
		<div class = "row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">

						<div class="page-header " style = "margin-top:5px; ">
							<div class= "wrapOverall">

								<div class = "header"><h2 class = "siteTitle">Dynamic Mathematics Survey</h2></div> <!-- END OF HEADER -->
								<div class = "wrapContent">
									<!-- <div class ="sideNav" >
									<ul>
									<li><a href = "#">Survey 1 </a></li>
									<li><a href = "#">Survey 2 </a></li>

									</ul>
									</div> <!-- END sideNav --> 

									<div class = "Content">
										<h2>Archimedes Questionaire</h2>
										<div class = "entry">
											<?php get_questions($_SESSION['user_id'], 3); ?>
										</div>
									</div>
								</div>
							</div>   <!-- END ENTRY -->
						</div> <!-- End content -->
					</div> <!-- End wrapContent -->
				</div> <!-- end wrapoverall -->
			</div>
		</div>
	</body>
</html>

<?php include 'includes/overall/footer.php';?>