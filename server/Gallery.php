<?php
require_once "./DatabasePDO.php";
class Gallery
{
	private $gallery_id = null;
	private $gallery_url = '';
	private $superhero_id = null;

	private static $dbConn = null;
    public function __construct ()
    {
        self::initializeConnection();
    }
    
    private static function initializeConnection ()
    {
        if (is_null(self::$dbConn)) {
            self::$dbConn = DatabasePDO::getInstance();
        }
    }

    public function getId () {
        return $this->id;
    }

    public function getGalleryUrl () {
        return $this->gallery_url;
    }

    public function getSuperheroId () {
        return $this->superhero_id;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $gallery = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from gallery WHERE gallery_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $gallery;
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $gallery = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from gallery WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $gallery;
    }
}