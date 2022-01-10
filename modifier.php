<?php  include('connexion.php');
  ?>

<?php
$id = $_GET['id'];

$sql = 'SELECT * FROM utilisateur WHERE id=:id';
$preparation = $sdb->prepare($sql);
$preparation->execute([':id' => $id]);
$data = $preparation->fetch();

?>


<?php

@$nom=htmlspecialchars($_POST['nom']);
	 @$prenom=$_POST["prenom"];
    @$tel=$_POST["tel"];
    @$mail=$_POST["mail"];
	@$pass=sha1($_POST["pass"]);
	@$pass2=sha1($_POST["pass2"]);
    @$role=$_POST["role"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li>Nom invalide!</li>";
		if(empty($prenom)) $message.="<li>Prénom invalide!</li>";
        if(empty($tel)) $message.="<li>telephone invalide!</li>";
        if(empty($mail)) $message.="<li>mail invalide!</li>";
		if(empty($pass)) $message.="<li>Mot de passe invalide!</li>";
		if($pass!=$pass2) $message.="<li>Vous n'avez pas tapé le meme mot de passe!</li>";	
        if(empty($role)) $message.="<li>role invalide!</li>";
		if(empty($message)){
            
        $sql = 'UPDATE utilisateur SET prenom=:prenom, nom=:nom, telephone=:telephone, email=:email, motdepasse=:motdepasse,role=:role  WHERE id=:id';

        $preparation = $sdb->prepare($sql);

        if ($preparation->execute([':prenom' => $prenom, ':nom' => $nom, ':telephone' => $tel, ':email' => $mail, ':motdepasse' => $pass,':role' => $role, ':id' => $id])) 
        {
            header("location: admin.php");
        }

}
    
}

?>

<!DOCYTPE html>
<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
    label{
        font-weight: bold;
        font-size: 20px;
    }
</style>
	</head>
	<body>
		<header>
            <div class="w3-container w3-blue "><h1 class="w3-container w3-right">Modification</h1>
			</div>
			
		</header>
		<form class="w3-container" method="post" action="">
            
            <p>
                
                <label>Prenom</label>
                <input class="w3-input" type="text" name="prenom" value="<?php echo $data['prenom']?>" >
            </p>
            <p>
                <label>Nom</label>
                <input class="w3-input" type="text" name="nom" value="<?php echo $data['nom']?>" >
            </p>
            <p>
                <label>Telephone</label>
                <input class="w3-input" type="number" name="tel" value="<?php echo $data['telephone']?>" >
            </p>
            <p>
                <label>Email</label>
                <input class="w3-input" type="email" name="mail" value="<?php echo $data['email']?>" >
            </p>
            <p>
                <label>Mot de passe</label>
                <input class="w3-input" type="password" name="pass" >
            </p>
            <p>
                <label>Confirmation du mot de passe</label>
                <input class="w3-input" type="password" name="pass2" >
            </p>
            <p>
                <label>Role</label>
                <input class="w3-input" type="text" name="role" value="<?php echo $data['role']?>" >
            </p>
		
			<input type="submit" name="valider" value="Modifier" style="background-color:green;" />
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
	</body>
</html>
