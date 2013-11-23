<?php
require_once "./DatabasePDO.php";
class Director
{
	private $director_id = null;
	private $first_name = '';
	private $last_name = '';

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

    public function getFirstName () {
        return $this->first_name;
    }

    public function getLastName () {
        return $this->last_name;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $director = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from director WHERE director_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $director;
    }

    // Should find by both first/last name in one method

    public static function findByName ($name)
    {
        self::initializeConnection();
        $director = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from director WHERE first_name = :name or last_name = :name");
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $director;
    }
}