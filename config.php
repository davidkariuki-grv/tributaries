<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $_ENV["host"];
$conn .= ";port=" . $_ENV["port"];;
$conn .= ";dbname=tributaries";
$conn .= ";sslmode=verify-ca;sslrootcert='ca.pem'";


try {
    $db = new PDO($conn, $_ENV["user"], $_ENV["pass"]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
