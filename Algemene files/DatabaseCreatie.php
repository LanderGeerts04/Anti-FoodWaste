<?php
require_once(__DIR__ . "/DatabaseConnectie.php");

// Controleer of database al bestaat
$sql = "CREATE DATABASE IF NOT EXISTS AntiFoodwaste";
if ($conn->query($sql) === TRUE) {
    echo "Database is aangemaakt of bestaat al.<br>";
} else {
    die("Fout bij aanmaken database: " . $conn->error);
}

// Selecteer de database
$conn->select_db("AntiFoodwaste");