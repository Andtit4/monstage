<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');

 /*   if(isset($_POST['envoyer_stage'])){
       if(!empty($_POST['img_name']) && !empty($_FILES['img'])){
           $img_name = intval($_POST['img_name']);
           $extension = array('jpeg' , 'jpg' , 'gif' , 'png');
      

           if($_FILES['img']['size']){
               $extup = strtolower(substr(strchr($_FILES['img']['name'], '.') , 1));
        

               if(in_array($extup , $extension)){
                   $chemin = "imgpub/".$img_name.".".$extup;
                  $result = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);

                  if ($result){ */
                      $p = $bdd ->query("SELECT * FROM publications ORDER BY id_pub DESC");

                   /*   $update = $bdd -> prepare("UPDATE publications SET img_publication = :img_publication WHERE id_publication = :id_oublication") ;
                      $update -> execute(array('img_publication' => $img_name.".".$extup ,  'id_publication' => $img_name ));
                    */
                 /* }
        
               }
           }
       }
    
    }*/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="design/stage_dispo.css"/>
        <title>Stage - MonStage</title>
    </head>
    <body>
    <div class="box">
        <h2>Veuillez sélectionner votre publication</h2>
        <?php while ($stageinfo = $p -> fetch()){ ?>

                    <a href= "add_img.php?id_pub=<?= $stageinfo['id_pub'] ?>"><?= "</br>".$stageinfo['titre_pub'];?></a>
        <?php } ?> 
        </div>
 

    </body>
</html>