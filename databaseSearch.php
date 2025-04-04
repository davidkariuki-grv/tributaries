<?php 
include("config.php");
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$stmt = $db->query("SELECT * FROM bio_data where name like ('$name%');");

while ($bioData = $stmt->fetch(PDO::FETCH_NUM)) {
    $requestedData = [
        "name" => "$bioData[0]", 
        "type" => "$bioData[1]",
        "image" => "$bioData[2]",
        "born" => "$bioData[3]",
        "education" => "$bioData[4]",
        "spouse" => "$bioData[5]",
        "children" => "$bioData[6]",
        "organization" => "$bioData[7]",
        "partner" => "$bioData[8]",
        "networth" => "$bioData[9]"        
    ];
    echo json_encode($requestedData);
}

?>
