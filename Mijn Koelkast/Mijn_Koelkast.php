<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../Algemene files/Algemen iconen/garbage.png" type="image/icon type">
  <title>Mijne Frigo</title>
  <link rel="stylesheet" href="./Mijn_Koelkast.css" />
  <script src="../Algemene files/Navigatieverberg.js"></script>
</head>

<body>
  <div>
    <h1 id="title">
      Mijn Koelkast
      <a href="../Homepage/Homepage.php"><img
          id="logo"
          align="right"
          src="./Photos/Icons/refrigerator.svg"
          alt="Geen foto beschikbaar" /></a>
    </h1>
  </div>
  <hr />
  <p class="Intro">Hier kan je zien wat er in je koelkast zit</p>
  <hr />
  <button class="hamburger" type="button" onclick="verberg()"><img src="../Algemene files/Algemen iconen/menu.svg" alt="$"></button>
  <ul id="nav">
    <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
    <li id="active"><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
    <li><a href="../Weekmenu/Weekmenu.php">WEEKMENU</a></li>
    <li><a href="../Boodschappenlijst/Boodschappenlijst.php">BOODSCHAPPENLIJST</a></li>
    <li id="bottom"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
  </ul>
  <div class="artikel">
    <div class="toevoegen">
      <div id="ADD">Voeg hier uw producten toe</div>
      <div id="informatie">
        <form action="./Toevoegen.php" method="POST">
          <ul>
            <li><input type="text" id="Naam" name="Naam" placeholder="Naam product" class="formdesign"></li>
            <li>
              <select name="Categorie" id="Categorie" name="Categorie" class="formdesign">
                <option value="GR">Groenten</option>
                <option value="FR">Fruit</option>
                <option value="VV">Vlees of vis</option>
                <option value="ZU">Zuivel</option>
                <option value="DE">Deegwaren</option>
                <option value="OV">Overige producten</option>
              </select>
            </li>
            <li>
              <input type="number" id="Hoeveelheid" name="Hoeveelheid" placeholder="0" class="formdesign">
              <select name="eenheid" id="eenheid" class="formdesign">
                <option value="gram">gram</option>
                <option value="liter">liter</option>
                <option value="">stuks</option>
              </select>
            </li>
            <li><input type="date" class="formdesign" id="datepicker" name="Date"></li>
            <li><button type="submit" class="formdesign" id="Toevoegen">Toevoegen</button></li>
          </ul>
        </form>
      </div>
    </div>
    <div class="overzicht">
      <form method="POST" action="?">
        <select name="Categorie" id="Categorie" class="Categorie">
          <option disabled selected value>Filter</option>
          <option value="GR">Groenten</option>
          <option value="FR">Fruit</option>
          <option value="VV">Vlees of vis</option>
          <option value="ZU">Zuivel</option>
          <option value="DE">Deegwaren</option>
          <option value="OV">Overige producten</option>
          <option value="%">Toon alle</option>
        </select>
        <button type="submit" id="Pastoe" class="Categorie">Pas toe</button>
      </form>
      <div id="Kader">
        <ul>
          <?php
          require_once("../Algemene files/DatabaseConnectie.php");
          $conn->select_db("AntiFoodwaste");

          // Verwijderen van items
          if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
            $id = $_GET["delete"];
            $stmt = $conn->prepare("DELETE FROM ingrediënten WHERE IngrediëntID = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
              // Succesvol verwijderd
            } else {
              error_log("Fout bij verwijderen: " . $stmt->error);
            }
            $stmt->close();
          }

          // UI genereren (met filter)
          if (isset($_POST["Categorie"])) {
            $cat = $_POST["Categorie"];
            $stmt = $conn->prepare("SELECT i.IngrediëntID,i.IngrediëntNaam,k.Hoeveelheid,i.IngrediëntEenheid,DATEDIFF(k.Vervaldatum,now())'Vervaldatum' FROM koelkast k INNER JOIN ingrediënten i ON (i.IngrediëntID=k.IngrediëntID) WHERE i.IngrediëntCategorie LIKE ?");
            $stmt->bind_param("s", $cat);
            $stmt->execute(); // Uitvoeren van de query
            $result = $stmt->get_result(); // Ophalen van het resultaat
            $stmt->close(); // Sluiten van de statement
          } else {
            // UI genereren (zonder filter)
            $sql = "SELECT i.IngrediëntID,i.IngrediëntNaam,k.Hoeveelheid,i.IngrediëntEenheid,DATEDIFF(k.Vervaldatum,now())'Vervaldatum' FROM koelkast k INNER JOIN ingrediënten i ON (i.IngrediëntID=k.IngrediëntID); ";
            $result = $conn->query($sql);
          }

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li>" . $row["IngrediëntNaam"] . "<ol id=\"delknop\"><a href=\"?delete=" . $row["IngrediëntID"] . "\">DEL</a></ol><ol id=\"hoeveelheid\">" . $row["Hoeveelheid"] . " " . $row["IngrediëntEenheid"] . "</ol><ol id=\"vervaldatum\">".$row["Vervaldatum"]." dagen over</ol></li>";
            }
          }
          $conn->close(); // Sluiten van de verbinding
          ?>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>