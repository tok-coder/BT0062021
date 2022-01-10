<?php
    session_start();

	include('connexion.php');	

 
		if(isset($_SESSION['id'])){
			$role = $sdb->prepare('SELECT * FROM utilisateur WHERE id = ?');
			$role->execute(array($_SESSION['id']));
			$user=$role->fetch();
if(isset($_POST['prenom2']) AND !empty($_POST['prenom2']) AND $_POST['prenom2'] != $user['prenom'])
        {
            $prenom2=htmlspecialchars($_POST['prenom2']);
            $updatprenom=$sdb->prepare('UPDATE utilisateur SET prenom = ? WHERE id = ?');
            $updatprenom->execute(array($prenom2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['nom2']) AND !empty($_POST['nom2']) AND $_POST['nom2'] != $user['nom'])
        {
            $nom2=htmlspecialchars($_POST['nom2']);
            $updatnom=$sdb->prepare('UPDATE utilisateur SET nom = ? WHERE id = ?');
            $updatnom->execute(array($nom2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['tel2']) AND !empty($_POST['tel2']) AND $_POST['tel2'] != $user['Telephone'])
        {
            $tel2=htmlspecialchars($_POST['tel2']);
            $updattel=$sdb->prepare('UPDATE utilisateur SET telephone = ? WHERE id = ?');
            $updattel->execute(array($tel2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
           if(isset($_POST['mail2']) AND !empty($_POST['mail2']) AND $_POST['mail2'] != $user['email'])
            {
                $mail2=htmlspecialchars($_POST['mail2']);
                $req=$sdb->prepare("select id from utilisateur where email=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail2));
			$tab=$req->fetchAll();
			if(count($tab)>0)
				$message="<li>cette adresse existe déjà!</li>";
			else{
                
                $updatmail=$sdb->prepare('UPDATE utilisateur SET email = ? WHERE id = ?');
               $updatmail->execute(array($mail2,$_SESSION['id']));
                header("location:user.php?id=" .$_SESSION["id"]);
            }}

            if(isset($_POST['pass2']) AND !empty($_POST['pass2']) AND isset($_POST['repass2']) AND !empty($_POST['repass2']))
            {
                $pass2= sha1($_POST['pass2']);
                $repass2= sha1($_POST['repass2']);

                if($pass2==$repass2)
                {
                    $updatpass2=$sdb->prepare('UPDATE utilisateur SET motdepasse = ? WHERE id = ?');
                    $updatpass2->execute(array($pass2,$_SESSION['id']));
                    header("location:user.php?id=" .$_SESSION["id"]);

                }
                else{
                    $msg='Vos deux mots de passe ne sont pas identiques';
                }  
            }
            /*if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
            {
                $tailleMax = 2097152;
                $extensionValides = array('jpg','jpeg','gif','png');
                if($_FILES['avatar']['size'] <= $tailleMax)
                {
                 $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'), 1));
                 if(in_array($extensionUpload,$extensionValides))
                 {
                    $chemin = "utilisateur/avatars/".$_SESSION['id'].".".$extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmt_name'],$chemin);
                    if($resultat)
                    {
                      $updateavatar = $sdb->prepare("UPDATE utilisateur SET avatar = :avatar WHERE id = :id");
                      $updateavatar->execute(array(
                        'avatar' => $_SESSION['id'].".".$extensionUpload,
                        'id' => $_SESSION['id']
                      ));
                      header("location:user.php?id=" .$_SESSION["id"]);
                    }
                    else {
                     $msg = "il y'a une erreur en important le fichier";
                    }
                 }
                 else {
                     $msg = "votre photo de profil doit etre en format jpg, jpeg, gif ou png";
                 }
                }
                else {
                    $msg = "Votre photo de profil ne doit pas depasser 2Mo";
                }
            }*/
        
			?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="inscription.css" />
        <style>
            body{
    background: url("image16.jpg") fixed no-repeat top right, url("image16.jpg") fixed;
}
        </style>
	</head>
	<body>
		
		<div>
			
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>Editer mon profil</h1>
                <label for="prenom2">Prenom</label><br>
                <input type="text" name="prenom2" id="prenom" placeholder="Prenom à modifier" value="<?php echo $user['prenom'];?>"><br><br>
                <label for="nom2">nom</label><br>
                <input type="text" name="nom2" id="nom" placeholder="nom à modifier" value="<?php echo $user['nom'];?>"><br><br>
                <label for="tel2">Telephone</label><br>
                <input type="number" name="tel2" id="tel" placeholder="tele à modifier" value="<?php echo $user['telephone'];?>"><br><br>
                <label for="mail2">Mail</label><br>
                <input type="email" name="mail2" id="mail" value="<?php echo $user['email'];?>" desabled><br><br>
                <label for="pass2">Mot de passe</label><br>
                <input type="password" name="pass2" id="pass" placeholder="Mot de passe à modifier"><br><br>
                <label for="repass2">confirmer le mot de passe</label><br>
                <input type="password" name="repass2" id="pass2" placeholder="confirmation" ><br><br>

                <input type="submit" name="miseajour" id="valider" value="Mettre à jour">
                
            </form>
			<?php
            if(isset($msg))
                {
                 echo $msg;
                }
             ?>
		</div>
        
	</body>
</html>
<?php
}
else {
    header('login.php');
}
?>