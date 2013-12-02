<?php
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
        return $this->alignment_id;
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
            "SELECT  * from alignment WHERE alignment_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $alignment = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $alignment;
    }

    // NOTE: A lot of same word 'alignment' used. PHP allow it?

    public static function findByAlignment ($name)
    {
        self::initializeConnection();
        $alignment = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from alignment WHERE alignment LIKE :alignment");
            $name = "%" . $name . "%";
            $statement->bindValue(":alignment", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $alignment = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $alignment;
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $alignment = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from alignment INNER JOIN superhero ON alignment.alignment_id = superhero.alignment_id WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $alignment = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $alignment;
    }
}