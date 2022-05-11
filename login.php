 <?php
	session_start();
	@$login=$_POST["log"];
	@$pass=sha1($_POST["mdp"]);
	@$valider=$_POST["login"];
    @$statut=$_POST["statut"];
	$message="";
	if(isset($valider)){
        if($statut=="Etudiant" OR $statut=="Admin"){
		include("includes/connexion.php");
		$res=$sdb->prepare("select * from utilisateur where email=? and motdepasse=? limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($login,$pass));
		$tab=$res->fetchAll();
		if(count($tab)==0){
            $message="Mauvais login ou mot de passe!";
            
        }
    
		else{
            $res=$sdb->query("SELECT * FROM utilisateur");
            //$res->setFetchMode(PDO::FETCH_ASSOC);
            $tab=$res->fetchAll();
            foreach ($tab as $role) {
                if($role['role']=='admin' AND $role['email']==$login AND $role['motdepasse']==$pass AND $statut=="Admin")
                {
                    header("location:admin/admin.php");

                }
                
                if($role['role']=='utilisateur' AND $role['email']==$login AND $role['motdepasse']==$pass AND $statut=="Etudiant")
                {
                    $res=$sdb->prepare("SELECT * FROM utilisateur WHERE email=? AND motdepasse=?");
                    $res->execute(array($login,$pass));
                    //$exist=$res->rowCount();
                    //$res->setFetchMode(PDO::FETCH_ASSOC);
                    //$tab=$res->fetchAll();
                    $userinf=$res->fetch();
                    $_SESSION["id"]=$userinf["id"];
                    $_SESSION["email"]=$userinf["email"];
                    $_SESSION["prenom"]=$userinf["prenom"];
                    $_SESSION["nom"]=$userinf["nom"];
                    $_SESSION["avatar"]=$userinf["avatar"];
                    $_SESSION["telephone"]=$userinf["telephone"];
                    $_SESSION["prenomNom"]=strtoupper($userinf["prenom"]." ".$userinf["nom"]);
                    header("location:utilisateurs/user.php?id=" .$_SESSION["id"]);
                }
                
              
            }

			
		}
        }
        else
        {
            $message="veuiller revoir votre statut";
        } 
        
        

        if($statut=="Formateur"){




            include("includes/connexion.php");
            $res=$sdb->prepare("select * from formateur where mail=? and motdepasse=? limit 1");
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute(array($login,$pass));
            $tab=$res->fetchAll();
            if(count($tab)==0){
                $message="Mauvais login ou mot de passe!";
                
            }
        
            else{
                $res=$sdb->query("SELECT * FROM formateur");
                //$res->setFetchMode(PDO::FETCH_ASSOC);
                $tab=$res->fetchAll();
                foreach ($tab as $role) {
                    
                    
                        $res=$sdb->prepare("SELECT * FROM formateur WHERE mail=? AND motdepasse=?");
                        $res->execute(array($login,$pass));
                        //$exist=$res->rowCount();
                        //$res->setFetchMode(PDO::FETCH_ASSOC);
                        //$tab=$res->fetchAll();
                        $userinf=$res->fetch();
                        $_SESSION["id_formateur"]=$userinf["id_formateur"];
                        $_SESSION["email"]=$userinf["email"];
                        $_SESSION["prenom"]=$userinf["prenom"];
                        $_SESSION["nom"]=$userinf["nom"];
                        $_SESSION["avatar"]=$userinf["avatar"];
                        $_SESSION["telephone"]=$userinf["telephone"];
                        $_SESSION["prenomNom"]=strtoupper($userinf["prenom"]." ".$userinf["nom"]);
                        header("location:utilisateurs/formateur.php?id=".$_SESSION["id_formateur"]);
                    
                  
                }
    
                
            }   

        } 
        else{
            $message="veuiller revoir votre statut";  
        } 
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style/stylelog.css">
    <title>Authentification</title>
    <style>
        
        a{
            text-decoration: none;
        }
        #statut{
            width:210px;
            height:30px;
        }
        
    </style>
</head>

<body class="w3-container">
<section>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <fieldset>
        <legend><h1 w3-container w3-green> Authentification </h1></legend>
        <?php if(!empty($message)){ ?>
        <div class="w3-panel w3-pale-red w3-border">
  <h3>erreur!</h3>
  <p><?php echo $message ?></p>
</div>
<?php header('Refresh:10;url="login.php"');?>
		<?php } ?>
        <p>
        <i class="fa fa-user w3-xlarge "></i></a>
        <select name="statut" id="statut">
							<option value="" disabled selected>Statut</option>
							<option value="Etudiant">Etudiant</option>
							<option value="Formateur">Formateur</option>
                            <option value="Admin">Admin</option>
						</select>
        </p>
        <p>
        <i class="fa fa-user w3-xlarge "></i></a>
                <input type="text" name="log" >
        </p>
        <p>
        <i class="fa fa-lock w3-xlarge "></i></a>
                <input type="password" name="mdp" >
        </p>
       <input type="submit" name="login" id="login" value="Valider">
       <a href="oubli.php">Mot de passe oublié</a><br><br>
       <a href="index.php" style="color:dark-blue;">Retour à l'accueil</a>
       <a href="inscription.php" class="w3-bar-item w3-button  w3-right w3-xlarge"><i class="fa fa-user-plus"> s'inscrire</i></a>
       
    </fieldset>  
    </form>
        </section>
</body>
</html>
