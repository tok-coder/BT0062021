<?php
//session_start();
	include('header1.php');
	include('connexion.php');
 
		if(isset($_GET['id']) AND $_GET['id']>0){
			$getid = intval($_GET['id']);
			$res = $sdb->prepare('SELECT * FROM utilisateur WHERE id = ?');
			$res->execute(array($getid));
			$userinf=$res->fetch();
			?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		
		
		<div align="center">			
			
			<?php echo "Bonjour <strong>".$userinf["prenom"]." ".$userinf["nom"]."</strong>" ;
			echo "<br><br>";
		    echo "Bienvenue dans votre compte utilisateur <strong>".$userinf['email']."</strong>";
		    echo "<br>";
	      echo '<div class="w3-bar w3-cursive">';
        echo '<h2><img class="w3-circle" src="picture/'.$userinf['avatar'].'" style="height:150px;"></h2>';
?>

		</div>
		<div style="margin-left:30%;margin-right:30%;text-justify:auto;">
		<i class="fa fa-info-circle w3-xlarge"> </i> Si vous voulez faire des modifications au niveau de votre profil veuillez cliquez sur le bouton Editer mon profil en bas avant de consulter les cours
			
	</div>
			<br><br>
		<?php
		if(isset($_SESSION['id']) AND $userinf["id"]==$_SESSION['id'])
		{
			echo '<form method="post"action="" enctype="multipart/form-data">
			<label>Chager votre Photo de profil</label><br>
			<input type="file" name="img" id="img"><br><br>
			<input type="submit" name="btnAjout" value="changer">
			</form>';
			if(isset($_POST['btnAjout']))
			{
				$photo=$_FILES['img']['name'];
				$upload="picture/".$photo;
				move_uploaded_file($_FILES['img']['tmp_name'],$upload);
				$updatphoto=$sdb->prepare('UPDATE utilisateur SET avatar = ? WHERE id = ?');
            $updatphoto->execute(array($photo,$_SESSION['id']));
            header("location:user.php?id=" .$_SESSION["id"]);
			
				
			 }
			?>
			<a href="editerprofil.php" class="w3-bar-item w3-button w3-blue  w3-large"><i class="fa fa-user">Editer mon profil</i></a></div><br></div><br>
			
			<?php
		}
		?>
		</div>
		<footer>
    <?php
    include("footer.php")
    ?>
    </footer>
	</body>
</html>
<?php
}
?>