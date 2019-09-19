<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="php/add.php">
        <?php
        //On se connecte
		$conn = mysqli_connect('localhost', 'chaustore', 'ZlpÄÐ:;6F{n7O{pV');
		mysqli_select_db($conn,'simplon_chaustore');
		mysqli_set_charset($conn,'utf8');
        $sql = 'describe color;';
		/*on impose un message d'erreur si la requête ne passe pas (or die) */
        $req = mysqli_query($conn,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 

        while($row = mysqli_fetch_array($req)){		 //On scanne le résultat et on construit chaque option avec
        	echo '<input name="'.$row[0].'" required>'.$row[0].'</input>';	      // on affiche chaque champ
        }
        mysqli_free_result ($req); 
        ?>
  		<p><input type="submit" value="OK"></p>
    </form>

</body>
</html>