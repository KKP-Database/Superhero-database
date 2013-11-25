<?php
class PortraitedIn
{
	private $movie_id = null;
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

    public function getMovieId () {
        return $this->movie_id;
    }

    public function getStarId () {
        return $this->star_id;
    }

    public static function findByMovieId ($id)
    {
        self::initializeConnection();
        $portraitedin = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from portraited_in WHERE movie_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $portraitedin = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $portraitedin;
    }

    public static function findByStarId ($id)
    {
        self::initializeConnection();
        $portraitedin = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from portraited_in WHERE star_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $portraitedin = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $portraitedin;
    }
}