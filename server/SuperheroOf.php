<?php
class SuperheroOf
{
	private $story_id = null;
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

    public function getMovieId () {
        return $this->movie_id;
    }

    public function getSuperheroId () {
        return $this->superhero_id;
    }

    public static function findByStoryId ($id)
    {
        self::initializeConnection();
        $superheroof = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from superhero_of WHERE story_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superheroof = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $superheroof;
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $superheroof = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from superhero_of WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superheroof = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $superheroof;
    }
}