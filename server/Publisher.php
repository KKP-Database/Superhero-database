<?php
class Publisher
{
	private $publisher_id = null;
	private $name = '';

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
        return $this->director_id;
    }

    public function getName () {
        return $this->name;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $publisher = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from publisher INNER JOIN story ON publisher.publisher_id = story.publisher_id WHERE story.story_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $publisher = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $publisher;
    }

    // Should find by both first/last name in one method

    public static function findByName ($name)
    {
        self::initializeConnection();
        $publisher = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from publisher WHERE name LIKE :name");
            $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $publisher = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $publisher;
    }
}