<?php

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
        $this->author = $author;
        $this->author_id = $author_id;
        $this->title = $title;
        $this->these_director = $these_director;
        $this->these_director_id = $these_director_id;
        $this->establishment = $establishment;
        $this->establishment_id = $establishment_id;
        $this->discipline = $discipline;
        $this->status = $status;
        $this->inscription_date = $inscription_date;
        $this->defense_date = $defense_date;
        $this->lang = $lang;
        $this->these_id = $these_id;
        $this->accessibility = $accessibility;
        $this->publication_date = $publication_date;
        $this->maj_date = $maj_date;
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
        return $this->status;
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
        return $this->accessibility;
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

    public function afficher() {
        echo $this->getAuthor()." ".$this->getAuthorId()." ".$this->getTitle()." ".$this->getTheseDirector()." ".$this->getTheseDirectorId()." ".$this->getEstablishment()." ".$this->getEstablishmentId()." ".$this->getDiscipline()." ".$this->getStatus()." ".$this->getInscriptionDate()." ".$this->getDefenseDate()." ".$this->getLang()." ".$this->getTheseId()." ".$this->getPublicationDate()." ".$this->getMajDate()."<br>";
    }

    public function save() {

    }
}
?>