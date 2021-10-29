<?php

class connexion
{
    //private $user = "julian.bors";
    private $user = "root";
    //private $pass = "Buffon1303";
    private $pass = "";

    /**
     * @return mixed
     */
    public function getCnx()
    {
        //return new PDO('mysql:host=sqletud.u-pem.fr;dbname=julian.bors_db',$this->user,$this->pass);
        return new PDO('mysql:host=localhost;dbname=theses',$this->user,$this->pass);
    }


}
?>