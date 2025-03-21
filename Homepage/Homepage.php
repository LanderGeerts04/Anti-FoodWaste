<?php

session_start();
if (!isset($_SESSION['email'])){
  header("location: ../login/index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <title>Homepage</title>
    <link href="Homepage.css" rel="stylesheet" />
</head>
<body>
    <h1>Home</h1>
    <hr/>
    <div class="logoutHolder">
      <div class="logout" onclick="window.location.href='../login/logout.php'">
        <img src="./Photos/log-out.svg" class="logging">
        Logout
      </div>
    </div>
    <div class="knoppen">
      <div id="knop">
        <a class="knop" id="koelkast" href="../Mijn Koelkast/Mijn_Koelkast.php">
          <img
            class="menulogos"
            src="../Mijn Koelkast/Photos/Icons/refrigerator.svg"
            alt="$"/>Mijn Koelkast</a>
      </div>
      <div id="knop">
        <a class="knop" id="menu" href="../Weekmenu/Weekmenu.html">
          <img
            class="menulogos"
            src="../Weekmenu/Photos/Icons/calendar-days.svg"
            alt="$"/>Weekmenu</a>
      </div>
      <div id="knop">
        <a class="knop" id="boodschappen" href="../Boodschappenlijst/Boodschappenlijst.html">
          <img
            class="menulogos"
            src="../Boodschappenlijst/Photos/list-check.svg"
            alt="$"/>Boodschappenlijstje</a>
      </div>
      <div id="knop">
        <a class="knop" id="recept" href="../Recepten/recepten.html">
          <img
            class="menulogos"
            src="../Recepten/Photos/cooking-pot.svg"
            alt="$"/>Recepten</a>
      </div>
     </div>
</body>
</html>