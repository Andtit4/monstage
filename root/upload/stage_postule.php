<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');

$admin = intval($_GET['admin']);

$req1 = $bdd -> query("SELECT * FROM postuler WHERE administrateur = '$admin' ");

$user_info = $req1 -> fetch();

//id de l'utilisateur
$user_id = $user_info['stagiaire'];


//contenu du stage
$contenu = $user_info['contenu_post'];

$req2 = $bdd -> prepare("SELECT * FROM inscription WHERE id = ?");

$req2 -> execute(array($user_id));

$user_info1 = $req2 -> fetch();

$user_nom = $user_info1['nom'];

$user_prenom = $user_info1['premon'];

$user_mail = $user_info1['mail'];


$requltra = $bdd -> query("SELECT * FROM publications P, inscription I, postuler Po, administrateur A
  WHERE Po.stagiaire = I.id AND A.id_admin = '$admin' AND Po.administrateur = A.id_admin AND P.titre_pub = Po.contenu_post;
");

$info = $requltra -> fetch();

$req12 = $bdd -> query("SELECT * FROM postuler WHERE administrateur = '$admin' ORDER BY id_post ");







 ?>




 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>MonStage - AdminPanel</title>

   <!-- Bootstrap core CSS -->
   <link href="../../design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../../design/css/business-casual.min.css" rel="stylesheet">
 </head>

 <body>

   <h1 class="site-heading text-center text-white d-none d-lg-block">
     <span class="site-heading-upper text-primary mb-3">Les postulations en cours</span>
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
             <a class="nav-link text-uppercase text-expanded" href="profil_admin.php?admin=<?=$admin;?>">Profil
               <span class="sr-only">(current)</span>
             </a>
           </li>
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

    <?php while ($cap = $req12 -> fetch()) {?>


       		<p>Stage :<?= "<a class='btn btn-primary btn-xl' href=validate.php?stagiaire=".$cap['stagiaire']."&admin=".$admin.">".$cap['contenu_post']."</a>";?></p>


  <?php  } ?>

 	</div>
 </body>
 </html>
