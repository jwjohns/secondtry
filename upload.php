<?php 
header('Content-Type: applicaton/json');
$csv = $_FILES['csv']['tmp_name'];
$csvAsArray = array_map('str_getcsv', file($csv));

echo json_encode($csvAsArray); 

?>