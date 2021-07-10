<?php
require 'config/database.php';
if (isset($_POST['inscription'])){
	if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['mail'] && $_POST['mdp'] && $_POST['mdp1'])){
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$mail = htmlspecialchars($_POST['mail']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$mdpconf = htmlspecialchars($_POST['mdp1']);

		if (filter_var($mail, FILTER_VALIDATE_EMAIL)){

					if ($mdp == $mdpconf){
						$inscr = $bdd -> prepare("INSERT INTO inscription VALUES ('', ?, ?, ?, ?)");
						$inscr->execute(array($nom, $prenom, $mail, $mdp));
						header('Location: connexion.php');


					}
					else{
						echo "Les mots de passe ne concordent pas";
					}




		}
		else{
			echo "Adresse mail invalide";
		}

	}
	else{
		echo "Veillez remplir tous les champs";
	}

}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MonStage - Accueil</title>

  <!-- Bootstrap core CSS -->
  <link href="design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="design/css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Rechercher plus facilement un stage</span>
    <span class="site-heading-lower">MON STAGE</span>
  </h1>

  <!-- Navigation -->
	<?php include 'view/navbar/navbar_user.php'; ?>
</head>
<body>

<form class="intro-text  text-center bg-faded p-5 rounded" action="" method="POST">
	<h1>INSCRIPTION</h1>
	<input type="text" name="nom" placeholder="Nom">
	<input type="text" name="prenom" placeholder="Prénom">
	<input type="email" name="mail" placeholder="Adresse mail">
	<input type="password" name="mdp" placeholder="Mot de passe">
	<input type="password" name="mdp1" placeholder="Confirmer le mot de passe">
	<input class="btn btn-primary btn-xl" type="submit" name="inscription" value="s'inscrire">
</form>
</body>
</html>
