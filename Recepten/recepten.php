<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../Recepten/recepten.css" rel="stylesheet" />
  <title>Recept page</title>
  <script src="ingredients.js"></script>
  <script src="recipes.js"></script>
</head>

<body>
  <h1>ZOEK EEN RECEPT</h1>
  <hr />
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
      <li id="active"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
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
    <br />
    <button class="knop" id="knop1" onclick="getData()">Zoek</button>
    <div id="lower">
      <input
        id="ingredients"
        class="input"
        type="text"
        placeholder="Ingrediënten.." />
      <input
        class="numberInput"
        id="Ingrediënten-hoeveelheid"
        type="number"
        placeholder="0" />
    </div>
    <br />
    <button class="knop" id="knop2" onclick="fetchData()">Zoek</button>
    <div id="recept-foto"></div>
  </div>
</body>

</html>