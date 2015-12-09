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
							<h3> Invariance in Geometry </h3>
						</div>
							<div class="thumbnail">
							  <img src="pics/image44.png" alt="html5" height="280" width="280">
							</div>
							<div class="page-body" style = "margin-top:5px; ">
								<p style='font-size:120%'>
									This page is dedicated to discussing invariance in Geometry, but first, let’s talk about the concept of 
									invariance in Mathematics. The basic notion of invariance in Mathematics is the observation that the set 
									of “transformations” or “changes” on a mathematical object may change other properties of the object but 
									more importantly may always keep a set of properties unchanged. Not clear enough? Don’t worry. We’ll show 
									you some examples. Anyways, this concept of invariance is the backbone to all of Mathematics known today 
									because this concept tends to simplify problems into one or many occurrences of these observations. It is 
									also very useful for building correct intuition and throwing out bad intuition.
									<br><br>
									…but enough of staring at the stars! Let’s get down to it! Let’s take a look at the following illustration:
									<br><br>
									<center><img src="pics/out1.gif" alt="html5" height="280" width="280"></center>
									<br><br>
									In the illustration, we have constructed two fixed parallel lines and a triangle with two fixed vertices 
									and one varying vertex. So, in other words, we are applying a “change” to the triangle in this scenario 
									that is described by moving that vertex wherever we want on that line. Now, if we take a look at the illustration, 
									we can notice that several other things are changing when we move that vertex. 
									<br><br>
									…the length of the two sides touching the vertex…the angles…perimeter…altitudes…medians…angle bisectors…
									<br><br>
									A lot of things are changing in this picture. But what isn’t changing??? Well, that third side isn’t changing. 
									Also, the altitude from the moving vertex may be changing, but the length of that altitude is not changing because 
									of how the two parallel lines were constructed. Given, those two things, we can also say that the area is also not 
									changing because there is an equation of the area of a triangle that only depend on these two lengths. This is the 
									essence of invariance. We apply a “transformation” and observe what properties may not change through this “transformation”.
									<br><br>
									The previous example was an example of using invariance to build intuition about a certain scenario. However, we will 
									now show an example of how it may unveil bad intuition. Let us observe how the following polygon is manipulated:
									<br><br>
									<center><img src="pics/out2.gif" alt="html5" height="280" width="280"></center>
									<br><br>
									It looks like we’re approximating the triangle that is half of the square we started with. Notice that at any step the perimeter of the polygon remains the same. If we assume that we are dealing with a unit square, the perimeter will always be 4. This tells us that the perimeter of the tringle should not be approximated in this fashion because perimeter is invariant over this “transformation”.
								</p>
							 </div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</body>
</html>
<?php include 'includes/overall/footer.php';?>