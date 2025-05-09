<?php
require_once(__DIR__ . "/DatabaseConnectie.php");

// Selecteer database
$conn->select_db("AntiFoodwaste");

// SQL-query om alle tabellen te maken
$sql = "
CREATE TABLE IF NOT EXISTS Inlog (
    InlogID INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Wachtwoord VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Ingrediënten (
    IngrediëntID INT AUTO_INCREMENT PRIMARY KEY,
    IngrediëntNaam VARCHAR(50) NOT NULL,
    IngrediëntCategorie VARCHAR(20),
    Hoeveelheid INT,
    Vervaldatum DATE,
    InlogID INT,
    IngrediëntEenheid VARCHAR(10),
    CONSTRAINT fk_Ingrediënt_Inlog FOREIGN KEY (InlogID) REFERENCES Inlog(InlogID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Boodschappenlijst (
    BoodschappenlijstID INT AUTO_INCREMENT PRIMARY KEY,
    IngrediëntID INT,
    InlogID INT,
    CONSTRAINT fk_Boodschappenlijst_Ingrediënten FOREIGN KEY (IngrediëntID) REFERENCES Ingrediënten(IngrediëntID) ON DELETE CASCADE,
    CONSTRAINT fk_Boodschappenlijst_Inlog FOREIGN KEY (InlogID) REFERENCES Inlog(InlogID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Recepten (
    ReceptID INT AUTO_INCREMENT PRIMARY KEY,
    ReceptImage VARCHAR(2048),
    ReceptNaam VARCHAR(50) NOT NULL,
    InlogID INT,
    CONSTRAINT fk_Recepten_Inlog FOREIGN KEY (InlogID) REFERENCES Inlog(InlogID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ReceptIngrediënt (
    ReceptIngrediëntID INT AUTO_INCREMENT PRIMARY KEY,
    ReceptID INT,
    Hoeveelheid INT,
    IngrediëntID INT,
    CONSTRAINT fk_ReceptenIngrediënt_Recepten FOREIGN KEY (ReceptID) REFERENCES Recepten(ReceptID) ON DELETE CASCADE,
    CONSTRAINT fk_ReceptenIngrediënt_Ingrediënten FOREIGN KEY (IngrediëntID) REFERENCES Ingrediënten(IngrediëntID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Weekmenu (
    MenuID INT AUTO_INCREMENT PRIMARY KEY,
    Day VARCHAR(50),
    ReceptID INT,
    InlogID INT,
    CONSTRAINT fk_Weekmenu_Inlog FOREIGN KEY (InlogID) REFERENCES Inlog(InlogID) ON DELETE CASCADE,
    CONSTRAINT fk_Weekmenu_Recepten FOREIGN KEY (ReceptID) REFERENCES Recepten(ReceptID) ON DELETE CASCADE
);


";

// **Voer de query uit**
if ($conn->multi_query($sql)) {
    echo "Alle tabellen zijn succesvol aangemaakt!<br>";
} else {
    die("Fout bij aanmaken tabellen: " . $conn->error);
}

// **Sluit de databaseverbinding**
$conn->close();