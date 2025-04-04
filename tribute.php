<?php
include("config.php");
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$type = $data['type'];
$image = $data['image'];
$born = $data['born']; 
echo json_encode($born.$name.$type);
if(isset($data['education'])){
    $education = $data['education'];
}
else{
    $education = "undefined";
}
if(isset($data['spouse'])){
    $spouse = $data['spouse'];
}
else{
    $spouse = "undefined";
}
if(isset($data['children'])){
    $children = $data['children'];
}
else{
    $children = "undefined";
}
if(isset($data['organization'])){
    $organization = $data['organization'];
}
else{
    $organization = "undefined";
}
if(isset($data['partner'])){
    $partner = $data['partner'];
}
else{
    $partner = "undefined";
}
if(isset($data['networth'])){
    $networth = $data['networth'];
}
else{
    $networth = "undefined";
}
$searchSql = 'SELECT * FROM bio_data WHERE name = :search_value';
$stmt = $db->prepare($searchSql);
$searchValue = $name;
$stmt->bindParam(':search_value', $searchValue, PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
if(!$results){
    $stmt = $db->prepare("insert into bio_data values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $type, $image, $born, $education, $spouse, $children, $organization, $partner, $networth])){
        echo "Inserted Data successfully";
    }
    else{
        echo "Failed to insert Data";
    }
}
else{
    echo "Row already exists";
}


?>