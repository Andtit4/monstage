<?php
session_start();
require 'config/database.php';

if (isset($_GET['id']) and $_GET['id'] > 0){

	$getid = intval($_GET['id']);

	$requser = $bdd ->prepare("SELECT * FROM inscription WHERE id = ?");

	$requser->execute(array($getid));

	$userinfo = $requser->fetch();

	$requser1 = $bdd -> query("SELECT * FROM postuler WHERE stagiaire = '$getid' ");

	$contenu_postuler = $requser1 -> fetch();

	$contenu_stage = $contenu_postuler['contenu_post'];

$val = "OUI";



	$req2 = $bdd -> query("SELECT * FROM postuler WHERE stagiaire = '$getid' AND valider = '$val' ");

	$confirm = $req2 -> fetch();








//Recupération du contenu du stage










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

  <!-- Custom styles for this template -->
  <link href="design/css/business-casual.min.css" rel="stylesheet">
</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Rechercher plus facilement un stage</span>
    <span class="site-heading-lower">MON STAGE</span>
  </h1>

  <!-- Navigation -->
  <?php include 'view/navbar/navbar_connect.php'; ?>

</head>
<body>


<body>
	<div class="intro-text  text-center bg-faded p-5 rounded">


		<h1>Bienvenu sur Mon Stage</h1>
		<?php if (!empty($userinfo['avatar'])){
		?>
		<?php	}?>
		<p>Nom :<?php echo $userinfo['nom'];   ?></p>
    <p>Prenom :<?php echo $userinfo['premon'];   ?></p>
		<p>Adresse mail :<?php echo $userinfo['mail'];   ?></p>
		 <?php
		 	// code...

			if ($confirm['valider'] == "OUI") {
				// code...


							$mess = "<a class='btn btn-primary btn-xl'>".$confirm['contenu_post']."</a>";
							echo "<p>Stage :".$mess."</p>";
			}
			else {
			//	var_dump($req2);
				$mess = "<a class='btn btn-primary btn-xl'>Aucun stage validé</a>";
				echo "<p>Stage Validé :".$mess."</p>";
			}?>


			<a  class="btn btn-primary btn-xl" href='edition_profil.php?id=<?= $getid; ?>' class='boxe' title='Editer le profil' >Editer mon profil </a>
			<a  class="btn btn-primary btn-xl" href='accueil_stage_dispo.php?id=<?= $getid; ?>' class='boxe' name='start' title='Démarrer' >Démarrer</a>
			<a  class="btn btn-primary btn-xl" href='deconnexion.php' class='boxe' title='Déconnexion' >Se déconnecter</a>
	</div>
</body>
<?php	}?>
</html>
