<?php

/*
 * création d'objet PDO de la connexion qui sera représenté par la variable $cnx
 */
	$user =  'julian.bors';
	$pass =  'Buffon1303';
try {
    $cnx = new PDO('mysql:host=sqletud.u-pem.fr;dbname=julia.bors_db',$user,$pass);
}
catch (PDOException $e) {
    echo "ERREUR : La connexion a échouée";

 /* Utiliser l'instruction suivante pour afficher le détail de erreur sur la
 * page html. Attention c'est utile pour débugger mais cela affiche des
 * informations potentiellement confidentielles donc éviter de le faire pour un
 * site en production.*/
	/*echo "Error: " . $e;*/

}

?>

