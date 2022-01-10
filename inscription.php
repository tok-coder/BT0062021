<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
    @$tel=$_POST["tel"];
    @$mail=$_POST["mail"];
	@$pass=sha1($_POST["pass"]);
	@$pass2=sha1($_POST["pass2"]);
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li>Nom invalide!</li>";
		if(empty($prenom)) $message.="<li>Prénom invalide!</li>";
        if(empty($tel)) $message.="<li>telephone invalide!</li>";
        if(empty($mail)) $message.="<li>mail invalide!</li>";
		if(empty($pass)) $message.="<li>Mot de passe invalide!</li>";
		if($pass!=$pass2) $message.="<li>Vous n'avez pas tapé le meme mot de passe!</li>";	
		if(empty($message)){
			include("connexion.php");
			$req=$sdb->prepare("select id from utilisateur where email=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$tab=$req->fetchAll();
			if(count($tab)>0)
				$message="<li>cette adresse existe déjà!</li>";
			else{
				$photo=$_FILES['img']['name'];
    $upload="picture/".$photo;
    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
				$sql = "INSERT INTO utilisateur(prenom,nom,telephone,email,motdepasse,avatar,date) VALUES ('$prenom','$nom','$tel','$mail','$pass','$photo',now())";
				$preparation = $sdb->prepare($sql);
    if ($preparation->execute([':prenom' => $prenom,':nom' => $nom,':telephone' => $tel,':email' => $mail,':motdepasse' => $pass,':avatar' => $photo ])) {
        header("location:index.php");
    }
    else {
        $message = "une erreur s'est produite<br>";
    }

        
				
				
			}
		}
	}
?>
<!DOCYTPE html>
<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="inscription.css">
<link rel="stylesheet" href="w3.css">
	</head>
	<body>
		<header>
		
			<style>
				body {
  background-image: url('imageb.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
#message{

background-color: red;
}
			</style>			
		</header>
		<main>
		<div class="w3-container w3-xlarge">
			<a href="login.php" class="w3-bar-item w3-button w3-white w3-right">Déja inscrit</a></div>
		<form method="post" action="" enctype="multipart/form-data">
		
        <h1> Inscription </h1>
            
                <label>Prénom</label><br>
                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom?>" ><br>
           
                <label>Nom</label><br>
                <input type="text" name="nom" id="nom" value="<?php echo $nom?>" ><br>
           
                <label>Telephone</label><br>
                <input type="number" name="tel" id="tel"value="<?php echo $tel?>" ><br>
            
                <label>Email</label><br>
                <input type="email" name="mail" id="mail" value="<?php echo $mail?>" ><br>
            
                <label>Mot de passe</label><br>
                <input type="password" name="pass" id="pass"><br>
            
           
                <label>Confirmation du mot de passe</label><br>
                <input type="password" name="pass2" id="pass2"><br>
            
				<label>Ajouter votre Photo de profil</label><br>
			<input type="file" name="img" id="img"><br><br>

			<input type="submit" name="valider" id="valider"value="S'inscrire" />
        
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
		
			</main>
	</body>
</html>