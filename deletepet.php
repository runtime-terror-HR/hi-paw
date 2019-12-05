<?php
session_start();
$petid = $_GET['pet_id'];
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}

$stmt = $db->prepare("DELETE FROM request WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM saved_pets WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_is WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_goodwith WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_likes WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet_color WHERE pet_id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();
$stmt = $db->prepare("DELETE FROM pet WHERE id = ?");
$stmt->bind_param("i", $petid);
$stmt->execute();
$stmt->close();

header("Location:profile_mypets.php");
exit();


