<?php
$servername = "localhost";
$dbname = "mk1_mk1";
$username = "mk1_mk1";
$password = "mQdptNRuqy";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// echo "Connection failed: " . $e ->getMessage();
}
?>