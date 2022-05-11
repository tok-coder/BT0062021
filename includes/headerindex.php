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
        <a class="w3-bar-item w3-button  w3-right w3-large">
        <form method="GET">
        <input type="text" placeholder="chercher..." name="q"   ><button type="submit" ><em class="fa fa-search"></em></button>
        </form>
        
        
   </a> 
  <a href="./propos.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-info"> A propos</i></a>
  <a href="./contact.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-envelope"> Contact</i></a>
  <a href="inscription.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-user-plus"> Inscription</i></a>
  <a href="login.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-sign-in"> Connexion</i></a>
  <a href="index.php" class="w3-button w3-large w3-bar-item w3-right"><i class="fa fa-home"> Acceuil</i></a>
  <a href="" id="tok"><i>tokcoder.com</i></a>
  
  <a class="navbar-brand" id="logo" href="index.php"><img width="50"  src="img/logo.jpg" alt="#" /></a>
  
</nav>

</fieldset>
</header>
<main>
    
</main>
    <footer>
        
    </footer>
</body>
</html>
