<?php
session_start();
require_once("../Algemene files/DatabaseConnectie.php");
$conn->select_db("AntiFoodwaste");

if (isset($_POST)) {
    $data = file_get_contents("php://input");

    $recept = json_decode($data, true);

    $title = $recept["title"];
    $image = $recept["image"];

    $conn->query("INSERT INTO recepten (ReceptNaam,ReceptImage) VALUES ('$title','$image')");
}
