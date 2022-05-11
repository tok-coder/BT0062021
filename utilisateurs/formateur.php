<?php
//session_start();
	include('../includes/headerformateur.php');
	include('../includes/connexion.php');
	?>
	<?php
		if(isset($_GET['id']) AND $_GET['id']>0){
			$getid = intval($_GET['id']);
			$res = $sdb->prepare('SELECT * FROM formateur WHERE id_formateur = ?');
			$res->execute(array($getid));
			$userinf=$res->fetch();
			?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <div align="center">			
			
			<?php echo " <strong>".$userinf["prenom"]." ".$userinf["nom"]."</strong>" ;
			echo "<br>";
	      echo '<div class="w3-bar w3-cursive">';
        echo '<h2><img class="w3-circle" src="../picture/'.$userinf['avatar'].'" style="height:50px;"></h2>';
?>

<!--	</div>
		<div style="margin-left:30%;margin-right:30%;text-justify:auto;">
		<i class="fa fa-info-circle w3-xlarge"> </i> Si vous voulez faire des modifications au niveau de votre profil veuillez cliquez sur le bouton Editer mon profil en bas avant de consulter les cours
			
	</div>-->
	
		<?php
		if(isset($_SESSION['id_formateur']) AND $userinf["id_formateur"]==$_SESSION['id_formateur'])
		{
			echo '<form method="post"action="" enctype="multipart/form-data">
			<label>Chager votre Photo de profil</label><br>
			<input type="file" name="img" id="img"><br><br>
			<input type="submit" name="btnAjout" value="changer">
			</form>';
			if(isset($_POST['btnAjout']))
			{
				$photo=$_FILES['img']['name'];
				$upload="../picture/".$photo;
				move_uploaded_file($_FILES['img']['tmp_name'],$upload);
				$updatphoto=$sdb->prepare('UPDATE formateur SET avatar = ? WHERE id_formateur = ?');
            $updatphoto->execute(array($photo,$_SESSION['id_formateur']));
            header("location:formateur.php?id=" .$_SESSION["id_formateur"]);
			
				
			 }
			?>
			
			e-mail: <?php echo "<strong>".$userinf['mail']."</strong>";
		    echo "<br>";?>
			Specialité: <?php echo "<strong>".$userinf['specialite']."</strong>";
		    echo "<br>";?>
			Grade: <?php echo "<strong>".$userinf['grade']."</strong>";
		    echo "<br>";?>
			Date de naissance: <?php echo "<strong>".$userinf['date_naissance']."</strong>";
		    echo "<br>";?>
			Adresse: <?php echo "<strong>".$userinf['adresse']."</strong>";
		    echo "<br>";?>
			Telephone: <?php echo "<strong>".$userinf['tel']."</strong>";
		    echo "<br>";?>
			Genre: <?php echo "<strong>".$userinf['genre']."</strong>";
		    echo "<br>";?>
			<a href="editerprofil_formateur.php" class="w3-bar-item w3-button w3-blue  w3-large"><i class="fa fa-user">Editer mon profil</i></a></div><br></div><br>
			
			<?php
		}
		?>
		</div>
</div>



	<div >
  <button class="w3-button  w3-xlarge" onclick="w3_open()">☰Profil</button>
  
</div>
		
<main>
        <article>
            <h2 class="w3-center w3-text-blue">NOS FORMATIONS</h2>

            <div class="w3-content w3-display-container">
              <img class="diaporama" src="../img/image16.jpg" style="width:100%">
              <img class="diaporama" src="../img/image17.jpg" style="width:100%">
              <img class="diaporama" src="../img/image22.jpg" style="width:100%">
              <img class="diaporama" src="../img/image19.jpg" style="width:100%">
              <img class="diaporama" src="../img/image20.jpg" style="width:100%">
              <img class="diaporama" src="../img/image10.png" style="width:100%">
              <img class="diaporama" src="../img/image11.png" style="width:100%">
              <img class="diaporama" src="../img/image12.png" style="width:100%">
              <img class="diaporama" src="../img/image13.jpg" style="width:100%">
              <img class="diaporama" src="../img/image14.jpg" style="width:100%">
              <img class="diaporama" src="../img/image15.png" style="width:100%">
              <img class="diaporama" src="../img/image23.jpg" style="width:100%">
              <img class="diaporama" src="../img/image24.png" style="width:100%">
              <img class="diaporama" src="../img/image25.png" style="width:100%">
              <img class="diaporama" src="../img/image26.png" style="width:100%">


              
            </div>
            <div>
                <h1 class="w3-center w3-text-blue">VOTRE CARRIERE COMMENCE DES AUJOURD'HUI</h1>
            </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("diaporama");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 3000); // Change image chaque 2 seconds
        }
    </script>

    </article>
    </main>
	<footer>
    <?php
    include("../includes/footer.php")
    ?>
    </footer>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("mySidebar").style.position = "relative";
  document.getElementById("mySidebar").style.top = "27%";
  document.getElementById("mySidebar").style.width = "27%";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
	
<?php
}
?>
</body>
</html> 