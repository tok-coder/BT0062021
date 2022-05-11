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
             #ajout{
                padding:20px; 
             }
        </style>
	</head>

	<body>

		<div class="wrapper" style="background-image: url('img/image39.jpg');">
        
			<div class="inner">
                
				<div class="image-holder">
					<img src="img/image5oo.jpg" alt="">
				</div>
				<form action="" method="POST">
					<h4>Inscription pour etudiant</h4>
					 <?php if(!empty($message)){ ?>
        <div class="erreur">
  <span>erreur!</span>
  <p><?php echo $message ?></p>
</div>
<?php header('Refresh:60;url="inscription.php"');?>
		
		<?php } ?>

					<div class="form-group">
						<input type="text" name="nom" id="nom" placeholder="Username" class="form-control" value="<?php echo $nom;?>">
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
						<input type="password" name="pass1" id="pass1"  placeholder="Mot de passe" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="pass2" id="pass2" placeholder="Confirmer votre mot de passe" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <button name="ajout" id="ajout">S'incrire
						<i class="zmdi zmdi-arrow-right"></i>
                        </button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>