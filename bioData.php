<?php
include('config.php');
$stmt = $db->query("SELECT * FROM bio_data;");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($result as &$row) {
        $row = array_map('trim', $row);
    }
    echo json_encode($result);


?>