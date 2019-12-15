<?php
	//connect to database and session
	require_once "config.php";
	session_start();
	$id =$_SESSION['id'];
	
	//get jdata from database
	if($data = $link->query("SELECT jdata FROM users WHERE id=$id")){
		echo "Record got successfully";
	} else {
		echo "Error getting record: " . $link->error;
	}
	while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
	//putting specific data in txt file
		file_put_contents('GeoJSON.txt', ($row['jdata']));
	}
	$jdata=file_get_contents('GeoJSON.txt', true);
	$data=substr($jdata, 0,-3);
	
	//file_put_contents('GeoJSON.js', $jdata);
	
	//edit input info
	$lat_err ="USE +EAST AND -WEST";
	$long_err ="USE +NORTH AND -SOUTH";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty(trim($_POST["lat"]))){
			$lat_err = "Please enter value";
		} else{
			$lat = trim($_POST["lat"]);
			
		}
		if(empty(trim($_POST["long"]))){
			$long_err = "Please enter value";
		} else{
			$long = trim($_POST["long"]);
		}
	    if(!empty($lat && $long)){
	        $info = '{
	        type: "Feature",
		  "geometry": { "type": "Point", "coordinates": ['.$lat.', '.$long.']},
		  "properties": {
			  "title": "Online Image",
			  "marker-color": "#3c4e5a",
			  "marker-symbol": "marker",
			  "marker-size": "large",

			  // Store the image url and caption in an array.
			  "images": [
				["http://www.dumpaday.com/wp-content/uploads/2018/09/photos-21-3.jpg","This image is an online image"],

			  ]
		  }
	  },
	  ]};';
    	    $insert = $data.$info;

    	    file_put_contents('GeoJSON.js', $insert);
    	  
    	    $json_data = json_encode($insert);
    	    
	        if($data = $link->query("UPDATE users SET jdata= $json_data WHERE id =$id")){
		            echo "Record got successfully";
	        } else {
		        echo "Error getting record: " . $link->error;
	        }
    		
	    }
	}
	mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>json</title>
	<link rel="stylesheet"type="text/css" href="style.css">
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($lat_err)) ? 'has-error' : ''; ?>">
        <label>Latitude</label>
			<input type="text" name="lat" class="form-control">
			<span class="help-block"><?php echo $lat_err; ?></span>
		</div>    
		<div class="form-group <?php echo (!empty($long_err)) ? 'has-error' : ''; ?>">
			<label>Longitude</label>
			<input type="text" name="long" class="form-control">
			<span class="help-block"><?php echo $long_err; ?></span>
        </div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
	</form>
	<a href="profile.php"><h1>MAP</h1></a>
</body>