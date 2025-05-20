<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");
$userid = $_SESSION["user_id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Naam"]) && isset($_POST["amount"]) && isset($_POST["unit"])) {
        $naam = $_POST["Naam"];
        $amount = (float)$_POST["amount"];
        $unit = $_POST["unit"];

        $stmt = $conn->prepare("INSERT INTO boodschappenlijst (Name,Amount,Unit,InlogID) VALUES (?,?,?,?)");
        $stmt->bind_param("sdsi", $naam, $amount, $unit, $userid);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./boodschappenlijst.php");
    }
}
$conn->close();
header("Location: ./boodschappenlijst.php");
