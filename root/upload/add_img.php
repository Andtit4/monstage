<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');
echo $_GET['id_pub'];
$id = intval($_GET['id_pub']);

if(isset($_POST['envoyer'])){
    if(!empty($_FILES['img'])){
        $ext = array("jpeg", "jpg", "png", "gif");

        if ($_FILES['img']['size']){
            $extup = strtolower(substr(strchr($_FILES['img']['name'], '.') , 1));

            if (in_array($extup , $ext)){
                $chemin = "imgpub/".$id.".".$extup;
                $res = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);

                if ($res){
                    $update = $bdd -> prepare("UPDATE publications SET img_pub = :img_pub WHERE id_pub = :id_pub") ;
                    $update -> execute(array('img_pub' => $_GET['id_pub'].".".$extup ,  'id_pub' => $_GET['id_pub'] ));
                    echo "Publication terminée";
                    
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Profil</title>
</head>
<body>
    <form class="box" action="" method="POST" enctype="multipart/form-data" >
	    <h1>Edition du profil</h1>
        <input type="file" name="img"></span>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>
			
</body>
</html>