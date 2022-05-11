<?php
include("includes/connexion.php");
$message="";
if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['mail']) && isset($_POST['message'])) {
    $prenom=$_POST["first"];
	$nom=$_POST["last"];
    $mail=$_POST["mail"];
    $mes=$_POST["message"];
    $valider=$_POST["envoi"];
	if(isset($valider)){
		if(empty($prenom)) $message="prenom invalide!";
		if(empty($nom)) $message.="nom invalide!";
        if(empty($mail)) $message.="mail invalide!";
        if(empty($mes)) $message.="message invalide!";
        
		if(empty($message)){
			
				$sql = "INSERT INTO message(prenom,nom,description,mail) VALUES ('$prenom','$nom','$mes','$mail')";
				$preparation = $sdb->prepare($sql);
                $preparation->execute();
                echo '<div class="w3-panel w3-green">
  <h3>Success!</h3>
  <p>Vos informations ont bien été enregistré.</p>
</div>';
header('Refresh:4;url="contact.php"');
		}}}
        
    ?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTS</title>
    <!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    
        <?php
        include("includes/headerindex.php")
        ?>
        

    <div class="apropos">
    <aside class=contacts1>
    <h3><strong>POUR NOUS CONTACTER</strong></h3>
    <?php if(!empty($message)){ ?>
        <div class="w3-panel w3-pale-red w3-border">
  <h3>erreur!</h3>
  <p><?php echo $message ?></p>
</div>
<?php header('Refresh:3;url="contact.php"');?>
		<?php } ?>
            <form class="w3-container" method="POST" action="">
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="first" type="text" placeholder="Prenom" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="last" type="text" placeholder="Nom" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="mail" type="email" placeholder="Email" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <textarea class="w3-input w3-border w3-round-large" name="message" type="text"  id="" cols="5" rows="5"  placeholder="Message" require>
            </textarea>
            <p><input type="submit" name="envoi" class="w3-btn w3-blue" value="Envoyer"></p>
            </form>
        </aside>
        <article class=contacts2>article</article>
    </div>

    <div>
                <h1 class="w3-center w3-text-blue">POUR PLUS D'INFORMATION, VEUILLEZ VISITER TOUTES NOS PAGES</h1>
            </div>


    <footer>
    <?php
    include("includes/footer.php")
    ?>
    </footer>
    
</body>
</html>