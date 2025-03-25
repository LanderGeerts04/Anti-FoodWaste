<?php
session_start();
require_once("../Algemene files/DatabaseConnectie.php");
$conn->select_db("AntiFoodwaste");


$conn->query("INSERT INTO recepten (ReceptNaam) VALUES ('$name')");
