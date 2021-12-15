<?php

class connexion
{
    private $user = "julian.bors";
    private $pass = "Buffon1303";

    /**
     * @return mixed
     */
    public function getCnx()
    {
        try {
            return new PDO('mysql:host=sqletud.u-pem.fr;dbname=julian.bors_db',$this->user,$this->pass);
        }
        catch (Exception $exception) {
            echo "Erreur de connexion à la BDD";
        }
    }


}
?>