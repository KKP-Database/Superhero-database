<?php
class Author
{
	private $author_id = null;
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
        return $this->author_id;
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
        $author = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from author WHERE author_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $author = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $author;
    }

    // Should find by both first/last name in one method

    public static function findByName ($name)
    {
        self::initializeConnection();
        $author = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from author WHERE first_name LIKE :name or last_name LIKE :name");
            $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $author = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $author;
    }
}