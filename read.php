<?php
$dsn = "mysql:host=localhost;dbname=php-pdo-crud-toets;charset=UTF8";

try {
    $pdo = new PDO($dsn, "root", "");
    if ($pdo) {
        echo "Er is een verbinding met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden"; 
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}





?>