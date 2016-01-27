<html> 


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			
		    //When the Window finishes loading...
		    $(document).ready(function () {
		    	$("#contactForm").on('submit', function (e) {
		    	e.preventDefault()
		    	var data = new FormData(this);
		        //Carry out an Ajax request.
		        $.ajax({
		            url: 'upload.php',
		            method: 'POST',
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false,
		            data: data,
		            success:function(data){
		                //Loop through each location.
		                console.log(data)
		                $.each(data, function(){

		                    //Plot the location as a marker
		                    var pos = new google.maps.LatLng(this.lat, this.lng); 
		                    new google.maps.Marker({
		                        position: pos,
		                        map: map
		                    });
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

		<div> 
			<form method="POST" id="contactForm" enctype="multipart/form-data">
			<input type="file" id="csv" name="csv" />
			
			<hr />
			<p> please input the column names.</p>
			<input type="text" name="col1" value="test" />
			<input type="text" name="col2" value="test" />	
			<input type="text" name="col3" value="test" />
			<input type="text" name="col4" value="test" />
			<input type="text" name="col5" value="test" />

			<input type="submit" id="submitBtn" name="submit" value="Save" /></form>
		</div>
		<hr />
		<div id="map"></div>
    	<?php var_dump($_FILES); ?>
    	
    	<?php phpinfo(); ?>
	</body>



<html>