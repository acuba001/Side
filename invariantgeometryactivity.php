<?php 
include 'includes/overall/header.php';
include 'core/init.php';

$msg = "";
?>

<html>

	<head>	
		<script type="text/javascript">
            <!--
                function toggle_visibility(id) {
                   var e = document.getElementById(id);
                   if(e.style.display == 'block')
                      e.style.display = 'none';
                   else
                      e.style.display = 'block';
                }
            //-->
        </script>

        <style type="text/css">

            #popupBoxOnePosition{
                top: 0; left: 0; position: fixed; width: 100%; height: 120%;
                background-color: rgba(0,0,0,0.7); display: none;
            }
            #popupBoxTwoPosition{
                top: 0; left: 0; position: fixed; width: 100%; height: 120%;
                background-color: rgba(0,0,0,0.7); display: none;
            }#popupBoxThreePosition{
                top: 0; left: 0; position: fixed; width: 100%; height: 120%;
                background-color: rgba(0,0,0,0.7); display: none;
            }
            .popupBoxWrapper{
                width: 550px; margin: 50px auto; text-align: left;
            }
            .popupBoxContent{
                background-color: #FFF; padding: 15px;
            }

        </style>
	</head>

	<body>
	<?php
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		/* $msg = strip_tags($msg);
		$msg = addslashes($msg); */
	
	?>
	
		<center><h2>Quiz Score: <?php echo $msg."%"?></h2></center>
	
	<?php
	}
	?>
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="page-header " style = "margin-top:5px; ">
							<h3> Invariant Geometry Activity </h3>
						</div>
						
						<div class="page-body" style = "margin-top:5px; ">
							<font size="4">
								Try to determine an invariant with the interactive figure. If you have trouble, try out some of the hints. 
								If you woulld like another challenge, try out our quiz for this section. (If you do not see the figure, 
								try refreshing the page. Chrome does not support this type of application)
							</font>
							<H4 ALIGN=CENTER>
								<SCRIPT LANGUAGE="JavaScript">
								<!--
								/*
									The following JavaScript code can detect whether the jar applet file is located in the same
									directory as this file and, if not, display an error. This error can be useful for helping 
									first-time JavaSketch authors troubleshoot a JavaSketch that is not working correctly. 
									However, if the default location or name of the jar file is altered by changing the 
									parameters in the <APPLET> tag, this JavaScript code will continue to look next to this 
									file for the jar file, which may result in an error message even though the JavaSketch
									is otherwise functioning correctly. Additionally, future browser updates may cause this code
									to display errors incorrectly.

									This code is completely optional--the entire contents of this <SCRIPT> tag can be deleted and
									the JavaSketch will continue to function normally.
								*/

								if( IsFileMissing( "./jsp5.jar"))
								{
									document.write("<p>This JavaSketch may be unusable because the applet file (jsp5.jar) appears to be missing from its proper location. (It should be located in the same directory as this web page on the web server.)</p>");
								}

								function IsFileMissing( iFileName)
								{
									var tFileIsMissing = false;
									var xmlhttp = null;
									/* If the user is viewing this page with an Opera or Chrome browser locally, we return false
										 as we cannot rely on the detection to work correctly and avoid showing the error altogether */
									if (window.location.protocol == "file:")
										if (window.opera || navigator.userAgent.indexOf("Chrome/") > -1)
											return false;
									if (window.ActiveXObject)
									{
										try
										{
											xmlhttp=new ActiveXObject("MSXML2.XMLHTTP.6.0");
										}
										catch(e)
										{
											try
											{
												xmlhttp=new ActiveXObject("MSXML2.XMLHTTP.3.0");
											}
											catch(e)
											{
												return false;
											}
										}
									}
									else if (window.XMLHttpRequest)
									{
										xmlhttp=new XMLHttpRequest();
									}
									if( xmlhttp != null)
									{
										try{
											xmlhttp.open("HEAD", iFileName += (iFileName.match(/\?/) == null ? "?" : "&") + (new Date()).getTime(), false);
											xmlhttp.send(null);
											tFileIsMissing = !((xmlhttp.status==200) || (xmlhttp.status == 0));
										}
										catch(er){
											tFileIsMissing = true;
										}
									}
									return tFileIsMissing;
								}
								//-->
								</SCRIPT>
								<APPLET CODE="GSP.class"  ARCHIVE="jsp5.jar" CODEBASE="." WIDTH=800 HEIGHT=700 ALIGN=CENTER><PARAM NAME=MinGrammarVersion VALUE=2>
								<PARAM NAME=MeasureInDegrees VALUE=1><PARAM NAME=DirectedAngles VALUE=0>
								<PARAM NAME=PixelsPerLengthUnit VALUE=37.7953>
								<PARAM NAME=BackRed VALUE=255>
								<PARAM NAME=BackGreen VALUE=255>
								<PARAM NAME=BackBlue VALUE=255>
								<PARAM NAME=Construction VALUE="
								{1} Point(236,565)[hidden];
								{2} Point(875,513)[hidden];
								{3} Line(2,1)[color(0,0,128),mediumLine,dashed];
								{4} Point(633,214)[hidden];
								{5} Parallel(3,4)[color(0,0,128),mediumLine,dashed];
								{6} Point on object(5,0)[label('C'),red,mediumPoint];
								{7} Point on object(3,0.5)[label('B'),red,mediumPoint];
								{8} Point on object(3,0.12)[label('A'),red,mediumPoint];
								{9} Segment(7,8)[color(0,0,128),mediumLine];
								{10} Segment(6,7)[color(0,0,128),mediumLine];
								{11} Segment(8,6)[color(0,0,128),mediumLine];
								{12} Polygon(8,7,6)[color(255,128,0)];
								{13} FixedText(50,164,'The two dashed lines are parallel')[size(24),black];
								{14} Area(12,500,605,'Area △ABC = ')[size(24),black];
								">
								Please install <a href="http://www.sun.com/getjava">Java</a> (version 1.4 or later) to use JavaSketchpad applets.</APPLET>
							</H4>
							
							<div id="popupBoxOnePosition">
								<div class="popupBoxWrapper">
									<div class="popupBoxContent">
										<h3>Hint 1</h3>
										<p>What happens when you move points A or B?</p>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">here</a> to close the popup box.</p> 
									</div>
								</div>
							</div>

							<div id="popupBoxTwoPosition">
								<div class="popupBoxWrapper">
									<div class="popupBoxContent">
										<h3>Hint 2</h3>
										<p>What do points A and B have in common when you move them?</p>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');">here</a> to close the popup box.</p>
									</div>
								</div>
							</div>

							<div id="popupBoxThreePosition">
								<div class="popupBoxWrapper">
									<div class="popupBoxContent">
										<h3>Hint 3</h3>
										<p>Can you say something special about point C in terms of what points A and B can do?</p>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxThreePosition');">here</a> to close the popup box.</p>
									</div>
								</div>
							</div>

							<div class = "row">
								<div class="col-md-8">
									<div id="wrapper">
										<h3> Hints: </h3>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">here</a> to see the first hint.</p>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');">here</a> to see the second hint.</p>
										<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxThreePosition');">here</a> to see the final hint.</p>

									</div><!-- wrapper end -->
								</div>
								
								<div class="col-md-4">
									<h3> Quiz: </h3>
									Click <a href="startActivity1Quiz.php">here</a> for a quiz related to this activity.
									<br>
									<h3> Rate Activity: </h3>
									<?php rate("invariantgeometryactivity"); ?>
								</div>
							</div>
						 </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php include 'includes/overall/footer.php';?>