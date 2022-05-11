<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!--link rel="stylesheet" href="./style/w3.css"-->
    <title>ecole</title>
    <style>
    #logo{
        text-align: center;
       
        
    }
    #tok{
        margin:30px;
        text-decoration:none;
        font-weight:bold;
    }
    
    </style>
</head>
<body>
    <header class="w3-bar w3-border w3-light-blue" >
        <fieldset >
        <legend> <em> Web programming <br> training school </em></legend>
        <!--div class="w3-bar w3-border w3-light-blue">
        <a href="index.php" class="w3-bar-item w3-button w3-xlarge"><i class="fa fa-home">Home</i></a>
            <a href="./propos.php" class="w3-bar-item w3-button w3-large">A propos</a>
            <a href="./contact.php" class="w3-bar-item w3-button w3-large">Contact</a>
            </a>    
            <a href="login.php" class="w3-bar-item w3-button w3-xlarge"><i class="fa fa-sign-in"> Inscription</i></a>
            
        </div>

    <a class="w3-bar-item w3-button  w3-right w3-large">
        <form method="GET">
        <input type="text" placeholder="chercher..." name="q"   ><button type="submit" ><i class="fa fa-search"></i></button>
        </form>
        
   </a>    
            <a href="login.php" class="w3-bar-item w3-button w3-xlarge w3-right"><i class="fa fa-sign-in"> Connexion</i></a>
            
        </div-->
        <nav class="w3-bar w3-border w3-white ">
        
        <a href="list_etudiant.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-"> Dashboard</i></a>
        <div class="w3-dropdown-hover w3-large w3-right">
    <a class="w3-button w3-white"><i class="fa fa-info**"> Gestion De Conctacts</i></a>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="./list_message.php" class="w3-bar-item w3-button">Liste des messages</a>
      <a href="#" class="w3-bar-item w3-button">Reclamations</a>
    </div>
  </div>

  <div class="w3-dropdown-hover w3-large w3-right">
    <a class="w3-button w3-white"><i class="fa fa-mortarboard-fill"> Gestion De Formations</i></a>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="#" class="w3-bar-item w3-button">Liste Des Formateurs</a>
      <a href="#" class="w3-bar-item w3-button">Liste Des Formations</a>
    </div>
  </div>
  
  <a href="list_etudiant.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-users"> Gestion Des Etudiants</i></a>
  <a href="../index.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-sign-out"> Deconnexion</i></a>
  <a href="../index.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-home"> Acceuil</i></a>
  <a href="" id="tok"><i>tokcoder.com</i></a>
  
  <a class="navbar-brand" id="logo" href="index.php"><img width="50"  src="../img/logo.jpg" alt="#" /></a>
  
</nav>

</fieldset>
</header>
<main>
    
</main>
    <footer>
        
    </footer>
</body>
</html>
