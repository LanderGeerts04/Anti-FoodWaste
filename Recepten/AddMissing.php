<?php
session_start();
require_once("../Algemene files/DatabaseConnectie.php");
$conn->select_db("AntiFoodwaste");

if (isset($_POST)) {
    $data = file_get_contents("php://input");

    $missing = json_decode($data, true);

    $name = $missing["name"];
    $amount = $missing["amount"];
    $unit = $missing["unit"];
    $userid = $_SESSION["user_id"];

    $conn->query("INSERT INTO Boodschappenlijst (Name,Amount,Unit,InlogID) VALUES ('$name','$amount','$unit','$userid')");
}
