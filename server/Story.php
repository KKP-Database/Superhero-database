<?php
class Story
{
	private $story_id = null;
	private $name = '';
	private $plot = '';
	private $created_year = ''; // Collect as DATE
	private $publisher_id = null;

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
        return $this->story_id;
    }

    public function getName () {
        return $this->name;
    }

    public function getPlot () {
        return $this->plot;
    }

    public function getCreatedYear () {
        return $this->created_year;
    }

    public function getPublisherId () {
        return $this->publisher_id;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $story= null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from story WHERE story_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $story = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $story;
    }

    public static function findByName ($name)
    {
        self::initializeConnection();
        $story = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from story WHERE name LIKE :name");
            $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $story = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $story;
    }

    // Maybe add find by imdb score (Movie score > 7.5), release date (movie release in 2013)
}