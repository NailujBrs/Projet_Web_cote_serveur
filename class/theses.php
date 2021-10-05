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


    public function __construct()
    {
        $this->author = null;
        $this->author_id = null;
        $this->title = null;
        $this->these_director = null;
        $this->these_director_id = null;
        $this->establishment = null;
        $this->establishment_id = null;
        $this->discipline = null;
        $this->status = null;
        $this->inscription_date = null;
        $this->defense_date = null;
        $this->lang = null;
        $this->these_id = null;
        $this->accessibility = null;
        $this->publication_date = null;
        $this->maj_date = null;
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
    public function getTheseDirectorName()
    {
        return $this->these_director_name;
    }

    /**
     * @param mixed $these_director_name
     */
    public function setTheseDirectorName($these_director_name)
    {
        $this->these_director_name = $these_director_name;
    }

    /**
     * @return mixed
     */
    public function getTheseDirectorSurname()
    {
        return $this->these_director_surname;
    }

    /**
     * @param mixed $these_director_surname
     */
    public function setTheseDirectorSurname($these_director_surname)
    {
        $this->these_director_surname = $these_director_surname;
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

}
?>