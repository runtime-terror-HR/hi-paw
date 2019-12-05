<?php
$req = $_GET['request'];

$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}

$stmt = $db->prepare("DELETE FROM request WHERE id = ?");
$stmt->bind_param("i", $req);
$stmt->execute();
$stmt->close();
header("Location:request_m.php");
exit();
