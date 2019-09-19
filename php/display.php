<?php
require_once('connectDB.php');

$sql = 'select * from modele;'; 

$req = mysqli_query($conn, $sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysqli_error($conn));


while ($row = mysqli_fetch_array($req)) {
    echo($row[0]." ". $row[1]."<br>");
}

mysqli_free_result ($req);
?>