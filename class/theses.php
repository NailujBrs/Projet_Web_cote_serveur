<?php
include("connexion.php");

class theses
{
    private $author;
    private $author_id;
    private $title;
    private $these_director;
    private $these_director_id;
    private $establishment;
    private $establishment_id;
    private $discipline;
    private $status;
    private $inscription_date;
    private $defense_date;
    private $lang;
    private $these_id;
    private $accessibility;
    private $publication_date;
    private $maj_date;

    /**
     * @param $author
     * @param $author_id
     * @param $title
     * @param $these_director
     * @param $these_director_id
     * @param $establishment
     * @param $establishment_id
     * @param $discipline
     * @param $status
     * @param $inscription_date
     * @param $defense_date
     * @param $lang
     * @param $these_id
     * @param $accessibility
     * @param $publication_date
     * @param $maj_date
     */
    public function __construct($author, $author_id, $title, $these_director, $these_director_id, $establishment, $establishment_id, $discipline, $status, $inscription_date, $defense_date, $lang, $these_id, $accessibility, $publication_date, $maj_date)
    {
        if (!empty($author)) $this->author = $author;
        if (!empty($author_id)) $this->author_id = $author_id;
        if (!empty($title)) $this->title = $title;
        if (!empty($these_director)) $this->these_director = $these_director;
        if (!empty($these_director_id)) $this->these_director_id = $these_director_id;
        if (!empty($establishment)) $this->establishment = $establishment;
        if (!empty($establishment_id)) $this->establishment_id = $establishment_id;
        if (!empty($discipline)) $this->discipline = $discipline;
        if (!empty($status)) $this->status = $status;
        if (!empty($inscription_date)) $this->inscription_date = $inscription_date;
        if (!empty($defense_date)) $this->defense_date = $defense_date;
        if (!empty($lang)) $this->lang = $lang;
        if (!empty($these_id)) $this->these_id = $these_id;
        if (!empty($accessibility)) $this->accessibility = $accessibility;
        if (!empty($publication_date)) $this->publication_date = $publication_date;
        if (!empty($maj_date)) $this->maj_date = $maj_date;
    }


    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTheseDirector()
    {
        return $this->these_director;
    }

    /**
     * @param mixed $these_director
     */
    public function setTheseDirector($these_director)
    {
        $this->these_director = $these_director;
    }


    /**
     * @return mixed
     */
    public function getTheseDirectorId()
    {
        return $this->these_director_id;
    }

    /**
     * @param mixed $these_director_id
     */
    public function setTheseDirectorId($these_director_id)
    {
        $this->these_director_id = $these_director_id;
    }

    /**
     * @return mixed
     */
    public function getEstablishment()
    {
        return $this->establishment;
    }

    /**
     * @param mixed $establishment
     */
    public function setEstablishment($establishment)
    {
        $this->establishment = $establishment;
    }

    /**
     * @return mixed
     */
    public function getEstablishmentId()
    {
        return $this->establishment_id;
    }

    /**
     * @param mixed $establishment_id
     */
    public function setEstablishmentId($establishment_id)
    {
        $this->establishment_id = $establishment_id;
    }

    /**
     * @return mixed
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * @param mixed $discipline
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        if ($this->status == "enCours") {
            return 0;
        }
        return 1;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getInscriptionDate()
    {
        return $this->inscription_date;
    }

    /**
     * @param mixed $inscription_date
     */
    public function setInscriptionDate($inscription_date)
    {
        $this->inscription_date = $inscription_date;
    }

    /**
     * @return mixed
     */
    public function getDefenseDate()
    {
        return $this->defense_date;
    }

    /**
     * @param mixed $defense_date
     */
    public function setDefenseDate($defense_date)
    {
        $this->defense_date = $defense_date;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getTheseId()
    {
        return $this->these_id;
    }

    /**
     * @param mixed $these_id
     */
    public function setTheseId($these_id)
    {
        $this->these_id = $these_id;
    }

    /**
     * @return mixed
     */
    public function getAccessibility()
    {
        if ($this->accessibility == "non") {
            return 0;
        }
        return 1;
    }

    /**
     * @param mixed $accessibility
     */
    public function setAccessibility($accessibility)
    {
        $this->accessibility = $accessibility;
    }

    /**
     * @return mixed
     */
    public function getPublicationDate()
    {
        return $this->publication_date;
    }

    /**
     * @param mixed $publication_date
     */
    public function setPublicationDate($publication_date)
    {
        $this->publication_date = $publication_date;
    }

    /**
     * @return mixed
     */
    public function getMajDate()
    {
        return $this->maj_date;
    }

    /**
     * @param mixed $maj_date
     */
    public function setMajDate($maj_date)
    {
        $this->maj_date = $maj_date;
    }

    public function afficher()
    {
        echo $this->getAuthor() . " " . $this->getAuthorId() . " " . $this->getTitle() . " " . $this->getTheseDirector() . " " . $this->getTheseDirectorId() . " " . $this->getEstablishment() . " " . $this->getEstablishmentId() . " " . $this->getDiscipline() . " " . $this->getStatus() . " " . $this->getInscriptionDate() . " " . $this->getDefenseDate() . " " . $this->getLang() . " " . $this->getTheseId() . " " . $this->getAccessibility() . " " . $this->getPublicationDate() . " " . $this->getMajDate() . "<br>";
    }

    public function save()
    {
        $cnx = new connexion();
        $db = $cnx->getCnx();

        $sql = "INSERT INTO Theses VALUES (:id_these ,:author ,:id_author ,:title ,:these_director ,
                           :id_these_director ,:establishment ,:id_establishment ,:discipline ,
                           :status ,:inscription_date ,:defense_date ,:lang ,:accesibility ,
                           :publication_date ,:maj_date);";
        $requete = $db->prepare($sql);

        $requete->bindParam('id_these', $this->these_id, PDO::PARAM_STR, 40);
        $requete->bindParam('author', $this->author, PDO::PARAM_STR, 120);
        $requete->bindParam('id_author', $this->author_id, PDO::PARAM_STR, 40);
        $requete->bindParam('title', $this->title, PDO::PARAM_STR, 500);
        $requete->bindParam('these_director', $this->these_director, PDO::PARAM_STR, 300);
        $requete->bindParam('id_these_director', $this->these_director_id, PDO::PARAM_STR, 80);
        $requete->bindParam('establishment', $this->establishment, PDO::PARAM_STR, 150);
        $requete->bindParam('id_establishment', $this->establishment_id, PDO::PARAM_STR, 40);
        $requete->bindParam('discipline', $this->discipline, PDO::PARAM_STR, 150);
        $requete->bindParam('status', $this->status, PDO::PARAM_BOOL);
        $requete->bindParam('inscription_date', $this->inscription_date, PDO::PARAM_STR, 10);
        $requete->bindParam('defense_date', $this->defense_date, PDO::PARAM_STR, 10);
        $requete->bindParam('lang', $this->lang, PDO::PARAM_STR, 10);
        $requete->bindParam('accesibility', $this->accessibility, PDO::PARAM_BOOL);
        $requete->bindParam('publication_date', $this->publication_date, PDO::PARAM_STR, 10);
        $requete->bindParam('maj_date', $this->maj_date, PDO::PARAM_STR, 10);

        $requete->execute();

    }
}

?>