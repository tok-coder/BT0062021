<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
</head>
<body>
<p>
    <form class="w3-container" action="" method="POST">
                <label>Email</label>
                <input class="w3-input" type="email" name="email" placeholder="veuillez entrer votre adresse mail s'il vous plait" >
            </p>
            <input type="submit" name="login" id="login" value="Envoyez moi un token">
    </form>
</body>
</html>
<?php
/*if(isset($_POST['login'])){
include("includes/connexion.php");
			$req=$sdb->prepare("select id from utilisateur where email=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($_POST['email']));
			$tab=$req->fetchAll();
			if(count($tab)>0){
            //$query=$sdb->prepare('SELECT * FROM utilisateur');
                               // $query->execute();
                               // while($data=$query->fetch())
                                
				header("location:form.php?id=".$tab[0]['id']);
            }
            else
            echo"vous n'avez pas été inscrit";
        }*/
        /*if(isset($_POST['login'])){
            include("includes/connexion.php");
                        $req=$sdb->prepare("select id from utilisateur where email=? limit 1");
                        $req->setFetchMode(PDO::FETCH_ASSOC);
                        $req->execute(array($_POST['email']));
                        $tab=$req->fetchAll();
                        if(count($tab)>0){
        if(isset($_POST['email']))
{
  $password = uniqid();
  $hashedPassword = sha1($password);

  $message ="Bonjour, voici votre nouveau mot de passe: $password";
  $headers="MIME-Version: 1.0\r\n";
  $headers.='From:"BT0062021"<mbodjkhadija308@gmail.com>'."\n";
  $headers.='content-type: text/plain; charset="uft-8"'." ";
  if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
  {
    $sql = "UPDATE utilisateur SET motdepasse = ? WHERE email = ?";
    $stmt = $sdb->prepare($sql);
    $stmt->execute([$hashedPassword,$_POST['email']]);
    echo "Mail envoyé";
  }
  else
  {
    echo "Une erreur est survenue";
  }
}}
else {
    echo"Vous n'etes pas encore incrit inscrit";
}}*/
if(isset($_POST['login'])){
  include("includes/connexion.php");
              $req=$sdb->prepare("select id from utilisateur where email=? limit 1");
              $req->setFetchMode(PDO::FETCH_ASSOC);
              $req->execute(array($_POST['email']));
              $tab=$req->fetchAll();
              if(count($tab)>0){
if(isset($_POST['email']))
{
$token = uniqid();
$url="http://localhost/POO/BT0062021/token?token=$token";

$message ="Bonjour, voici votre lien pour la réinitialisation du mot de passe : $url";
$headers="MIME-Version: 1.0\r\n";
$headers.='From:"BT0062021"<mbodjkhadija308@gmail.com>'."\n";
$headers.='content-type: text/plain; charset="uft-8"'." ";
if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
{
$sql = "UPDATE utilisateur SET token = ? WHERE email = ?";
$stmt = $sdb->prepare($sql);
$stmt->execute([$token,$_POST['email']]);
echo "Mail envoyé";
}
else
{
echo "Une erreur est survenue";
}
}}
else {
echo"Vous n'etes pas encore incrit inscrit";
}}
    ?>