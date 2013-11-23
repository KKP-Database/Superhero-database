<?php
require_once "./DatabasePDO.php";
class Alignment
{
	private $alignment_id = null;
	private $alignment = '';

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

    public function getAlignment () {
        return $this->alignment;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $alignment = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from alignment WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $alignment;
    }

    // NOTE: A lot of same word 'alignment' used. PHP allow it?

    public static function findByAlignment ($alignment)
    {
        self::initializeConnection();
        $alignment = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from alignment WHERE alignment LIKE :alignment");
            $statement->bindValue(":alignment", $alignment);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $alignment;
    }
}