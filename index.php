<html> 
	<head>
		<!-- set base viewport -->
		<meta name="viewport" content="initial-scale=1.0">
	    <meta charset="utf-8">
	    <!-- set mandated styles for the map to display -->
	    <!-- set styles for the floating input panel -->
	    <style>
		    html, body {
		      height: 100%;
		      margin: 0;
		      padding: 0;
		    }
		    #map {
		      height: 100%;
		    }
		
			#floating-panel {
			  position: absolute;
			  top: 10px;
			  left: 25%;
			  z-index: 5;
			  background-color: #fff;
			  padding: 5px;
			  border: 1px solid #999;
			  text-align: center;
			  font-family: 'Roboto','sans-serif';
			  line-height: 30px;
			  padding-left: 10px;
			}
		</style>
	<!-- iclude maps api -->
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<!-- include jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript">
			
	    // When the Window finishes loading...
	    $(document).ready(function () {
	    	$("#contactForm").on('submit', function (e) {
		    	e.preventDefault()
		    	// set the form data equal to data var
		    	var data = new FormData(this);
		        //Carry out an Ajax request.
		        $.ajax({
		        	// upload URL
		            url: 'upload.php',
		            // method
		            method: 'POST',
		            // DO NOT CACHE THE CALL
		            cache: false, 
		            // mixed content
		            contentType: false,
		            // dont let jquery handle as string
		            processData: false,
		            // set data equal to data for the ajax request
		            data: data,
		            success:function(data){
		                //Loop through each location.
		                console.log(data)
		                // write dev data to data div
		                $('#dump').text(data)
		                // loop over data
		                $.each(data, function(){

		      // DATA NEEDS TO BE HANDLED IN UPLOAD.PHP AND RETURNED IN A FORMAT FOR MAPS API

		      			// var marker = new MapMarker(optionsObject);


		                   //Plot the location as a marker
		                    // var pos = new google.maps.LatLng(this.lat, this.lng); 
		                    // new google.maps.Marker({
		                    //     position: pos,
		                    //     map: map
		                    // });
	                });
	            }
	        });
	    });

	});

	</script>

	</head>
		<div id="data">
			
		</div>

	<body>
		<!-- set the input form to be a floating panel -->
		<div id="floating-panel"> 
			<!-- no action needed as its ajax -->
			<form method="POST" id="contactForm" enctype="multipart/form-data">
				<!-- set the upload file -->
			<p> please choose a file to upload and input the column names below</p>
			<input type="file" id="csv" name="csv" />
			<!-- my attempt at getting the column names, this was another interesting task, mostly we made the csv format standard and with python there is a method to load it in which you can set the keys extremly easily -->
			<input type="text" name="col1" value="test" />
			<input type="text" name="col2" value="test" />	
			<input type="text" name="col3" value="test" />
			<input type="text" name="col4" value="test" />
			<input type="text" name="col5" value="test" />

			<input type="submit" id="submitBtn" name="submit" value="Upload" /></form>
		</div>
		
		<hr />

		<!-- DIV FOR DEVELOPMENT DUMP OF RETURN DATA FROM UPLOAD.PHP -->
		<div id="dump"> </div>
		
		<hr />
		
			<!-- SET MAPS DIV -->
			<div id="map"></div>
		
		 <script>
		// Initialize the actual map itself
	    var map = new google.maps.Map(document.getElementById('map'), {
	    	//CENTER BRECKENRIDGE COLORADO (MY FAVORITE PLACE!)

	    	//I am interested to discuss the way to center the map when not knowing an avg 
	    	//of the locations to be uploaded. I have ideas but suspect an easish way you may 
	    	//know of.


	    	// center marker on first location with a wide zoom? 
	      center: {lat: 39.500227, lng: -106.0431},
	      zoom: 15
	    });

	    </script>


	</body>



<html>