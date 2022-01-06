<?php
include("../class/connexion.php");
ini_set('max_execution_time','0');
header("Content-Type: application/json; charset=utf-8");

$cnx = new connexion();
$db = $cnx->getCnx();

$file = file_get_contents("../files/info_map.json");
$array = json_decode($file,true);

foreach ($array as $donnee) {
    $sql = "INSERT INTO Map VALUES (:id,:nom,:long,:lat);";
    $requete = $db->prepare($sql);
    $requete->bindParam('id',$donnee['fields']["identifiant_idref"],PDO::PARAM_STR,40);
    $requete->bindParam('nom',$donnee['fields']['uo_lib_officiel'],PDO::PARAM_STR,400);
    $requete->bindParam('long',$donnee['fields']['coordonnees'][0],PDO::PARAM_STR,20);
    $requete->bindParam('lat',$donnee['fields']['coordonnees'][1],PDO::PARAM_STR,20);
    $requete->execute();
}
?>
