<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekmenu</title>
    <link rel="stylesheet" href="./Weekmenu.css">
    <script src="../Algemene files/Navigatieverberg.js"></script>
    <script src="../Algemene files/Draging.js"></script>
</head>
<body>
    <div>
        <h1 id="title">
            Weekmenu
            <a href="#HOME"><img id="logo" align="right" src="./Photos/Icons/calendar-days.svg" alt="Geen foto beschikbaar"></a>
        </h1> 
    </div>
    <hr/>
    <p class="Intro">Dit is een overzicht van je week</p>
    <hr />
    <button class="hamburger" type="button" onclick="verberg()"><img src="../Algemene files/Algemen iconen/menu.svg" alt="$"></button>
    <ul id="nav">
        <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
        <li><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
        <li id="active"><a href="../Weekmenu/Weekmenu.html">WEEKMENU</a></li>
        <li><a href="../Boodschappenlijst/Boodschappenlijst.html">BOODSCHAPPENLIJST</a></li>
        <li id="bottom"><a href="../Recepten/recepten.html">RECEPTEN</a></li>
    </ul>
    <div id="Recepten_block" ondrop="drop(event)" ondragover="allowDrop(event)">
        <ul>
            <?php
            require_once("../Algemene files/DatabaseConnectie.php");
            $conn->select_db("AntiFoodwaste");

            $sql = "SELECT ReceptNaam,ReceptID from recepten; ";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class=\"Recept\" id=".$row["ReceptID"]." draggable=\"true\" ondragstart=\"drag(event)\"><img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\"><p>".$row["ReceptNaam"]."</p></li>";
                }
            }
            ?>
        </ul>
    </div>
    <table id="agenda">
        <tr id="tabel_dagen">
            <td>Maandag</td>
            <td>Dinsdag</td>
            <td>Woensdag</td>
            <td>Donderdag</td>
            <td>Vrijdag</td>
            <td>Zaterdag</td>
            <td>Zondag</td>
        </tr>
        <tr id="tabel_drop_posities">
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
            <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        </tr>
    </table>
    

    
</body>
</html>