<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("location: ../login/index.php");
    exit();
}

$userid = $_SESSION["user_id"];

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
        $(document).ready(function() {
            $("#veg").click(function() {
                $("#vegpan").toggle();
            })
            $("#Dairy").click(function() {
                $("#dairypan").toggle();
            })
            $("#fru").click(function() {
                $("#frupan").toggle();
            })
            $("#wheat").click(function() {
                $("#wheatpan").toggle();
            })
            $("#meat").click(function() {
                $("#meatpan").toggle();
            })
            $("#varia").click(function() {
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
        <div class="toevoegen">
            <p id="toevoegen-tekst">Boodschappen toevoegen</p>
            <form action="./toevoegen.php" method="POST">
                <input type="text" name="Naam" id="Naam" placeholder="Name">
                <input type="number" name="amount" id="amount" placeholder="0" step="0.1">
                <select name="unit" id="unit" class="formdesign">
                    <option value="g">Gram</option>
                    <option value="ml">Mililiter</option>
                    <option value="Cups">Cups</option>
                    <option value="Stuks">Stuks</option>
                </select>
                <button type="submit">add</button>
            </form>
        </div>
        <div class="lijstje">
            <ul class="panneel" id="vegpan">
                <?php

                if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
                    $id = $_GET["delete"];
                    $stmt = $conn->prepare("DELETE FROM boodschappenlijst WHERE BoodschappenlijstID = ?");
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) {
                        // Succesvol verwijderd
                    } else {
                        error_log("Fout bij verwijderen: " . $stmt->error);
                    }
                    $stmt->close();
                }
                if (isset($_GET["add"]) && is_numeric($_GET["add"])) {
                    $id = $_GET["add"];
                    $stmt = $conn->prepare("DELETE FROM boodschappenlijst WHERE BoodschappenlijstID = ?");
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) {
                        // Succesvol verwijderd
                    } else {
                        error_log("Fout bij verwijderen: " . $stmt->error);
                    }
                    $stmt->close();
                }

                $sql = "SELECT * FROM boodschappenlijst WHERE InlogID LIKE $userid ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["Name"] . "<ol id=\"delknop\"><a href=\"?delete=" . $row["BoodschappenlijstID"] . "\">DEL</a></ol><ol id=\"delknop\"><a href=\"?add=" . $row["BoodschappenlijstID"] . "\">ADD</a></ol><ol id=\"hoeveelheid\">" . $row["Amount"] . " " . $row["Unit"] . "</ol></li>";
                    }
                }
                ?>
            </ul>

        </div>
    </div>

</body>

</html>