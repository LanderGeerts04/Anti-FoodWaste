<?php

session_start();
if (!isset($_SESSION['email'])){
  header("location: ../login/index.php");
  exit();
}

require_once("../Algemene files/DatabaseConnectie.php");
$conn->select_db("AntiFoodwaste");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Algemene files/Algemen iconen/garbage.png" type="image/icon type">
    <title>Boodschappenlijstje</title>
    <link rel="stylesheet" href="Boodschappenlijst.css" />
    <script src="../Algemene files/Navigatieverberg.js"></script>
    <script src="../Algemene files/Jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#veg").click(function(){
                $("#vegpan").toggle();
            })
            $("#Dairy").click(function(){
                $("#dairypan").toggle();
            })
            $("#fru").click(function(){
                $("#frupan").toggle();
            })
            $("#wheat").click(function(){
                $("#wheatpan").toggle();
            })
            $("#meat").click(function(){
                $("#meatpan").toggle();
            })
            $("#varia").click(function(){
                $("#variapan").toggle();
            })
        })
    </script>
</head>

<body>
    <div>
        <h1 id="title">
            Boodschappenlijst
            <a href="../Homepage/Homepage.php"><img id="logo" align="right" src="../Boodschappenlijst/Photos/list-check.svg" alt="Geen foto beschikbaar"></a>
        </h1>
    </div>
    <hr>
    <p class="Intro">Hier vind je het boodschappenlijstje</p>
    <hr>
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
    <div class="artikel">
        <div class="lijstje">
            <button id="veg" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/carrot.svg" alt="$">
                <h2>Groenten</h2>
            </button>
            <ul class="panneel" id="vegpan">
                <?php
                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten WHERE IngrediëntCategorie LIKE \"GR\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                ?>
            </ul>
            <button id="Dairy" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/egg.svg" alt="$">
                <h2>Zuivel</h2>
            </button>
            <ul class="panneel" id="dairypan">
                <?php

                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten WHERE IngrediëntCategorie LIKE \"ZU\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                ?>
            </ul>
            <button id="fru" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/apple.svg" alt="$">
                <h2>Fruit</h2>
            </button>
            <ul class="panneel" id="frupan">
                <?php

                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten WHERE IngrediëntCategorie LIKE \"FR\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                ?>
            </ul>
            <button id="wheat" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/wheat.svg" alt="$">
                <h2>Deegwaren</h2>
            </button>
            <ul class="panneel" id="wheatpan">
                <?php

                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten WHERE IngrediëntCategorie LIKE \"DE\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                ?>
            </ul>
            <button id="meat" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/ham.svg" alt="$">
                <h2>Vlees en vis</h2>
            </button>
            <ul class="panneel" id="meatpan">
                <?php

                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten WHERE IngrediëntCategorie LIKE \"VV\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                ?>
            </ul>
            <button id="varia" class="blaaszak">
                <img class="menulogos" src="../Mijn Koelkast/Photos/Icons/chef-hat.svg" alt="$">
                <h2>Diversen</h2>
            </button>
            <ul class="panneel" id="variapan">
                <?php

                    $sql = "SELECT IngrediëntNaam FROM receptingrediënt INNER JOIN ingrediënten  WHERE IngrediëntCategorie LIKE \"OV\" AND InlogID IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<li><input type=\"checkbox\" name=\"groenten\" value=".$row["IngrediëntNaam"]."><label>".$row["IngrediëntNaam"]."</label>";
                        }
                    }
                    $conn->close();
                ?>
            </ul>
        </div>
    </div>
    
</body>

</html>