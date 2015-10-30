<?php

include 'core/connection.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>

		<div class="rex-main-content">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<!-- button -->
						<div class="rex-button">
							<!-- <button class="btn waves-effect red darken-1" type="submit" name="action">back</button> -->
							<!-- <button class="btn waves-effect red darken-1 rex-right-btn" type="submit" name="action">help</button> -->
							<a href="search.html" class="btn waves-effect red darken-1">back</a>
							<a href="help.html" class="btn waves-effect red darken-1 rex-right-btn">help</a>
						</div>
						<!-- main content -->
						<div class="rex-block">
						  <div class="card">
						    <div class="card-image waves-effect waves-block waves-light">
						      <i class="material-icons dp48">done</i>
						      <p>This is a valid number</p>
						      <div class="circle">
						      	<span></span>
						      	<span></span>
						      	<span></span>
						      </div>
						    </div>
						    <div class="card-content">
							  <div class="rex-content">
							  	<p><i class="material-icons dp48">business</i><span>Company Name:</span> <a href="#">Apprex.com</a></p>
							  	<p><i class="material-icons dp48">room</i><span>Address: </span> 43/R/13, Panthopoth, Dhaka.</p>
							  </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>



	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>