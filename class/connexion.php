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
        return new PDO('mysql:host=sqletud.u-pem.fr;dbname=julian.bors_db',$this->user,$this->pass);
    }


}
?>