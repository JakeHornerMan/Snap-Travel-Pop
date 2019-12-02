<?php
	$long = -6.3595;
	$lat = 53.2686;
	$info ='var geoJson = {
  type: "FeatureCollection",
  features: [{
      type: "Feature",
      "geometry": { "type": "Point", "coordinates": [-76.03, 38.90]},
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
  }, {
      type: "Feature",
      "geometry": { "type": "Point", "coordinates": [-74.00, 40.71]},
      "properties": {
          "title": "Offline Image",
          "marker-color": "#3c4e5a",
          "marker-symbol": "marker",
          "marker-size": "large",
          "images": [
            ["1234.jpg","This image is offline and is stored locally"],
          ]

      }
  }]
};';
	$json_data = json_encode($info);
	$json_data = trim($info,"''");
	file_put_contents('GeoJSON.json', $json_data);
	//'.$long.','.$lat.'
?>
<!DOCTYPE html>
<html>
<a href="index.html"><button>View Point<a href="view.html"></button></a>
</html>