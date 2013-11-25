<?php
class Team
{
    private $team_id = null;
    private $name = '';
    private $image_url = '';
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

    public function getImageUrl ()
    {
        return $this->image_url;
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
            if($name != "") $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $team = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $team;
    }
}