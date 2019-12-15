<?php
// Initialize the session

require_once "config.php";
	session_start();
	$id =$_SESSION['id'];
	
	
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
if($data = $link->query("SELECT jdata FROM users WHERE id=$id")){
		echo "Record got successfully";
	}
while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
	//putting specific data in txt file
		file_put_contents('GeoJSON.js', ($row['jdata']));
	}
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="style.css"/>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src='https://code.jquery.com/jquery-1.11.0.min.js'></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js'></script>
		<link href='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css' rel='stylesheet' />
		<script src="https://snaptravelpop.000webhostapp.com/GeoJSON.js"/></script>
		<style>
			  body { margin:0; padding:0; }
			  #map { position:absolute; top:0; bottom:0; width:100%; }
			.popup {
			  text-align:center;
			  }
			.popup .slideshow .image        { display:none; }
			.popup .slideshow .image.active { display:block; }
			.popup .slideshow img {
			  width:100%;
			  }
			.popup .slideshow .caption {
			  background:#eee;
			  padding:10px;
			  }
		</style>
	</head>
	<body>
		<div class="container" > 
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

			<div class="top">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo"> <img src="https://snaptravelpop.000webhostapp.com/Logo3.PNG" alt="logo"/> </div>
					</div>
					<div class="col-sm-6">
						<br><br>
							<div class="searchBar">
							<!-- Search form -->
							<input class="form-control" type="text" placeholder="Search" aria-label="Search">
							</div>
					</div>
					<div class="col-sm-3">
					<br><br>
					<h4>This is <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>'s Profile!</h4>
					</div>	
				</div>
			</div>
		</nav>
			<div class="bottom2">
				<div class="col-xs-4 col-sm-3 col-lg-2">

				  <div id="sidebar">
					<ul class="nav">
					  <li>
						<a href="#">
						  <i class="zmdi zmdi-link"></i> Profile
						</a>
					  </li>
					  <br>
					  <li>
						<a href="upload.php">
						  <i class="zmdi zmdi-link"></i> Upload
						</a>
					  </li>
					  <br>
					  <li>
						<a href="#">
						  <i class="zmdi zmdi-link"></i> Friends
						</a>
					  </li>
					  <br>
					  <li>
						<a href="#">
						  <i class="zmdi zmdi-link"></i> Wishlist
						</a>
					  </li>
					  <br>
					  <li>
						<a href="#">
						  <i class="zmdi zmdi-linnk"></i> Checklist
						</a>
					  </li>
					  <br>
					  <li>
						<a href="logout.php">
						  <i class="zmdi zmdi-link"></i> Log Out
						</a>
					  </li>
					</ul>
				  </div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			<div class="col-xs-8 col-sm-9 col-lg-10">
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
				  
				</nav>
				
				<div id='map' style='width: 935px; height: 600px;'></div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoidGhpc2lzYXVzZXJuYW1lIiwiYSI6ImNrMHMzbjRhZDAyZnkzZHFteHN2aGFxZGQifQ.wfBa9G20zjzPvbNKBTfXEQ';
var map = L.mapbox.map('map')
  .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

var myLayer = L.mapbox.featureLayer().addTo(map);


// Add custom popup html to each marker.
myLayer.on('layeradd', function(e) {
    var marker = e.layer;
    var feature = marker.feature;
    var images = feature.properties.images
    var slideshowContent = '';

    for(var i = 0; i < images.length; i++) {
        var img = images[i];

        slideshowContent += '<div class="image' + (i === 0 ? ' active' : '') + '">' +
                              '<img src="' + img[0] + '" />' +
                              '<div class="caption">' + img[1] + '</div>' +
                            '</div>';
    }

    // Create custom popup content
    var popupContent =  '<div id="' + feature.properties.id + '" class="popup">' +
                            '<h2>' + feature.properties.title + '</h2>' +
                            '<div class="slideshow">' +
                                slideshowContent +
                            '</div>' 

                        '</div>';

    // http://leafletjs.com/reference.html#popup
    marker.bindPopup(popupContent,{
        closeButton: false,
        minWidth: 320
    });
});

// Add features to the map
myLayer.setGeoJSON(geoJson);



map.setView([40, -75], 6);
</script>
			</div>
			</div>
			</div>
	</body>
</html>
