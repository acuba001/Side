<?php
include 'core/init.php'; 
include 'includes/overall/header.php'; 
?>

<html>
<body>
	<div class = "row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header " style = "margin-top:5px; ">
						<h3> Suggestion Form </h3> </div>
						<form action = "feedbackBackend.php" method = "post" name= "feedback">
							<!-- <form class="form-horizontal"> -->
							<div class="form-group">
								
								<div class = "col-sm-10">
									<label for="inputfn3" class="col-sm-4 control-label">First Name</label>
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon3"> 
											<span class="glyphicon glyphicon-user" id="basic-addon3">
											</span>
										</span>
										<input type="text" class="form-control" id="inputfn3" placeholder="First Name" name="first_name"/>
									</div>
								</div>
							</div>

							<br>
							<br>
							<br>
							<div class="form-group">
								<div class = "col-sm-10">
									<label for="inputln4" class="col-sm-4 control-label">Last Name</label>
									<div class="input-group">   
										<span class="input-group-addon" id="basic-addon4"> 
											<span class="glyphicon glyphicon-user" id="basic-addon1">
											</span>
										</span>
										<input type="text" class="form-control" id="inputln4" placeholder="Last Name" name="last_name"/>

									</div>
								</div>
							</div>
							<br>
							<br>

							<div class="form-group">
								<div class = "col-sm-10">
									<label for="inputemail4" class="col-sm-4 control-label">Email</label>
									<div class="input-group">   
										<span class="input-group-addon" id="basic-addon1">@</span>
										<input type="text" class="form-control" id="inputemail4" placeholder="email" name="email"/>

									</div>
								</div>
							</div>

							<br>
							<br>


							<div class="form-group">
							<div class = "col-sm-10">
							<label for = "area">Message</label>
							<textarea class = "form-control"id = "area" rows = "3"></textarea>
						</div>

<!-- <p>First Name:
<input name ="first_name" type = "text" />
</p>  -->
<!-- 
<p>
Last Name:
<input name ="last_name" type = "text" />
</p>

<p>
Email:
<input name ="email" type = "text" />
</p>
-->
<!-- <p>
Message:
<textarea name = "message"></textarea>&nbsp;</p> -->
					<br>
					<br>
					<div class ="form-group">
						<div class = "col-sm-offeset-2 col-sm-10">
							<p> 
								<br>

								<input type = "submit" name = "submit" id = "submit" value = "Submit"/>
								<input type = "reset" name ="Reset" id = "reset" value = "Reset" />
							</p> 

						</div>	
						
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- eo-row -->     
</body>
</html>

<?php include 'includes/overall/footer.php';?>