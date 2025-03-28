<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boodschappenlijstje</title>
    <link rel="stylesheet" href="Boodschappenlijst.css" />
    <script src="../Algemene files/Navigatieverberg.js"></script>
</head>

<body>
    <div>
        <h1 id="title">
            Boodschappenlijst
            <a href="../Homepage/Homepage.php"><img id="logo" align="right" src="../Boodschappenlijst/Photos/list-check.svg" alt="Geen foto beschikbaar"></a>
        </h1>
    </div>
    <hr />
    <div>
        <button class="hamburger" type="button" onclick="verberg()"><img src="../Algemene files/Algemen iconen/menu.svg" alt="$"></button>
        <ul id="nav">
            <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
            <li><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
            <li><a href="../Weekmenu/Weekmenu.php">WEEKMENU</a></li>
            <li id="active"><a href="../Boodschappenlijst/Boodschappenlijst.php">BOODSCHAPPENLIJST</a></li>
            <li id="bottom"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
        </ul>
    </div>

    <?php
            require_once("../Algemene files/DatabaseConnectie.php");
            $conn->select_db("AntiFoodwaste");

            $sql = "SELECT i.IngrediëntNaam, (r.Hoeveelheid - k.Hoeveelheid) 'Hoeveelheid' from Ingrediënten i inner join Koelkast k on i.IngrediëntID = k.IngrediëntID inner join ReceptIngrediënt r on k.IngrediëntID = r.IngrediëntID group by i.IngrediëntNaam having (r.Hoeveelheid - k.Hoeveelheid) > 0 ;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class=\"Ingrediënt\" id=" . $row["IngrediëntNaam"] . ">
                        </li>";
                }
            }
    ?>

    <div class="lijstje">
        <div id="veg">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/carrot.svg" alt="$">
            <h2>Groenten</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="groente" value="Sla">
                <label>Sla</label>
            </li>
        </ul>
        <div id="Dairy">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/egg.svg" alt="$">
            <h2>Zuivel</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="zuivel" value="melk">
                <label>Melk</label>
            </li>
        </ul>
        <div id="fru">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/apple.svg" alt="$">
            <h2>Fruit</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="fruit" value="appel">
                <label>Appel</label>
            </li>
        </ul>
        <div id="wheat">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/wheat.svg" alt="$">
            <h2>Deegwaren</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="deegwaren" value="Spaghetti">
                <label>Spaghetti</label>
            </li>
        </ul>
        <div id="meat">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/ham.svg" alt="$">
            <h2>Vlees en vis</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="vleesvis" value="biefstuk">
                <label>Biefstuk</label>
            </li>
        </ul>
        <div id="varia">
            <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/chef-hat.svg" alt="$">
            <h2>Diversen</h2>
        </div>
        <ul>
            <li><input type="checkbox" name="divers" value="BIER">
                <label>BIER</label>
            </li>
        </ul>
    </div>
</body>

</html>