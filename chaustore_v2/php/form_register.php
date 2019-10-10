<?php
require_once('../../php/connectDB.php');?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Chaustore register form</title>
</head>
<body>
    <h1>Chaustore register form</h1>

    <form method="post" action="form_register.php">
        <p>
            <label for="firstname">Your firstname</label>
            <input type="text" id="fisrtname" name="firstname" value="<?php if(!empty($_POST['firstname'])) echo $_POST['firstname'];?>">
        </p>
        <p>
            <label for="lastname">Your lastname</label>
            <input type="text" id="lastname" name="lastname" value="<?php if(!empty($_POST['lastname'])) echo $_POST['lastname'];?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </p>
        <input type="submit" value="Create your account">
    </form>
    <?php

    if(!empty($_POST)){
        $msg = "";
      
        if(empty($_POST['firstname'])){
            $msg .= "- Enter your firstname.<br/>";
        }

        if(empty($_POST['lastname'])){
            $msg .= "- Enter your lastname.<br/>";
        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= "- Enter a correct email.<br/>";
        }

        if(empty($_POST['password'])){
            $msg .= "- Enter your password.<br/>";
        }

        if(!empty($msg)){
            $msg = "Erreur. Veuillez vérifier votre saisie :<br/>".$msg;
            ?>
            <p><?php echo $msg; ?></p>
            <?php } 

        else {

            $sql = "INSERT INTO user (
                    firstname, 
                    lastname, 
                    email,
                    password)
                    VALUES (
                    '".$_POST['firstname']."', 
                    '".$_POST['lastname']."', 
                    '".$_POST['email']."',
                    '".password_hash($_POST['password'], PASSWORD_DEFAULT)."'
                    )";
            
        
            $result = $conn->query($sql);

            if($result){
                $msg = "Thanks"." ".$_POST['firstname'].", Your account has been created";
                ?> <p><?php echo $msg; ?></p> <?php
            }

            else if (mysqli_errno($conn) == 1062) {    //1062 = numero de l'erreur lié au doublon
                $msg = "Email address already in use";
                ?> <p><?php echo $msg; ?></p> <?php  
            }

            else {
                $msg = "An error occured please try again later";
                ?> <p><?php echo $msg; ?></p> <?php
            }
        }
    }

?>
</body>
</html>
