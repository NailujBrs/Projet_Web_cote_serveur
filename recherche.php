<?php
if (!empty($_POST)) {
    echo "<!DOCTYPE html>
    <html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0\"/>
        <link rel=\"stylesheet\" href=\"css/recherche_search.css\">
        <script src=\"https://code.highcharts.com/highcharts.js\"></script>
        <script src=\"https://code.highcharts.com/modules/data.js\"></script>
        <script src=\"https://code.highcharts.com/modules/drilldown.js\"></script>
        <script src=\"https://code.highcharts.com/modules/exporting.js\"></script>
        <script src=\"https://code.highcharts.com/modules/export-data.js\"></script>
        <script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>
        <title>Theses</title>
    </head>
    <body>
        <div>
            <a href='index.html' title='Page accueil'>
                <img src=\"img/newLogo.png\" class=\"logo\" alt='logo'/>
            </a>
            <form action=\"recherche.php\" name=\"search\" method=\"post\" class=\"search\">
                <div>
                    <input type=\"text\" name=\"search\"  class=\"search_bar\" placeholder=\"".$_POST['search']."\">
                    <button type=\"submit\" class=\"btn_rechercher\">Rechercher</button>
                </div>
            </form>
        </div>";
}
include ("./class/connexion.php");

$cnx = new connexion();
$db = $cnx->getCnx();

ini_set("memory_limit","204M");

if (isset($_POST["search"])) {
    if (!empty($_POST['search']) AND $_POST['search']!=" ") {
        $mot = "%".$_POST["search"]."%";
        $sql = "SELECT id_these,title FROM Theses WHERE title LIKE :mot OR author LIKE :mot";
        $request = $db->prepare($sql);

        $request->bindParam('mot',$mot,PDO::PARAM_STR,500);

        $request->execute();

        if ($request->rowCount() > 0) {
            echo "<div class='right'><div class='resultat'><ul>";
            while ($line = $request->fetch()) {
                echo "<li class='titre'><a href='https://theses.fr/".$line['id_these']."' target='_blank' class='link'>".$line['title']."<a></li><br>";
            }
            echo "</ul></div></div>";

            $sqlGrap1 = "SELECT DISTINCT(discipline) as d,COUNT(id_these) as c FROM Theses WHERE title LIKE :mot OR author LIKE :mot GROUP BY discipline ORDER BY Count(id_these) DESC LIMIT 10";
            $requestGrap1 = $db->prepare($sqlGrap1);
            $requestGrap1->bindParam('mot',$mot,PDO::PARAM_STR,500);
            $requestGrap1->execute();

            $sqlAllDisc = "SELECT COUNT(discipline) as cA FROM Theses WHERE title LIKE :mot OR author LIKE :mot";
            $requestAllDisc = $db->prepare($sqlAllDisc);
            $requestAllDisc->bindParam('mot',$mot,PDO::PARAM_STR,500);
            $requestAllDisc->execute();
            $lineAllDisc = $requestAllDisc->fetch();

            $tabdiscipline = array();
            $tabcount = array();
            $countPc = 100;
            $countResOther = $lineAllDisc['cA'];
            while ($lineGrap1 = $requestGrap1->fetch()) {
                array_push($tabdiscipline, $lineGrap1['d']);
                array_push($tabcount, $lineGrap1['c']);
                $countPc -= $lineGrap1['c']/$lineAllDisc['cA']*100;
                $countResOther -=  $lineGrap1['c'];
            }
            echo "<div class='left'><figure class=\"highcharts-figure\">
                    <div id='container'></div>
                  </figure> 
                  <script>
                  Highcharts.setOptions({
                  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: {
                            cx: 0.5,
                            cy: 0.3,
                            r: 1
                        },
                        stops: [
                            [0, color],
                            [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                        ]
                    };
                  })
                  });

                // Build the chart
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Top des Disciplines<br><p style=\"font-size:10px\">Nombre de résultats : ".$lineAllDisc['cA']."</p>'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br><b>{point.res}</b> résultats'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.percentage:.1f} %',
                                connectorColor: 'silver'
                            }
                        }
                    },
                    series: [{
                        name: 'Discipline',
                        data: [";
                        if ($lineAllDisc['cA'] > 9) {
                            for ($i = 0; $i <= 9; $i++) {
                                echo "{ name: \"".$tabdiscipline[$i]."\",
                                            y:".$tabcount[$i]*100/$lineAllDisc['cA'].",res :".$tabcount[$i]."},";
                            }
                            echo "{ name: \"Other\",
                                            y:".$countPc.",res :".$countResOther."}";
                        }
                        else {
                            for ($i = 0; $i <$lineAllDisc['cA'];$i++) {
                                echo "{ name: \"".$tabdiscipline[$i]."\",
                                            y:".$tabcount[$i]*100/$lineAllDisc['cA'].",res :".$tabcount[$i]."},";
                            }
                        }
                        echo "]
                    }]
                   });</script>";

            echo "<figure class=\"highcharts-figure2\">
                    <div id=\"Graph2\"></div>
                  </figure>
                  <script>
            Highcharts.chart('Graph2', {
    chart: {
                type: 'column'
    },
    title: {
                text: 'Browser market shares. January, 2018'
    },
        accessibility: {
                announceNewData: { 
                    enabled: true
        }
            },
        xAxis: {
                type: 'category'
    },
        yAxis: {
                title: {
                    text: 'Total percent market share'
        }

            },
        legend: {
                enabled: false
    },
        plotOptions: {
                series: {
                    borderWidth: 0,
            dataLabels: {
                        enabled: true,
                format: '{point.y:.1f}%'
            }
        }
            },

        tooltip: {
                headerFormat: '<span style=\"font-size:11px\">{series.name}</span><br>',
        pointFormat: '<span style=\"color:{point.color}\">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

        series: [
        {
            name: \"Browsers\",
            colorByPoint: true,
            data: [
                {
                    name: \"Chrome\",
                    y: 62.74,
                    drilldown: \"Chrome\"
                },
                {
                    name: \"Firefox\",
                    y: 10.57,
                    drilldown: \"Firefox\"
                },
                {
                    name: \"Internet Explorer\",
                    y: 7.23,
                    drilldown: \"Internet Explorer\"
                },
                {
                    name: \"Safari\",
                    y: 5.58,
                    drilldown: \"Safari\"
                },
                {
                    name: \"Edge\",
                    y: 4.02,
                    drilldown: \"Edge\"
                },
                {
                    name: \"Opera\",
                    y: 1.92,
                    drilldown: \"Opera\"
                },
                {
                    name: \"Other\",
                    y: 7.62,
                    drilldown: null
                }
            ]
        }
    ]
    }
);</script></div>";
        }
        else {
            echo "<p style='text-align: center'>Il n'y aucun résultat pour votre recherche...</p>";
        }
    }
    else {
        echo "<p style='text-align: center'>Votre recherche ne contient aucun mot</p>";
    }
}
else {
    echo "<p style='text-align: center'>Vous ne devriez pas être la !! <br><a href='index.html' title='Page accueil'>Retournez à la page d'acceuil</a></p>";
}
?>

