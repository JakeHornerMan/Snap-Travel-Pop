<?php file_put_contents("GeoJSON.js", ""); ?>
<?php require_once "login.php";?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<title>SnapTravelPop</title>
		<link rel="stylesheet" href="style.css"/>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
	</head>
	<body>
		<div class="container" > 
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<div class="top">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo"> <img src="https://snaptravelpop.000webhostapp.com/Logo3.PNG" alt="logo"/> </div>
					</div>
					<div class="col-sm-8">
						<div class="topN">
							<div class="login">
								<h2>Sign In:</h2>
								<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
									<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
										<label for="username">Username:</label>
										<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
										<span class="help-block"><?php echo $username_err; ?></span>
									</div>
									<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									<span class="help-block"><?php echo $password_err; ?></span>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Login">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
			<div class="bottom">
				<div class="row">
					<div class="col-sm-6">
					<div class="bottomLeft">
						<br>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>		
				<div id='map' style='width: 500px; height: 400px;'></div>
				<script>
				mapboxgl.accessToken = 'pk.eyJ1IjoiamFrZWhvcm5lcm1hbiIsImEiOiJjazByNWVxN2gwMms4M21ueGY2MG42enplIn0.QtZyXJlE7BmXw6Jjz09ieA';
				var map = new mapboxgl.Map({
				container: 'map',
				style: 'mapbox://styles/mapbox/streets-v11'
				});
				</script>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="bottomRight">
						<br><br><br>
						<div class="text-center">
							<h1>Don't have an account? </h1>
							<a href="createaccount.php"><h3>Click here to create one!</h3></a>
							<br></br>
							<h4>What is SnapTravelPop?</h4>
							<p> SnapTravelPop provides a unique way to document, view and share your travels. As you travel you can upload the phtotgraphs you take. Our website will then place them on our interactive map at the coordinates the picture was taken. This creates your own customised map filled with your photographs from your travels. You can add your friends and share your travels with them too! See somewhere your friend has been that looks fantastic? Add it to your wishlist! We also have a checklist that will tick off all the country's you took pictures in. A perfect site for travel enthusiasts!
							</p>

						</div>
					</div>
				</div>
				</div>	
			</div>
			</div>
	</body>
</html>