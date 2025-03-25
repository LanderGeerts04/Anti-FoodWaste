<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekmenu</title>
    <link rel="stylesheet" href="./Weekmenu.css">
    <script src="../Algemene files/Navigatieverberg.js"></script>
    <script src="../Algemene files/Draging.js"></script>
    <script src="../Weekmenu/Dragchange.php"></script>
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
        <li id="active"><a href="../Weekmenu/Weekmenu.php">WEEKMENU</a></li>
        <li><a href="../Boodschappenlijst/Boodschappenlijst.php">BOODSCHAPPENLIJST</a></li>
        <li id="bottom"><a href="../Recepten/recepten.php">RECEPTEN</a></li>
    </ul>
    <div id="Recepten_block">
        <ul>
            <?php
            require_once("../Algemene files/DatabaseConnectie.php");
            $conn->select_db("AntiFoodwaste");

            $sql = "SELECT ReceptID,ReceptNaam from recepten where ReceptID NOT IN (SELECT ReceptID from weekmenu);";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                        <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                        <p>".$row["ReceptNaam"]."</p>
                        <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenAanpassen.php\" method=\"POST\">
                            <select name=\"Dagen\" id=\"\" onchange=\"DagenSelect".$row["ReceptID"].".submit()\">
                                <option disabled selected value>DAG</option>
                                <Option value=\"MA\">MA</Option>
                                <Option value=\"DI\">DI</Option>
                                <Option value=\"WO\">WO</Option>
                                <Option value=\"DO\">DO</Option>
                                <Option value=\"VR\">VR</Option>
                                <Option value=\"ZA\">ZA</Option>
                                <Option value=\"ZO\">ZO</Option>
                            </select>
                            <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='MA'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='DI'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='WO'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='DO'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='VR'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='ZA'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
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

                $sql = "SELECT r.ReceptNaam,r.ReceptID from recepten r INNER JOIN weekmenu w ON (r.ReceptID=w.ReceptID) WHERE w.Day='ZO'; ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class=\"Recept\" id=".$row["ReceptID"].">
                            <img src=\"./Photos/Spaghetti.avif\" alt=\"Spaghetti\">
                            <p>".$row["ReceptNaam"]."</p>
                            <form name=\"DagenSelect".$row["ReceptID"]."\" action=\"./DagenTerugzetten.php\" method=\"POST\">
                                <input type=\"hidden\"  name=\"ReceptID\" value=\"".$row["ReceptID"]."\"/>
                                <button type=\"submit\">DEL</button>
                            </form>
                            </li>";
                    }
                }
                ?>  
            </td>
        </tr>
    </table>
</body>
</html>