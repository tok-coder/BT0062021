<?php
include("../includes/connexion.php");

if(isset($_GET['token']) && $_GET['token'] != '')
{
    $stmt = $sdb->prepare('select email from utilisateur where token= ?');
    $stmt->execute([$_GET['token']]);
    $email=$stmt->fetchColumn();
echo $email;
    if($email)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recuperation du mot de passe</title>
        </head>
        <body>
            <form method="POST">
             <label for="newPassword">Nouveau mot de passe</label>
             <input type="password" name="newPassword">
             <input type="submit" value="confirmer">
            </form>
        </body>
        </html>
        <?php
    }
}
if(isset($_POST['newPassword']))
{
    $hashedPassword = sha1($_POST['newPassword']);

    $sql = "UPDATE utilisateur SET motdepasse = ?,token = NULL WHERE email = ?";
    $stmt = $sdb->prepare($sql);
    if($stmt->execute([$hashedPassword,$email]));
    echo"Mot de passe modifié avec succé";
    
}
?>