<?php
echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0\"/>
    <link rel=\"stylesheet\" href=\"css/recherche_search.css\">
    <script src=\"https://code.highcharts.com/highcharts.src.js\"></script>
    <title>Theses</title>
</head>
    <div>
        <a href='index.html' title='Page accueil'>
            <img src=\"img/newLogo.png\" class=\"logo\"/>
        </a>
        <form action=\"recherche.php\" name=\"search\" method=\"post\" class=\"search\">
            <div>
                <input type=\"text\" name=\"search\"  class=\"search_bar\" placeholder=\"Recherche...\">
                <button type=\"submit\" class=\"btn_rechercher\">Rechercher</button>
            </div>
        </form>
    </div>";
include ("./class/connexion.php");

$cnx = new connexion();
$db = $cnx->getCnx();

if (isset($_POST["search"]) AND !empty($_POST['search'])) {
    $mot = "%".$_POST["search"]."%";
    $sql = "SELECT id_these,title FROM Theses WHERE title LIKE :mot OR author LIKE :mot";
    $request = $db->prepare($sql);

    $request->bindParam('mot',$mot,PDO::PARAM_STR,500);

    $request->execute();

    echo "<div class='resultat'><ul>";
    while ($line = $request->fetch()) {
        echo "<li class='titre'><a href='https://theses.fr/".$line['id_these']."' target='_blank' class='link'>".$line['title']."<a></li><br>";
    }
    echo "</ul></div>";
}

else if (empty($_POST['search'])) {
    echo "<p>Aucun résultat pour votre recherche...</p>";
}
?>
