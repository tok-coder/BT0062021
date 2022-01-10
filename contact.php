<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTS</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    
        <?php
        include("header.php")
        ?>
        

    <div class="apropos">
    <aside class=contacts1>
    <h3><strong>POUR NOUS CONTACTER</strong></h3>
            
            <form class="w3-container" method="POST" action="mesenvoi.php">
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="first" type="text" placeholder="Prenom" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="last" type="text" placeholder="Nom" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <input class="w3-input w3-border w3-round-large" name="mail" type="email" placeholder="Email" require></p>
            <p><label class="w3-text-blue"><b></b></label>
            <textarea class="w3-input w3-border w3-round-large" name="message" type="text" placeholder="Message" id="" cols="5" rows="5"  require>
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
    include("footer.php")
    ?>
    </footer>
    
</body>
</html>