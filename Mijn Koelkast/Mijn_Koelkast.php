<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mijne Frigo</title>
    <link rel="stylesheet" href="./Mijn_Koelkast.css" />
    <script src="../Algemene files/Navigatieverberg.js"></script>
  </head>
  <body>
  <div>
      <h1 id="title">
        Mijn Koelkast
        <a href="/Homepage/index.html"
          ><img
            id="logo"
            align="right"
            src="./Photos/Icons/refrigerator.svg"
            alt="Geen foto beschikbaar"
        /></a>
      </h1>
    </div>
    <hr />
    <p class="Intro">Hier kan je zien wat er in je koelkast zit</p>
    <hr />
    <button class="hamburger" type="button" onclick="verberg()"><img src="../Algemene files/Algemen iconen/menu.svg" alt="$"></button>
    <ul id="nav">
      <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
      <li id="active"><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
      <li><a href="../Weekmenu/Weekmenu.html">WEEKMENU</a></li>
      <li><a href="../Boodschappenlijst/Boodschappenlijst.html">BOODSCHAPPENLIJST</a></li>
      <li id="bottom"><a href="../Recepten/recepten.html">RECEPTEN</a></li>
    </ul>
    <div class="artikel">
      <div class="toevoegen">
        <button id="ADD">ADD</button>
        <div id="informatie">
          <form action="">
            <ul>
              <li><input type="text" id="Naam" class="formdesign"></li>
              <li>
                <select name="Categorie" id="Categorie" class="formdesign">
                  <option value="GR">Groenten</option>
                  <option value="FR">Fruit</option>
                  <option value="VV">Vlees of vis</option>
                  <option value="ZU">Zuivel</option>
                  <option value="DE">Deegwaren</option>
                  <option value="OV">Overige producten</option>
                </select>
              </li>
              <li><input type="number" id="Hoeveelheid" class="formdesign"></li>
              <li><button type="submit" class="formdesign" id="Toevoegen">Toevoegen</button></li>
            </ul>
          </form>
        </div>
      </div>
      <div class="overzicht">
        <form action="">
          <select name="Categorie" id="Categorie">
            <option value="GR">Groenten</option>
            <option value="FR">Fruit</option>
            <option value="VV">Vlees of vis</option>
            <option value="ZU">Zuivel</option>
            <option value="DE">Deegwaren</option>
            <option value="OV">Overige producten</option>
          </select>
        </form>
        <div id="Kader">
          <ul>
            <?php
              require_once("../Algemene files/DatabaseConnectie.php");
              $conn->select_db("AntiFoodwaste");

              $sql="SELECT i.IngrediëntNaam,k.Hoeveelheid from ingrediënten i INNER JOIN koelkast k ON (i.IngrediëntID=k.IngrediëntID);";
              
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<li>".$row["IngrediëntNaam"]."<ol>".$row["Hoeveelheid"]."</ol></li>";
                }
              }

              $conn->close();
            ?>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
