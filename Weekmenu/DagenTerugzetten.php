<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ReceptID"])) {
        $receptID=$_POST["ReceptID"];
        $stmt=$conn->prepare("DELETE FROM weekmenu where ReceptID = ?; ");
        $stmt->bind_param("i",$receptID);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./Weekmenu.php");
    }
}
$conn->close();
header("Location: ./Weekmenu.php");