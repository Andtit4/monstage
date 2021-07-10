<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');

$getinscription = intval($_GET['id']);
$reqinscrit =  $bdd -> prepare("SELECT * FROM inscription WHERE id = ?");
$reqinscrit -> execute(array($getinscription));
$inscrit_info = $reqinscrit -> fetch();

//Sauver les informations dans une variable

$getid = intval($_GET['id_publication']);
$stageinfo = $bdd -> prepare("SELECT * FROM publications WHERE id_pub = ?");
$stageinfo -> execute(array($getid));
$stage = $stageinfo -> fetch();

$titre_publication = htmlspecialchars($stage['titre_pub']);
$id_admin = intval($stage['id_admn']);

$reqadmin = $bdd -> prepare("SELECT * FROM administrateur WHERE id_admin = ?");
$reqadmin -> execute(array($id_admin));
$admin = $reqadmin -> fetch();
$ad_name = htmlspecialchars($admin['nom_admin']);
$ad_mail = htmlspecialchars($admin['mail_admin']);



if (isset($_POST['demande'])){

  ini_set( 'display_errors', 1 );
      error_reporting( E_ALL );
      $from = "test@hostinger-tutorials.fr";
      $to = $ad_mail;
      $subject = "Essai de PHP Mail";
      $message = "PHP Mail fonctionne parfaitement";
      $headers = "De :" . $from;
      mail($to,$subject,$message, $headers);
      header("Location: index.php");


}






  else{
    echo "Une erreur est survenue";
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


  <body >
    <form class="intro-text  text-center bg-faded p-5 rounded" action="" method="post">
    <h3>Prévisualiser la demande</h3>
    <p>Objet : Demande de stage</p>
    <p>Je soussigné Mme/M <?= $inscrit_info['nom'] ?> répondant au pseudonyme <?= $inscrit_info['premon'];?></p>
    <p>de bien vouloir accepter ma demande de stage N° <?= $getid;?> ayant pour titre : <?= $titre_publication;?></p>
    <p>dans l'attente d'une suite favorable , je vous prie d'agréer M/Mme <?= $ad_name;?> mes meilleures salutations.</p>
    <p> mon adresse email <?= $mail;?></p>
    <input type="email" name="email" placeholder="" value="<?= $ad_mail;?>">
    <input type="submit" name="demande" value="Envoyer la demande">
    </form>
  </body>

  </html>
