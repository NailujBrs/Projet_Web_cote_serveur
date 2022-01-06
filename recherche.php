<?php
if (!empty($_POST)) {
    echo "<!DOCTYPE html>
    <html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0\"/>
        <link rel=\"stylesheet\" href=\"css/result.css\">
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js\"></script>
        <script src=\"https://code.highcharts.com/maps/highmaps.js\"></script>
        <script src=\"https://code.highcharts.com/maps/modules/exporting.js\"></script>
        <script src=\"https://code.highcharts.com/maps/modules/offline-exporting.js\"></script>
        <script src=\"https://code.highcharts.com/mapdata/countries/fr/fr-all.js\"></script>
        <script src=\"https://code.highcharts.com/modules/data.js\"></script>
        <script src=\"https://code.highcharts.com/modules/drilldown.js\"></script>
        <script src=\"https://code.highcharts.com/modules/exporting.js\"></script>
        <script src=\"https://code.highcharts.com/modules/export-data.js\"></script>
        <script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>
        
        <title>Theses</title>\
    </head>
    <body>
        <div>
            <a href='index.html' title='Page accueil'>
                <img src=\"img/newLogo.png\" class=\"logo\" alt='logo'/>
            </a>
            <form action=\"recherche.php\" name=\"search\" method=\"post\" class=\"search\">
                <div>
                    <input type=\"text\" name=\"search\"  class=\"search_bar\" placeholder=\"".$_POST['search']."\">
                    <button type=\"submit\" class=\"btn_rechercher\">Rechercher<span></span></button>
                </div>
            </form>
        </div>
        ";
}
include ("./class/connexion.php");

$cnx = new connexion();
$db = $cnx->getCnx();

ini_set("memory_limit","204M");

if (isset($_POST["search"])) {
    if (!empty($_POST['search']) AND $_POST['search']!=" ") {
        $mot = "%".$_POST["search"]."%";
        $sql = "SELECT id_these,title,accesibility FROM Theses WHERE title LIKE :mot OR author LIKE :mot";
        $request = $db->prepare($sql);

        $request->bindParam('mot',$mot,PDO::PARAM_STR,500);

        $request->execute();

        if ($request->rowCount() > 0) {
            echo "<div class='right'><div class='resultat'><ul>";
            while ($line = $request->fetch()) {
                if ($line['accesibility'] == 'oui') {
                    echo "<li class='titre'>
                            <a href='https://theses.fr/".$line['id_these']."' target='_blank' class='link'>".$line['title']."</a>
                            <a href='https://theses.fr/".$line['id_these']."/document' target='_blank'>
                                <img src='img/tel.png' alt='Téléchargement' class='telechargement'>
                            </a>
                            </li><br>";
                } else {
                    echo "<li class='titre'><a href='https://theses.fr/".$line['id_these']."' target='_blank' class='link'>".$line['title']."</a></li><br>";
                }
            }
            echo "</ul></div>
            
            <div id='carte'></div>
            <script>
            // Initialize the chart
            Highcharts.mapChart('carte', {
            
                chart: {
                    map: 'countries/fr/fr-all'
                },  
                title: {
                    text: 'Highmaps basic lat/lon demo'
                },
            
                mapNavigation: {
                    enabled: true
                },
            
                tooltip: {
                    headerFormat: '',
                    pointFormat: '<b>{point.name}</b><br>Lat: {point.lat}, Lon: {point.lon}'
                },
            
                series: [{
                    // Use the gb-all map with no data as a basemap
                    name: 'Basemap',
                    borderColor: '#A0A0A0',
                    nullColor: 'rgba(200, 200, 200, 0.3)',
                    showInLegend: false
                }, {
                    name: 'Separators',
                    type: 'mapline',
                    nullColor: '#707070',
                    showInLegend: false,
                    enableMouseTracking: false
                }, {
                    // Specify points using lat/lon
                    type: 'mappoint',
                    name: 'Cities',
                    color: 'black',
                    data: [{
                        name: 'London',
                        lat: 41.507222,
                        lon: -0.1275
                    }, {
                        name: 'Birmingham',
                        lat: 42.483056,
                        lon: -1.893611
                    }, {
                        name: 'Leeds',
                        lat: 43.799722,
                        lon: -1.549167
                    }, {
                        name: 'Glasgow',
                        lat: 45.858,
                        lon: -3.259
                    }, {
                        name: 'Sheffield',
                        lat: 43.383611,
                        lon: -1.466944
                    }, {
                        name: 'Liverpool',
                        lat: 43.4,
                        lon: -3
                    }, {
                        name: 'Bristol',
                        lat: 41.45,
                        lon: -2.583333
                    }, {
                        name: 'Belfast',
                        lat: 44.597,
                        lon: -5.93
                    }, {
                        name: 'Lerwick',
                        lat: 40.155,
                        lon: -1.145,
                        dataLabels: {
                            align: 'left',
                            x: 5,
                            verticalAlign: 'middle'
                        }
                    }]
                }]
            });
            </script>
            </div>
            ";

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
                        pointFormat: '{series.name} <b>{point.percentage:.1f}%</b><br><b>{point.res}</b> résultats'
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
                        name: ' ',
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
                            for ($i = 0; $i <$lineAllDisc['cA']-1;$i++) {
                                echo "{ name: \"".$tabdiscipline[$i]."\",
                                            y:".$tabcount[$i]*100/$lineAllDisc['cA'].",res :".$tabcount[$i]."},";
                            }
                        }
                        echo "]
                    }]
                   });</script>";
            $sqlGraph2 = "SELECT YEAR(`publication_date`) as y , COUNT(`id_these`) as c FROM `Theses` WHERE `title` LIKE :mot OR `author` LIKE :mot GROUP BY YEAR(`publication_date`) ORDER BY YEAR(`publication_date`)";
            $requestGraph2 = $db->prepare($sqlGraph2);
            $requestGraph2->bindParam('mot',$mot,PDO::PARAM_STR,500);
            $requestGraph2->execute();

            $Theses = array();
            $Year = array();
            while ($lineGraph2 = $requestGraph2->fetch()) {
                array_push($Year,$lineGraph2['y']);
                array_push($Theses,$lineGraph2['c']);
            }
            echo "<figure class=\"highcharts-figure2\">
                    <div id=\"Graph2\"></div>
                  </figure>
                  <script>
            Highcharts.chart('Graph2', {
        chart: {
                    type: 'column'
        },
        title: {
                    text: 'These par année <br><p style=\"font-size:10px\">Nombre de résultats : ".$lineAllDisc['cA']."</p>'
        },
        accessibility: {
                announceNewData: { 
                    enabled: true
        }
            },
        xAxis: {
                type: 'category'
        },
        legend: {
                enabled: false
        },
        plotOptions: {
                series: {
                    borderWidth: 0,
            dataLabels: {
                        enabled: true,
                format: '{point.y}'
            }
        }
            },

        tooltip: {
                headerFormat: '<span style=\"font-size:11px\">{series.name}</span><br>',
        pointFormat: '<span style=\"color:{point.color}\">{point.name}</span>: <b>{point.y}</b> theses<br/>'
        },

        series: [
        {
            name: \" \",
            colorByPoint: true,
            data: [";
                for ($i=0;$i<sizeof($Year)-1;$i++) {
                    echo "{
                        name : \"$Year[$i]\",
                        y: $Theses[$i],
                        drilldown: null
                    },";
                }
            echo "{name : \"".$Year[sizeof($Year)-1]."\",
                    y:".$Theses[sizeof($Year)-1].",
                    drilldown: null}]
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

