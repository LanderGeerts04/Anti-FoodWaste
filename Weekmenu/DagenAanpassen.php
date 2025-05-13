<?php
session_start();
$userid = $_SESSION["user_id"];
require_once '../Algemene files/DatabaseConnectie.php';
$conn->select_db("AntiFoodwaste");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Dagen"])&& isset($_POST["ReceptID"])) {
        $dagen=$_POST["Dagen"];
        $receptID=$_POST["ReceptID"];
        if($dagen=="DEL")
        {
            $stmt=$conn->prepare("DELETE FROM recepten WHERE ReceptID LIKE ?");
            $stmt->bind_param("i",$receptID);
            $stmt->execute();
            $stmt->close();
        }
        else
        {
            $stmt=$conn->prepare("INSERT into weekmenu (Day,ReceptID,InlogID) VALUES(?,?,?)");
            $stmt->bind_param("sii",$dagen,$receptID,$userid);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        echo "Niet alle velden zijn ingevuld!";
        header("Location: ./Weekmenu.php");
    }
}
$conn->close();
header("Location: ./Weekmenu.php");