<?php
include("includes/headerins.php");

	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
    @$tel=$_POST["tel"];
    @$mail=$_POST["mail"];
    @$specialite=$_POST["specialite"];
    @$grade=$_POST["grade"];
	@$adresse=$_POST["adresse"];
	@$naissance=$_POST["naissance"];
	@$genre=$_POST["genre"];
	@$pass=sha1($_POST["pass"]);
	@$pass2=sha1($_POST["pass2"]);
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="Nom invalide!!!";
		if(empty($prenom)) $message.="Prénom invalide!!!";
        if(empty($specialite)) $message.="specialité invalide!!!";
        if(empty($grade)) $message.="grade invalide!!!";
        if(empty($tel)) $message.="telephone invalide!!!";
        if(empty($mail)) $message.="mail invalide!!!";
		if(empty($pass)) $message.="Mot de passe invalide!!!";
		if(empty($pass2)) $message.="Mot de passe invalide!!!";
		if(empty($adresse)) $message.="Adresse invalide!!!";
		if(empty($naissance)) $message.="Date de naissance invalide!!!";
		if(empty($genre)) $message.="genre invalide invalide!!!";
		if($pass!=$pass2) $message.="Vous n'avez pas tapé le meme mot de passe!!!";	
		if(empty($message)){
			include("includes/connexion.php");
			$req=$sdb->prepare("select id_formateur from formateur where mail=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$tab=$req->fetchAll();
			if(count($tab)>0)
				$message="<li>cette adresse existe déjà!</li>";
			else{
				$photo=$_FILES['img']['name'];
    $upload="picture/".$photo;
    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
				$sql = "INSERT INTO formateur(nom,prenom,specialite,grade,date_naissance,tel,adresse,mail,genre,motdepasse,date_inscription,avatar) VALUES ('$nom','$prenom','$specialite','$grade','$naissance','$tel','$adresse','$mail','$genre','$pass',now(),'$photo')";
				$preparation = $sdb->prepare($sql);
    if ($preparation->execute([':prenom' => $prenom,':nom' => $nom,':specialite' => $specialite,':grade' => $grade,':telephone' => $tel,':email' => $mail,':motdepasse' => $pass,':avatar' => $photo,':adresse' => $adresse, ':genre' => $genre, ':date_naissance' => $naissance ])) {
        header("location:index.php");
    }
    else {
        $message = "une erreur s'est produite<br>";
    }

        
				
				
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<!--link rel="stylesheet" href="style/css/font.min.css"-->
        <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="style/styleform.css">
        <link rel="stylesheet" href="style/w3.css">
        <style>
            .erreur{
                background-color:tomato;
				border-radius:10px;
				text-align:center;
            }
			p{
				font-size:16px;
                padding-bottom:15px;
		     }
			 span{
				 font-size:20px;
				 font-weight:bold;
			 }
             h4{
                 padding:20px;
                 font-weight:bold;
             }
			 #form{
				 margin:40px;
				 position: relative;
				 bottom:250px;
			 }
             #form a{
              text-decoration:none;   
             }
			 #formateur{
				 margin:7px;
				 background-color:white;
				 width:40px;
				 height:10px;
				 border-radius:5px;
				 font-size:20px;
			 }
			 #etudiant{
				background-color:white;
				 width:40px;
				 height:10px;
				 border-radius:5px;
				 font-size:20px;
			 }
			 .wrapper{
                 background-color:lightblue;
             }
        </style>
	</head>

	<body>
		<div class="container">

		<div class="w3-container w3-xlarge">
			<a href="login.php" class="w3-bar-item w3-button w3-lightblue w3-right">Déja inscrit</a>
			<a href="inscription.php" class="w3-bar-item w3-button w3-lightblue w3-left">Etudiant</a>
			<a href="formformateur.php" class="w3-bar-item w3-button w3-lightblue w3-left">Formateur</a></div>
			<div class="inner">
				<div class="image-holder">
					<img src="img/image5oo.jpg" alt="">
				</div>
				<form action="" method="POST">
					<h4>Inscription pour Formateur</h4>
					 <?php if(!empty($message)){ ?>
        <div class="erreur">
  <span>erreur!</span>
  <p><?php echo $message ?></p>
</div>
<?php header('Refresh:60;url="inscription.php"');?>
		
		<?php } ?>

					<div class="form-group">
						<input type="text" name="nom" id="nom" placeholder="nom" class="form-control" value="<?php echo $nom;?>">
						<input type="text" name="prenom" id="nom" placeholder="prenom" class="form-control" value="<?php echo $prenom;?>">
					</div>
                    <div class="form-group">
						<input type="text" name="specialite" id="nom" placeholder="Specialité" class="form-control" value="<?php echo $specialite;?>">
						<input type="text" name="grade" id="nom" placeholder="Grade" class="form-control" value="<?php echo $grade;?>">
					</div>
					<div class="form-group">
						<input type="date" name="naissance" id="nom" placeholder="Date de Naissance" class="form-control" value="<?php echo $naissance;?>">
						<input type="number" name="tel" id="tel" placeholder="Telephone" class="form-control" value="<?php echo $tel;?>">
					</div>
					<div class="form-wrapper">
						<input type="text" name="adresse" id="adresse" placeholder="Adresse" class="form-control" value="<?php echo $adresse;?>">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" name="mail" id="mail" placeholder="Adresse mail" class="form-control" value="<?php echo $mail;?>">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="genre" id="genre" class="form-control" value="<?php echo $genre;?>">
							<option value="" disabled selected>Genre</option>
							<option value="Homme">Homme</option>
							<option value="Femme">Femme</option>
							<option value="Autre">Autre</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="pass" id="pass"  placeholder="Mot de passe" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="pass2" id="pass2" placeholder="Confirmer votre mot de passe" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="file"  name="img"  required>
						
					</div><br>
                    <button name="valider" class="ajout">S'incrire
						<i class="zmdi zmdi-arrow-right"></i>
                        </button>
				</form>
			</div>
		</div>
		</div>
	</body>
</html>