<?php
$servernaam = "localhost";
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "antifoodwaste";

$conn= new mysqli($servernaam,$gebruikersnaam,$wachtwoord,$database);

if($conn->connect_error){
    die("Verbinding mislukt: ".$conn->connect_error);
}


