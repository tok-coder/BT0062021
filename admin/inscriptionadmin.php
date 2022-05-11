<?php
include("../includes/headeradmin.php");

	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
    @$tel=$_POST["tel"];
    @$mail=$_POST["mail"];
	@$adresse=$_POST["adresse"];
	@$naissance=$_POST["naissance"];
	@$genre=$_POST["genre"];
	@$niveau=$_POST["niveau"];
	@$pass=sha1($_POST["pass"]);
	@$pass2=sha1($_POST["pass2"]);
	@$valider=$_POST["valider"];
	@$role=$_POST["role"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="Nom invalide!!!";
		if(empty($prenom)) $message.="Prénom invalide!!!";
        if(empty($tel)) $message.="telephone invalide!!!";
        if(empty($mail)) $message.="mail invalide!!!";
		if(empty($pass)) $message.="Mot de passe invalide!!!";
		if(empty($pass2)) $message.="Mot de passe invalide!!!";
		if(empty($adresse)) $message.="Adresse invalide!!!";
		if(empty($naissance)) $message.="Date de naissance invalide!!!";
		if(empty($genre)) $message.="genre invalide invalide!!!";
		if(empty($role)) $message.="role invalide invalide!!!";
		if($pass!=$pass2) $message.="Vous n'avez pas tapé le meme mot de passe!!!";	
		if(empty($message)){
			include("../includes/connexion.php");
			$req=$sdb->prepare("select id from utilisateur where email=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$tab=$req->fetchAll();
			if(count($tab)>0)
				$message="<li>cette adresse existe déjà!</li>";
			else{
				$photo=$_FILES['img']['name'];
    $upload="../picture/".$photo;
    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
				$sql = "INSERT INTO utilisateur(prenom,nom,telephone,email,motdepasse,date,adresse,genre,niveau_etude,date_naissance,avatar,role) VALUES ('$prenom','$nom','$tel','$mail','$pass',now(),'$adresse','$genre','$niveau','$naissance','$photo','$role')";
				$preparation = $sdb->prepare($sql);
    if ($preparation->execute([':prenom' => $prenom,':nom' => $nom,':telephone' => $tel,':email' => $mail,':motdepasse' => $pass,':avatar' => $photo,':adresse' => $adresse, ':genre' => $genre, ':date_naissance' => $naissance, ':niveau_etude' => $niveau ])) {
        header("location:../index.php");
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
        <link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../style/styleform.css">
        <link rel="stylesheet" href="../style/w3.css">
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
			<a href="inscriptionadmin.php" class="w3-bar-item w3-button w3-lightblue w3-left">Etudiant</a>
			<a href="inscriptionformateur.php" class="w3-bar-item w3-button w3-lightblue w3-left">Formateur</a></div>
		
			<div class="inner">
				<div class="image-holder">
					<img src="../img/image17.jpg" alt="">
				</div>
				<form action="" method="POST">
					<h4>Inscription pour etudiant</h4>
					 <?php if(!empty($message)){ ?>
        <div class="erreur">
  <span>erreur!</span>
  <p><?php echo $message ?></p>
</div>
<?php header('Refresh:30;url="inscription.php"');?>
		
		<?php } ?>

					<div class="form-group">
						<input type="text" name="nom" id="nom" placeholder="nom" class="form-control" value="<?php echo $nom;?>">
						<input type="text" name="prenom" id="nom" placeholder="prenom" class="form-control" value="<?php echo $prenom;?>">
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
						<select name="niveau" id="genre" class="form-control" value="<?php echo $niveau;?>">
							<option value="" disabled selected>Niveau d'etude</option>
							<option value="Bac">Bac</option>
							<option value="L1">L1</option>
							<option value="L2">L2</option>
							<option value="L3">L3</option>
							<option value="M1">M1</option>
							<option value="M2">M2</option>
							
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<select name="role" id="role" class="form-control" value="<?php echo $genre;?>">
							<option value="" disabled selected>Role</option>
							<option value="admin">admin</option>
							<option value="utilisateur">utilisateur</option>
							
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