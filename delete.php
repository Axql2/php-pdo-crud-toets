<?php

// Voeg de databasegegevens
require('config.php');

// maak de $dsn 
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    // maak een nieuw pdo object voor verbinding met de database
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "er is een verbinding met de database gemaakt";
    } else {
        echo "Server-error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}

// Maak een sql query die het record gaat verwijderen uit de database
$sql = "DELETE FROM dureauto
    WHERE Id = :Id;";

//preparer de querey zodat we da waarde van id kunnen kopellen aan de placehoder :Id
$statement = $pdo->prepare($sql); 

// Bind de value aan de placeholder
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3;  url=read.php');
} else {
    echo "Error het record is niet verwijderd";
}