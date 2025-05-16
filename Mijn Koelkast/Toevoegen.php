<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");
$userid=$_SESSION["user_id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Naam"]) && isset($_POST["Categorie"]) && isset($_POST["Hoeveelheid"]) && isset($_POST["Date"])) {
        $naam = $_POST["Naam"];
        $categorie = $_POST["Categorie"];
        $hoeveelheid = (int) $_POST["Hoeveelheid"];
        $eenheid= $_POST["eenheid"];
        $date=$_POST["Date"];
        
        $stmt=$conn->prepare("INSERT INTO ingrediënten (IngrediëntNaam,IngrediëntCategorie,IngrediëntEenheid,Hoeveelheid,Vervaldatum,InlogID) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssisi",$naam,$categorie,$eenheid,$hoeveelheid,$date,$userid);
        $stmt->execute();
        $stmt->close();
        
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./Mijn_Koelkast.php");
    }
}
$conn->close();
header("Location: ./Mijn_Koelkast.php");
