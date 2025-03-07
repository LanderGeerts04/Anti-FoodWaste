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
      <li id="top"><a href="/Homepage/Homepage.html">HOME</a></li>
      <li id="active"><a href="./Mijn_Koelkast.html">MIJN KOELKAST</a></li>
      <li><a href="../Weekmenu/Weekmenu.html">WEEKMENU</a></li>
      <li><a href="/Boodschappenlijst/Boodschappenlijst.html">BOODSCHAPPENLIJST</a></li>
      <li id="bottom"><a href="#Recepten">RECEPTEN</a></li>
    </ul>
    <div id="zoekbalk">
      <form action="./Mijn_Koelkast_FormHandeler.php" method="POST">
        <input type="text" name="Naam" class="zoek" id="zoekbalk_mijn_koelkast" placeholder="Zoek hier">
        <input type="submit" name="submitknop" class="zoek" id="submitknop" value="ZOEK">
      </form>
    </div>
    <div id="keuzemenu">
      <a class="knop" id="groenten" href="./Subpagina's/Groenten.html">
        <img class="menulogos" src="./Photos/Icons/carrot.svg" alt="$"/>
        Groenten
      </a>
      <a class="knop" id="melk" href="./Subpagina's/Zuivel.html">
        <img class="menulogos" src="./Photos/Icons/egg.svg" alt="$"/>
        Zuivel
      </a>
      <a class="knop" id="fruit" href="./Subpagina's/Fruit.html">
              <img class="menulogos" src="./Photos/Icons/apple.svg" alt="$"/>
              Fruit
      </a>
      <a class="knop" id="graan" href="./Subpagina's/Deegwaren.html">
        <img class="menulogos" src="./Photos/Icons/wheat.svg" alt="$"/>
        Deegwaren
      </a>
      <a class="knop" id="vleesvis" href="./Subpagina's/Vlees_en_vis.html">
        <img class="menulogos" src="./Photos/Icons/ham.svg" alt="$"/>
        Vlees en vis
      </a>
      <a class="knop" id="rest" href="./Subpagina's/Overige_producten.html">
        <img class="menulogos" src="./Photos/Icons/chef-hat.svg" alt="$"/>
        Diversen
      </a>
    </div>
  </body>
</html>
