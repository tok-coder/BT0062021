<?php  include('includes/connexion.php');
  ?>

<?php
$id = $_GET['id'];

$sql = 'SELECT * FROM utilisateur WHERE id=:id';
$preparation = $sdb->prepare($sql);
$preparation->execute([':id' => $id]);
$data = $preparation->fetch(PDO::FETCH_OBJ);

?>
<?php
@$pass=sha1($_POST["newpass"]);
@$pass2=sha1($_POST["newpass2"]);
@$valider=$_POST["valider"];
$message="";
	if(isset($valider))
    {
		if(empty($pass)) $message.="<li>Mot de passe invalide!</li>";
		if($pass!=$pass2) $message.="<li>Vous n'avez pas tapé le meme mot de passe!</li>";	
		if(empty($message))
        {
			$sql = 'UPDATE utilisateur SET motdepasse=:motdepasse WHERE id=:id';

        $preparation = $sdb->prepare($sql);

        if ($preparation->execute([':motdepasse' => $pass, ':id' => $id])) 
        {
            header("location: index.php");
        }
		
		}
	}
?>
<!DOCYTPE html>
<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
	</head>
	<body>
		<header>
            
		</header>
		<form method="POST" action="">
            
            
            <p>
                <label>Mot de passe</label>
                <input class="w3-input" type="password" name="newpass" placeholder="donner une nouvelle mot de passe" value="<?php echo $pass?>" >
            </p>
            <p>
                <label>Confirmation du mot de passe</label>
                <input class="w3-input" type="password" name="newpass2" placeholder="confirmer la nouvelle mot de passe" value="<?php echo $pass2?>" >
            </p>
            
		
			<input type="submit" name="valider" value="Valider" />
			
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message">
			<?php 
			echo $message; 
			?>
		</div>
		<?php } ?>
	</body>
</html>