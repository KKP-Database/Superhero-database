<?php
class Power
{
	private $power_id = null;
	private $intelligence = null;
	private $strength = null;
	private $speed = null;
	private $durability = null;
	private $power = null;
	private $combat = null;

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
        return $this->power_id;
    }

    public function getIntelligence () {
        return $this->intelligence;
    }

    public function getStrength () {
        return $this->strength;
    }

    public function getSpeed () {
        return $this->speed;
    }

    public function getDurability () {
        return $this->durability;
    }

    public function getPower () {
        return $this->power;
    }

    public function getCombat () {
        return $this->combat;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $power = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from power WHERE power_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $power = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $power;
    }

    public static function findAvg ($id)
    {
        self::initializeConnection();
        $power = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT (intelligence + strength + speed + durability + power + combat)/60.0 from power WHERE power_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $power = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $power;   
    }

    public static function findAllAvg ()
    {
        self::initializeConnection();
        $power = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT (intelligence + strength + speed + durability + power + combat)/60.0, power_id from power ORDER BY (intelligence + strength + speed + durability + power + combat)/6.0 DESC");
            $statement->execute();
            $power = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $power;   
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $power = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from power INNER JOIN superhero ON power.power_id = superhero.power_id WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $power = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $power;
    }

    // Maybe add find by each power attributes (Hero who have speed > 100)
}