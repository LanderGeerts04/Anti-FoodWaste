<?php

session_start();
$userid = $_SESSION["user_id"];
if (!isset($_SESSION['email'])){
  header("location: ../login/index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Algemene files/Algemen iconen/garbage.png" type="image/icon type">
    <title>Weekmenu</title>
    <link rel="stylesheet" href="./Weekmenu.css">
    <script src="../Algemene files/Jquery.js"></script>
    <script src="../Algemene files/Navigatieverberg.js"></script>
    <script src="../Algemene files/Draging.js"></script>
    <script src="../Weekmenu/Dragchange.php"></script>
</head>

<body>
    <div>
        <h1 id="title">
            Weekmenu
            <a href="../Homepage/Homepage.php"><img id="logo" align="right" src="./Photos/Icons/calendar-days.svg" alt="Geen foto beschikbaar"></a>
        </h1>
    </div>
    <hr />
    <p class="Intro">Dit is een overzicht van je week</p>
    <hr />
    <button class="hamburger" type="button" onclick="verberg()"><img src="../Algemene files/Algemen iconen/menu.svg" alt="$"></button>
    <ul id="nav">
        <li id="top"><a href="../Homepage/Homepage.php">HOME</a></li>
        <li><a href="../Mijn Koelkast/Mijn_Koelkast.php">MIJN KOELKAST</a></li>
        <li id="active"><a href="../Weekmenu/Weekmenu.php">WEEKMENU</a></li>
        <li><a href="../Boodschappenlijst/Boodschappenlijst.php">BOODSCHAPPENLIJST</a></li>
        <li id="bottom"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
    </ul>
    <div class="artikel">
        <div id="Recepten_block">
            <ul>
                <?php
                require_once("../Algemene files/DatabaseConnectie.php");
                $conn->select_db("AntiFoodwaste");

                $sql = "SELECT ReceptID,ReceptNaam,ReceptImage from recepten where ReceptID NOT IN (SELECT ReceptID from weekmenu)
                 AND InlogID like $userid ;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                            <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\" id=\"foto".$row["ReceptID"]."\">
                            <div><p>" . $row["ReceptNaam"] . "</p></div>
                            <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenAanpassen.php\" method=\"POST\">
                                <select name=\"Dagen\" id=\"\" onchange=\"DagenSelect" . $row["ReceptID"] . ".submit()\">
                                    <option disabled selected value>DAG</option>
                                    <Option value=\"MA\">MA</Option>
                                    <Option value=\"DI\">DI</Option>
                                    <Option value=\"WO\">WO</Option>
                                    <Option value=\"DO\">DO</Option>
                                    <Option value=\"VR\">VR</Option>
                                    <Option value=\"ZA\">ZA</Option>
                                    <Option value=\"ZO\">ZO</Option>
                                    <Option style=\"color:red;\" value=\"DEL\">DEL</Option>
                                </select>
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                            </form>
                            </li>";
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
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='MA'  AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='DI' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='WO' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='DO' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='VR' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='ZA' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    require_once("../Algemene files/DatabaseConnectie.php");
                    $conn->select_db("AntiFoodwaste");

                    $sql = "SELECT r.ReceptNaam,r.ReceptID,ReceptImage from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='ZO' AND w.InlogID like $userid; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class=\"Recept\" id=" . $row["ReceptID"] . ">
                                <img src=\"" . $row["ReceptImage"] . "\" alt=\"" . $row["ReceptNaam"] . "\">
                                <div><p>" . $row["ReceptNaam"] . "</p></div>
                                <form name=\"DagenSelect" . $row["ReceptID"] . "\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                    <input type=\"hidden\"  name=\"ReceptID\" value=\"" . $row["ReceptID"] . "\"/>
                                    <button type=\"submit\">DEL</button>
                                </form>
                                </li>";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    
</body>

</html>