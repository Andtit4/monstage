<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');

require('view/edition_profil.html');

if (isset($_SESSION['id'])){

            if(isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])){
                $taillemax = 2097152;
                $extval = array('jpg', 'jpeg', 'gif', 'png');

                if($_FILES['avatar']['size'] <= $taillemax){
                    $extupload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                    if (in_array($extupload, $extval)){
                        $chemin = "membres/avatar/".$_SESSION['id'].".".$extupload;
                        $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                        if ($result){
                            $updadeavatar = $bdd->prepare("UPDATE inscription SET avatar = :avatar WHERE id = :id");
                            $updadeavatar->execute(array('avatar' => $_SESSION['id'].".".$extupload,
                            'id' => $_SESSION['id']));
                        }
                        else{
                            echo "Erreur durant l'importation du profil";
                        }
                    }
                    else{
                        echo "Votre photo de profil doit être au format 'jpg', 'jpeg','gif' ou 'png'";
                    }
                }
                else{
                    echo "Votre photo de profile ne doit pas dépasser 2 mo";
                }
            }
            
            
}
        


    
	



?>

