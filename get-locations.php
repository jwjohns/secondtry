<!DOCTYPE html>
<html>
  <head>
    <title>Synchronous Loading</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <?php $csv = array_map('str_getcsv', file('mock_data.csv')); 
      var_dump($csv);
    ?>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>

    // var map = new google.maps.Map(document.getElementById('map'), {
    //   center: {lat: 33.7550, lng: 84.3900},
    //   zoom: 8
    // });

    </script>
  </body>
</html>