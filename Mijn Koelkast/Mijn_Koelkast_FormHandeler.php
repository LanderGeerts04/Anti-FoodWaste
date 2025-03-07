<?php
session_start();
require_once '../Algemene files/DatabaseConnectie.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $naam = $_POST["Naam"];
        $stmt = $conn->prepare("SELECT g.Naam FROM groenten g WHERE g.Naam LIKE '?'; ");
        $stmt->bindParam("si",$naam);
        $stmt->execute();
        
        $results = $stmt->fetchALL(mysqli::FETCH_ASSOC);

        $conn=null;
        $stmt = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dit is een test</title>
</head>
<body>
    
    <h3>Dit is het resultaat</h3>

    <?php
        if(empty($results)){
            echo "<p>Geen resultaten</p>";
        }
        else{
            var_dump($results);
        }
    ?>

</body>
</html>