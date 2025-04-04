<?php
$uri = "mysql://avnadmin:AVNS_ydJBHfECwJzwXbpvjNo@mysql-1700a326-tribute.c.aivencloud.com:25350/tributaries?ssl-mode=REQUIRED";
$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=tributaries";
$conn .= ";sslmode=verify-ca;sslrootcert='ca.pem'";
try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>