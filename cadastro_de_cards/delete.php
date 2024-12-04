<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM cards WHERE id = $id");

header("Location: index.php");
exit;
?>
