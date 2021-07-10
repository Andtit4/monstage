<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');
$getid = $_GET['admin'];
$req = $bdd -> prepare("SELECT * FROM publications WHERE id_admn = ?");
$req -> execute(array($getid));

echo $getid;

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
  <link href="../../design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../design/css/business-casual.min.css" rel="stylesheet">
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
            <a class="nav-link text-uppercase text-expanded" href="profil_admin.php?admin=<?=$getid;?>">Profil
              <span class="sr-only">(current)</span>
            </a>
          </li>
		</li>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="liste_stage.php?admin=<?= $getid;?>">Liste de stage envoye</a>
        </li>
		
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="../../deconnexion.php">Déconnexion</a>
        </ul>
      </div>
    </div>
  </nav>
</head>
<body>
   

<body>
	<div class="intro-text  text-center bg-faded p-5 rounded">


		<h1>Liste de stages publiés</h1>
	    <?php while ($stageinfo = $req -> fetch()){ ?>

<a class="btn btn-primary btn-xl" href= "#"><?= "</br>".$stageinfo['titre_pub']."</br>";?></a>
<?php } ?> 
		
	</div>			
</body>
</html>
