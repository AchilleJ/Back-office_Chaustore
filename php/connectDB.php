<?php

$conn = mysqli_connect('localhost', 'chaustore', 'ZlpÄÐ:;6F{n7O{pV') or die('Erreur le connexion au SGBD.');
mysqli_select_db($conn,'simplon_chaustore') or die('La base de données n\'existe pas');
mysqli_set_charset($conn,'utf8');

?>