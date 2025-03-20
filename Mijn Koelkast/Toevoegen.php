<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Naam"]) && isset($_POST["Categorie"]) && isset($_POST["Hoeveelheid"])) {
        $naam = $_POST["Naam"];
        $categorie = $_POST["Categorie"];
        $hoeveelheid = (int) $_POST["Hoeveelheid"];

        $stmt=$conn->prepare("INSERT INTO ingrediënten (IngrediëntNaam,IngrediëntCategorie) VALUES (?,?)");
        $stmt->bind_param("ss",$naam,$categorie);
        $stmt->execute();
        $stmt->close();

        $stmt=$conn->prepare("INSERT INTO koelkast (IngrediëntID,Hoeveelheid) SELECT IngrediëntID, ? FROM ingrediënten WHERE IngrediëntNaam = ?;");
        $stmt->bind_param("is",$hoeveelheid,$naam);
        $stmt->execute();
        $stmt->close();
        
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./Mijn_Koelkast.php");
    }
}
$conn->close();
header("Location: ./Mijn_Koelkast.php");
