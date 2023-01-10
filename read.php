<?php


include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
// echo $dsn;exit();
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "Er is een verbinding met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden"; 
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT Id
,Merk
,Model
,Topsnelheid
,Prijs
FROM dureauto";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$tableRows = "";

foreach($result as $info) {
    $tableRows .= "<tr>
                        <td>$info->Id</td>
                        <td>$info->Merk</td>
                        <td>$info->Model</td>
                        <td>$info->Topsnelheid</td>
                        <td>$info->Prijs</td>
                        <td>
                            <a href='delete.php?Id=$info->Id'>
                            <img src='b_drop.png' alt='cross'>
                            </a>
                         </td>   
                   </tr>";
}


?>
  <h3>De vijf duurste auto's ter wereld</h3>
    <a href="index.php">
        <input type="button" value="Maak een nieuw record">
    </a>

<br><br>
<table border='1'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>`
        <th>Delete</th>
        <th>Edit</th>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>