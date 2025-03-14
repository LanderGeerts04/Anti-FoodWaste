<?php
//server informatie
$servernaam = "localhost";
$gebruikersnaam = "root";
$wachtwoord = "";

//maakt de connectie
$conn= new mysqli($servernaam,$gebruikersnaam,$wachtwoord);

//checked de connectie
if($conn->connect_error){
    die("Verbinding mislukt: ".$conn->connect_error);
}



