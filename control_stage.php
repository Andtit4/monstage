<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage;charset=utf8', 'root', '');


if (isset($_GET['id_pub']) && ($_GET['id_pub'] > 0)){

    $getidin = intval($_GET['id']);

    $getid = htmlspecialchars($_GET['id_pub']);
    $reqstage = $bdd -> prepare("SELECT * FROM publications WHERE id_pub = ?");
    $reqstage -> execute(array($getid));

    if ($reqstage -> rowCount() == 1){
        $stage = $reqstage -> fetch();
        $id = $stage['id_pub'];
        $titre = $stage['titre_pub'];
        $contenu = $stage['contenu_pub'];
        $contact = $stage['mail'];
    }
    else{
        die('Cet article n\' existe pas');
    }




    }

else {
    die('Erreur');
}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stage - Disponible</title>

  <!-- Bootstrap core CSS -->
  <link href="design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="design/css/business-casual.min.css" rel="stylesheet">
</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Rechercher plus facilement un stage</span>
    <span class="site-heading-lower">MON STAGE</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
		</li>
		<li class="nav-item px-lg-4">
		  <a class="nav-link text-uppercase text-expanded" href="accueil_stage_dispo.php">Démarrer</a>
		</li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="deconnexion.php">Déconnexion</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>
</head>
<body>

    <div class="intro-text  text-center bg-faded p-5 rounded">
        <h2>Titre : <?= $titre ;?> </h2>
        <p><?= $contenu; ?></p>
        <P><a title="Postuler maintenant" class="btn btn-primary btn-xl" href="send.php?id_publication=<?= $id ; ?>&id=<?= $getidin;?>" >Postuler</a></p>

        </div>

    </body>
</html>
