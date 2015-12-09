<?php
include 'core/init.php'; 
include 'includes/overall/header.php'; 

//session_start();

?>
	
<div class="panel panel-default">
 <div class="panel-body">
  <div class="jumbotron">
 <h1><center>
  <?php

      $nameOfUser = $_SESSION["name"];
      if($nameOfUser)
      {
        echo "Welcome ".$nameOfUser." to DynaMath!";
      }
      else
      {
        echo "Welcome to DynaMath!";
      }
  ?>
  </center></h1>
  <center><p class="text-info">It is time to discover your passion for mathematics !!!</center></p>
  <center><p class="text-info">Dynamic Mathematics Principles is an application to learn mathematics
  by interacting with our activities fun-facts  and much more!  </center></p>
  <p><center><a class="btn btn-primary btn-lg" href="aboutUs.php" role="button">Learn more</a></center></p>
</div>
  </div>
</div>
<!--                                                               -->

<div class="row">
	<!-- left item -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="html5" class="img-responsive">
      <div class="caption">
        <h3>History</h3>
        <p>This section contains........</p>
        <p><a href="selectHistory.php" class="btn btn-primary" role="button">View details</a></p>
      </div>
    </div>
  </div>
  <!-- center item -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="img4" class="img-responsive" >
      <div class="caption">
        <h3>About Us</h3>
        <p>This section contains........</p>
        <p><a href="aboutUs.php" class="btn btn-primary" role="button" name = "Submit">View details</a></p>
      </div>
    </div>
  </div>
  <!-- right item -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="img6" class="img-responsive">
      <div class="caption">
        <h3>Activities</h3>
        <p>This section contains........</p>
        <p><a href="selectActivity.php" class="btn btn-primary" role="button">View details</a></p>
      </div>
    </div>
  </div>

</div> <!-- end of row -->

<div class="row">
	<!-- left item -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="img8" class="img-responsive">
      <div class="caption">
        <h3>Fun-Facts</h3>
        <p>This section contains........</p>
        <p><a href="selectFunFacts.php" class="btn btn-primary" role="button">View details</a></p>
      </div>
    </div>
  </div>

  	<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="img4" class="img-responsive" >
      <div class="caption">
        <h3>Suggestions</h3>
        <p>This section contains........</p>
        <p><a href="feedback.php" class="btn btn-primary" role="button">View details</a></p>
      </div>
    </div>
  </div>

  	<!-- right item -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="pics/mathlogo1.jpeg" alt="img8" class="img-responsive">
      <div class="caption">
        <h3>Survey</h3>
        <p>This section contains........</p>
        <p><a href="behaviorSurvey.php" class="btn btn-primary" role="button">View details</a></p>
      </div>
    </div>
  </div>
  

</div>
<!-- end of row -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>


<?php include 'includes/overall/footer.php'; ?>



