<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <h1>Chaustore management</h1>
    <h2>choose what you want to manage:</h2>
    <div class="forms">
        <form class="forms_submit" method="post" action="php/management.php">
            <input name="choice" type="submit" value="Brand">
            <input name="choice" type="submit" value="Color">
            <input name="choice" type="submit" value="Size">
            <input name="choice" type="submit" value="Category">
            <input name="choice" type="submit" value="Product"> 
            <input name="choice" type="submit" value="Stock">  
        </form>
    </div>




    <!-- formulaire pour afficher automatiquement un nombre de inputs correspondant au nombre de champ d'une table elle meme choisis par un autre formulaire (non utilisé)  
    <form method="post" action="">
        <input type="text" name="table">
        <p><input type="submit" value="OK"></p>

        <?php
        /*
        if (!empty($_POST['table'])){
            $table = $_POST['table'];
        }
        ?> 
    </form>
	<form method="post" action="">
        <?php
        if (!empty($_POST['table'])){
            $sql = 'describe' ." ". $table;
            $req = mysqli_query($conn,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($conn)); 
            while($row = mysqli_fetch_array($req)){		
        	   echo '<input name="'.$row[0].'">'.$row[0].'</input>';	      // on affiche chaque champ
            }
            mysqli_free_result ($req); 

            require_once('php/add.php');
        }
        */
        ?>

  		<p><input type="submit" value="OK"></p>
    </form>
    -->
</body>
</html>