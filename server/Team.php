<?php
class Team
{
    private $team_id = null;
    private $name = '';
    private $alignment_id = null;
    
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
    
    public function getId ()
    {
        return $this->team_id;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getAlignmentId ()
    {
        return $this->alignment_id;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $team = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from team WHERE team_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $team = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $team;
    }

    public static function findByName ($name)
    {
        self::initializeConnection();
        $team = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from team WHERE name LIKE :name");
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $team = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $team;
    }
}