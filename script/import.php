<?php
include("../class/theses.php");
include("../class/dump.php");

$dump = new dump();

$file = fopen("../files/extraction.csv", "r") or die ("Impossible to open the file");
fgets($file);

while (!feof($file)) {
    $line = fgets($file);
    $sep = explode(";", $line);
    $these = new theses($sep[0], $sep[1], $sep[2], $sep[3], $sep[5], $sep[6], $sep[7], $sep[8], $sep[9],$dump->changeDate($sep[10]),$dump->changeDate($sep[11]), $sep[12], $sep[13], $sep[14],$dump->changeDate($sep[15]),$dump->changeDate($sep[16]));
    $these->save();

}
fclose($file);

?>