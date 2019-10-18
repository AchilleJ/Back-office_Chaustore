<?php
require_once('../../php/connectDB.php');

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Reset password</title>
</head>
<body>
    <h1>Reset password</h1>
    <h3>Entrer votre adresse mail et un code de vérification sera envoyé</h3>
    <form method="post" action="reset_password.php">
        <p>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
        </p>
        <p>
            <label for="password">Nouveau mot de passe</label>
            <input type="password" id="password" name="new_password">
        </p>
        <input type="submit" value="Sign in">
    </form>
    <a href="index.php">retour</a>
    <?php 

        if(!empty($_POST)){

            $email=$_POST['email'];
            $sql = "SELECT email from user where email = '$email'";
            $result = $conn->query($sql) or die (mysqli_error($conn));
            $row = $result->fetch_row();

            $msg = "";

            if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $msg .= "- Entrer un email.<br/>";
            }

            elseif(empty($row[0])){                     // row est vide = email existe pas 
                $msg .= "- Cette email n'est associé à aucun compte.<br/>";
            }

            if(empty($_POST['password'])){
                $msg .= "- Entrer un mot de passe.<br/>";
            }

            if(!empty($msg)){
                $msg = "Erreur. Veuillez vérifier votre saisie :<br/>".$msg;
                ?>
                <p><?php echo $msg; ?></p>
                <?php
            
            } else {
                $code = rand(1000,9999);
                echo $code;
                echo("<p>un code de vérification viens de vous être envoyé par mail<p>");
            }
    } ?>

</body>
</html>