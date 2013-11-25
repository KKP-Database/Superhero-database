<?php
class PortraitedBy
{
	private $superhero_id = null;
	private $star_id = null;

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

    public function getSuperheroId () {
        return $this->superhero_id;
    }

    public function getStarId () {
        return $this->star_id;
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $portraitedby = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from portraited_by WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $portraitedby = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $portraitedby;
    }

    public static function findByStarId ($id)
    {
        self::initializeConnection();
        $portraitedby = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from portraited_by WHERE star_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $portraitedby = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $portraitedby;
    }
}