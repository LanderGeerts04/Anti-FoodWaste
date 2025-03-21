<?php
require_once(__DIR__ . "/DatabaseConnectie.php");

// Selecteer database
$conn->select_db("AntiFoodwaste");

// SQL-query om alle tabellen te maken
$sql = "
CREATE TABLE IF NOT EXISTS Ingrediënten (
    IngrediëntID INT AUTO_INCREMENT PRIMARY KEY,
    IngrediëntNaam VARCHAR(50) NOT NULL,
    IngrediëntCategorie VARCHAR(20),
    IngrediëntEenheid VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS Koelkast (
    KoelkastID INT AUTO_INCREMENT PRIMARY KEY,
    Hoeveelheid INT,
    Vervaldatum DATE,
    IngrediëntID INT,
    CONSTRAINT fk_Koelkast_Ingrediënten FOREIGN KEY (IngrediëntID) REFERENCES Ingrediënten(IngrediëntID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Boodschappenlijst (
    BoodschappenlijstID INT AUTO_INCREMENT PRIMARY KEY,
    IngrediëntID INT,
    CONSTRAINT fk_Boodschappenlijst_Ingrediënten FOREIGN KEY (IngrediëntID) REFERENCES Ingrediënten(IngrediëntID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Recepten (
    ReceptID INT AUTO_INCREMENT PRIMARY KEY,
    ReceptNaam VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS ReceptIngrediënt (
    ReceptIngrediëntID INT AUTO_INCREMENT PRIMARY KEY,
    ReceptID INT,
    IngrediëntID INT,
    CONSTRAINT fk_ReceptenIngrediënt_Recepten FOREIGN KEY (ReceptID) REFERENCES Recepten(ReceptID) ON DELETE CASCADE,
    CONSTRAINT fk_ReceptenIngrediënt_Ingrediënten FOREIGN KEY (IngrediëntID) REFERENCES Ingrediënten(IngrediëntID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Weekmenu (
    MenuID INT AUTO_INCREMENT PRIMARY KEY,
    Day VARCHAR(50),
    ReceptID INT,
    CONSTRAINT fk_Weekmenu_Recepten FOREIGN KEY (ReceptID) REFERENCES Recepten(ReceptID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Gebruiker (
    GebruikerID INT AUTO_INCREMENT PRIMARY KEY,
    KoelkastID INT,
    MenuID INT,
    BoodschappenlijstID INT,
    ReceptID INT,
    CONSTRAINT fk_Gebruiker_Koelkast FOREIGN KEY (KoelkastID) REFERENCES Koelkast(KoelkastID) ON DELETE CASCADE,
    CONSTRAINT fk_Gebruiker_Weekmenu FOREIGN KEY (MenuID) REFERENCES Weekmenu(MenuID) ON DELETE CASCADE,
    CONSTRAINT fk_Gebruiker_Boodschappenlijst FOREIGN KEY (BoodschappenlijstID) REFERENCES Boodschappenlijst(BoodschappenlijstID) ON DELETE CASCADE,
    CONSTRAINT fk_Gebruiker_Recepten FOREIGN KEY (ReceptID) REFERENCES Recepten(ReceptID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Inlog (
    InlogID INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Wachtwoord VARCHAR(255) NOT NULL,
    GebruikerID INT,
    CONSTRAINT fk_Inlog_Gebruiker FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE
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