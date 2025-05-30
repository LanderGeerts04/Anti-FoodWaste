<?php

session_start();
if (!isset($_SESSION['email'])) {
  header("location: ../login/index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../Recepten/recepten.css" rel="stylesheet" />
  <link rel="icon" href="../Algemene files/Algemen iconen/garbage.png" type="image/icon type">
  <title>Recept page</title>
  <script src="recipes.js"></script>
  <script src="../Algemene files/Navigatieverberg.js"></script>
</head>

<body onload="checkBox()">
  <h1 id="title">
      Recepten
      <a href="../Homepage/Homepage.php"><img id="logo" align="right" src="./Photos/chef-hat.svg" alt="Geen foto beschikbaar"></a>
  </h1>
  <hr>
  <p class="Intro">Als je klikt op een recept gaat deze naar je weekmenu</p>
  <hr>
  <div class="navigatie">
    <button class="hamburger" type="button" onclick="verberg()">
      <img src="../Algemene files/Algemen iconen/menu.svg" alt="$" />
    </button>
    <ul id="nav">
      <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
      <li><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
      <li><a href="../Weekmenu/Weekmenu.php">WEEKMENU</a></li>
      <li>
        <a href="../Boodschappenlijst/Boodschappenlijst.php">BOODSCHAPPENLIJST</a>
      </li>
      <li id="bottom" class="active"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
    </ul>
  </div>
  <div class="main">
    <div id="upper">
      <input id="recepten" class="input" type="text" placeholder="Recept.." />
      <input
        class="numberInput"
        id="recept-hoeveelheid"
        type="number"
        placeholder="0" />
    </div>
    <div id="middle">
      <input type="checkbox" name="ingredienten" id="ingredienten" onclick="checkBox()">
      <label id="ingredient-label" for="ingredienten">Gebruik ingrediënten</label>
    </div>

    <div id="lower">
      <input type="text" class="input" name="ingredient" id="ingredient-input" placeholder="Ingrediënten..">

    </div>
    <button class="knop" id="knop1" onclick="getData()">Zoek</button>
    <div id="recept-foto"></div>
  </div>
</body>

</html>