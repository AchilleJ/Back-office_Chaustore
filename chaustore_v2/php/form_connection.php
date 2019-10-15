<?php
require_once('../../php/connectDB.php');?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Chaustore connection form</title>
</head>
<body>
    <h1>Chaustore connection form</h1>

    <form method="post" action="form_connection.php">
        <p>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </p>
        <input type="submit" value="Sign in">
    </form>
    <a href="index.php">retour</a>
    <?php

    if(!empty($_POST)){
       	$msg = "";

    	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= "- Enter a correct email.<br/>";
        }

        if(empty($_POST['password'])){
            $msg .= "- Enter a password.<br/>";
        }

        if(!empty($msg)){
            $msg = "Erreur. Veuillez vérifier votre saisie :<br/>".$msg;
            ?>
            <p><?php echo $msg; ?></p>
            <?php

        } else {
	    	$password_written = $_POST['password'];
	    	$sql = "SELECT password
	    			from user
	    			where email = '{$_POST['email']}'";
	    	$result = $conn->query($sql) or die (mysqli_error($conn));
	    	$row = $result->fetch_row();
	    	$original_password = $row[0];
	    	if (password_verify($password_written, $original_password)) {	//compare le mot de passe ecrit avec la version hacher dans la base
	    		echo "Connection accepted";

	    	} else {
	    		echo "Password or email is not correct";	
	    	}


    	}
    }

