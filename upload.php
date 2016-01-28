<?php 
// set return header
header('Content-Type: applicaton/json');
// get csv file from tmp upload dir
$csv = $_FILES['csv']['tmp_name'];
// parse csv into array
$csvAsArray = array_map('str_getcsv', file($csv));
// return the json array
// COUNT THE ARRAY
// $counted = array_count_values($csvAsArray);

// set the gps array for post geocoding
$gps = [];

// loop over addresses and get the geocode lat long
foreach ($csvAsArray as $key => $value) {
	// implode the address into one string
	$address = implode(" ",$value);
	// send to google maps geocode api
	// flawed as right now the HEX color code is on the end of the scrip
	$coords = getLatLong($address);
	// add the return values to the $gps array for return to the initial page
	array_push($gps, $coords );
}
// return the values to the index.php page
echo json_encode($gps);

//echo json_encode($csvAsArray); 

// TODO

// GEOCODE ADDRESSES IN THE LOOP LIKELY IN THIS PAGE

// RETURN DATA FORMATTED DIRECTLY FOR MAP MARKERS FROM THIS PAGE
// function to geocode address, it will return false if unable to geocode address

// function to get the lat long from the addresses
function getLatLong($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}

?>