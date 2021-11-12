<?php
echo "<link rel=\"stylesheet\" href=\"css/recherche_search.css\">
<title>Recherche</title>
<form action=\"recherche.php\" name=\"search\" method=\"post\" class=\"search\">
    <div>
        <input type=\"text\" name=\"search\"  class=\"search_bar\" placeholder=\"Recherche...\">
        <button type=\"submit\" class=\"btn_rechercher\">Rechercher</button>
    </div>
</form>";
include ("./class/connexion.php");

$cnx = new connexion();
$db = $cnx->getCnx();

if (isset($_POST["search"]) AND !empty($_POST['search'])) {
    $mot = "%".$_POST["search"]."%";
    $sql = "SELECT title FROM Theses WHERE title LIKE :mot OR author LIKE :mot";
    $request = $db->prepare($sql);

    $request->bindParam('mot',$mot,PDO::PARAM_STR,500);

    $request->execute();

    echo "<ul>";
    while ($line = $request->fetch()) {
        echo "<li>".$line['title']."</li>";
    }
    echo "</ul>";
}

else if (empty($_POST['search'])) {
    echo "<p>Aucun résultat pour votre recherche...</p>";
}
?>
