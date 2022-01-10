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
    <title>ecole</title>
    <style>
    

    </style>
</head>
<body>
    <header class="w3-bar w3-border w3-blue" >
        <fieldset >
        <legend> <em> Web programming <br> training school </em></legend>
        <div class="w3-bar w3-border w3-light-blue">
        <a href="index.php" class="w3-bar-item w3-button w3-xlarge"><i class="fa fa-home">Home</i></a>
            <a href="propos.php" class="w3-bar-item w3-button w3-large">A propos</a>
            <a href="contact.php" class="w3-bar-item w3-button w3-large">Contact</a>


            <div class="w3-dropdown-hover">
                <a href="#" class=" w3-button w3-large">Departements</a>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="bureautique.php" class="w3-bar-item w3-button">Bureautique</a>
                    <a href="web.php" class="w3-bar-item w3-button">Developpement web</a>
                    <a href="maintenance.php" class="w3-bar-item w3-button">Maintenance Informatique</a>
                </div>
            </div>

  
    <a class="w3-bar-item w3-button  w3-right w3-large">
        <form method="GET">
        <input type="text" placeholder="chercher..." name="q"   ><button type="submit" ><i class="fa fa-search"></i></button>
        </form>
   </a>    
            <a href="login.php" class="w3-bar-item w3-button w3-xlarge w3-right"><i class="fa fa-sign-in"> Connexion</i></a>
            
        </div>

</fieldset>
</header>
<main>
    
</main>
    <footer>
        
    </footer>
</body>
</html>
