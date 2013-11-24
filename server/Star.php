<?php
class Star
{
	private $star_id = null;
	private $first_name = '';
	private $last_name = '';
	private $birthdate = '';
	private $image_url = '';

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
        return $this->star_id;
    }

    public function getFirstName () {
        return $this->first_name;
    }

    public function getLastName () {
        return $this->last_name;
    }

    public function getBirthdate () {
        return $this->birthdate;
    }

    public function getImageUrl () {
        return $this->image_url;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $star = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from star WHERE star_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $star = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $star;
    }

    // Should find by both first/last name in one method

    public static function findByName ($name)
    {
        self::initializeConnection();
        $star = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from star WHERE first_name LIKE :name or last_name LIKE :name");
            $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $star = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $star;
    }
}