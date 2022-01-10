<?php
    @$prenom=$_POST["first"];
	@$nom=$_POST["last"];
    @$mail=$_POST["mail"];
    @$mes=$_POST["message"];
	$message="";
	if(isset($valider)){
		if(empty($prenom)) $message="<li>prenom invalide!</li>";
		if(empty($nom)) $message.="<li>nom invalide!</li>";
        if(empty($mail)) $message.="<li>mail invalide!</li>";
        if(empty($mes)) $message.="<li>message invalide!</li>";
        
		if(empty($message)){
			include("connexion.php");
				$sql = "INSERT INTO message(prenom,nom,description,mail) VALUES ('$prenom','$nom','$mes','$mail')";
				$preparation = $sdb->prepare($sql);
                $preparation->execute();
    
		}}
        if(!empty($message)){
            echo $message;
        }
    ?>
    