<?php

class connexion
{
    private $user = "julian.bors";
    private $pass = "Buffon1303";
    private $cnx;

    public function __construct()
    {
        $cnx = new PDO('mysql:host=sqletud.u-pem.fr;dbname=julian.bors_db',$this->user,$this->pass);
    }

    /**
     * @return mixed
     */
    public function getCnx()
    {
        return $this->cnx;
    }


}
?>