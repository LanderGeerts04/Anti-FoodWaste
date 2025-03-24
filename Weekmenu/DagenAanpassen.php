<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Dagen"])&& isset($_POST["ReceptID"])) {
        $dagen=$_POST["Dagen"];
        $receptID=$_POST["ReceptID"];
        $stmt=$conn->prepare("INSERT into weekmenu (Day,ReceptID) VALUES(?,?)");
        $stmt->bind_param("si",$dagen,$receptID);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./Weekmenu.php");
    }
}
$conn->close();
header("Location: ./Weekmenu.php");