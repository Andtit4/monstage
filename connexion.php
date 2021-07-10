<?php
session_start();
require 'config/database.php';



if (isset($_POST['connexion'])){

	if (!empty($_POST['mailconnect']) and $_POST['mdpconnect']){
		$mailconnect = htmlspecialchars($_POST['mailconnect']);
		$passconnect = htmlspecialchars($_POST['mdpconnect']);
		$req = $bdd->prepare("SELECT * FROM inscription WHERE mail = ? AND mdp = ? ; ");
		$req->execute(array($mailconnect, $passconnect));
		$userexist = $req->rowCount();

		if ($userexist == 1){
			$userinfo = $req->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: profil.php?id=".$_SESSION['id']);
		}
		else{
			$erreur = "Mauvais pseudo ou mot de passe";
		}

	}
	else{
		$erreur = "Veuillez remplir tous les champs";
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

<body>
	<form class="box" method="POST" action="">



		<section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">


            <span class='section-heading-upper'>CONNEXION</span>
            <span class="section-heading-lower"></span>
          </h2>
          <p class="mb-3"><input type="email" name="mailconnect" placeholder="Adresse mail">
		</p>
		<p class="mb-3">
		<input type="password" name="mdpconnect" placeholder="Mot de passe">
		</p>
		<p>
			<input class="btn btn-primary btn-xl" type="submit" name="connexion" value="Se connecter">
		</p>
		<p>
			<a class="btn btn-primary btn-xl" style="color: white ;" href="restoration_mdp.php">Mot de passe oublié?</a><a  class="btn btn-primary btn-xl" style="color: white ;" href="inscription.php"> Créer un compte</a>
			<a  class="btn btn-primary btn-xl" style="color: white ;" href="root/admin.php">Espace admin</a>

			<?php if(isset($erreur)){ echo $erreur ;} ?>

		  </p>
        </div>
      </div>
    </div>
  </section>


		<p><php? echo $erreur; ?></p>
	</form>
</body>
</html>
