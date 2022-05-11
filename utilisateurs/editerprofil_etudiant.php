<?php
    session_start();

	include('../includes/connexion.php');	
    
 
		if(isset($_SESSION['id'])){
			$role = $sdb->prepare('SELECT * FROM utilisateur WHERE id = ?');
			$role->execute(array($_SESSION['id']));
			$user=$role->fetch();
if(isset($_POST['prenom2']) AND !empty($_POST['prenom2']))
        {
            $prenom2=htmlspecialchars($_POST['prenom2']);
            $updatprenom=$sdb->prepare('UPDATE utilisateur SET prenom = ? WHERE id = ?');
            $updatprenom->execute(array($prenom2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['nom2']) AND !empty($_POST['nom2']) )
        {
            $nom2=htmlspecialchars($_POST['nom2']);
            $updatnom=$sdb->prepare('UPDATE utilisateur SET nom = ? WHERE id = ?');
            $updatnom->execute(array($nom2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['tel2']) AND !empty($_POST['tel2']) )
        {
            $tel2=htmlspecialchars($_POST['tel2']);
            $updattel=$sdb->prepare('UPDATE utilisateur SET telephone = ? WHERE id = ?');
            $updattel->execute(array($tel2,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
           if(isset($_POST['mail2']) AND !empty($_POST['mail2']))
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
            if(isset($_POST['naissance']) AND !empty($_POST['naissance']))
        {
            $naissance=htmlspecialchars($_POST['naissance']);
            $updatnaiss=$sdb->prepare('UPDATE utilisateur SET date_naissance = ? WHERE id = ?');
            $updatnaiss->execute(array($naissance,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['adresse']) AND !empty($_POST['adresse']))
        {
            $adr=htmlspecialchars($_POST['adresse']);
            $updatadr=$sdb->prepare('UPDATE utilisateur SET adresse = ? WHERE id = ?');
            $updatadr->execute(array($adr,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['genre']) AND !empty($_POST['genre']))
        {
            $genre=htmlspecialchars($_POST['genre']);
            $updatgenre=$sdb->prepare('UPDATE utilisateur SET genre = ? WHERE id = ?');
            $updatgenre->execute(array($genre,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
        }
        if(isset($_POST['niveau']) AND !empty($_POST['niveau']))
        {
            $niveau=htmlspecialchars($_POST['niveau']);
            $updatniveau=$sdb->prepare('UPDATE utilisateur SET niveau_etude = ? WHERE id = ?');
            $updatniveau->execute(array($niveau,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../style/inscription.css" />
        <link rel="stylesheet" type="text/css" href="../style/w3.css" />
        
        <style>
            body{
                background-image:url(../img/image39.jpg);
    background-size: cover;
}
.inner{
    background-color:rgba(0, 0, 0, 0.5);
    height:90vh;
    margin-left: 300px;
    margin-right: 350px;
   border-radius:30px; 
}
#section{
    position:relative;
    left: 5px;
}
section{
    display:inline-block;
}
h1{
    position: relative;
    right:20px;
}
#valider{
    position: relative;
    left:10px;
    top:20px;
}
        </style>
	</head>
	<body>
		
		<div class="inner">
			
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>Editer mon profil <i class= "fa fa-edit"></i></h1>
                <div id="section">
                <section>
                <label for="prenom2">Prenom</label><br>
                <input type="text" name="prenom2" id="prenom" value="<?php echo $user['prenom'];?>"><br><br>
                <label for="tel2">Telephone</label><br>
                <input type="number" name="tel2" id="tel" value="<?php echo $user['telephone'];?>"><br><br>
                <label for="pass2">Mot de passe</label><br>
                <input type="password" name="pass2" id="pass" placeholder="Mot de passe à modifier"><br><br>
                <label for="nom2">Date de naissance</label><br>
                <input type="date" name="naissance" id="nom" value="<?php echo $user['date_naissance'];?>"><br><br>
                <label for="nom2">Genre</label><br>
                <select type="text" name="genre" id="nom">
							<option value="" disabled selected><?php echo $user['genre'];?></option>
							<option value="Homme">Homme</option>
							<option value="Femme">Femme</option>
							<option value="Autre">Autre</option>
						</select><br><br>

                </section>

                <section>
                <label for="nom2">nom</label><br>
                <input type="text" name="nom2" id="nom" placeholder="nom à modifier" value="<?php echo $user['nom'];?>"><br><br>
                <label for="mail2">Mail</label><br>
                <input type="email" name="mail2" id="mail" value="<?php echo $user['email'];?>" desabled><br><br>
                <label for="repass2">confirmer le mot de passe</label><br>
                <input type="password" name="repass2" id="pass2" placeholder="confirmation"> <br><br>
                <label for="nom2">Adresse</label><br>
                <input type="text" name="adresse" id="nom" value="<?php echo $user['adresse'];?>"><br><br>
                <label for="nom2">Niveau d'etude</label><br>
                <select type="text" name="niveau" id="nom">
							<option value="" disabled selected><?php echo $user['niveau_etude'];?></option>
							<option value="Bac">Bac</option>
							<option value="L1">L1</option>
							<option value="L2">L2</option>
							<option value="L3">L3</option>
							<option value="M1">M1</option>
							<option value="M2">M2</option>
							
						</select><br><br>

                </section>
                </div>
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