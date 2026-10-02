<?php
include 'db.php';
header('content-type:text/csv');
header('content-disposition:attachment;filename=usesr.csv');
$output=fopen("php://output",'w');
fputcsv($output,array("id","email","phone","city","name"));
$result = $conn -> query("select * from users");
while($row = $result -> fetch_assoc()) {
    fputcsv($output,$row);
}

?>