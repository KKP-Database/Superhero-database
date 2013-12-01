<?php
class Superhero
{
    private $superhero_id = null;
    private $name = '';
    private $real_name = '';
    private $nickname = '';
    private $image_url = '';
    private $alignment_id = null;
    private $power_id = '';

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
        return $this->superhero_id;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getRealName ()
    {
        return $this->real_name;
    }

    public function getNickname ()
    {
        return $this->nickname;
    }

    public function getImageUrl ()
    {
        return $this->image_url;
    }

    public function getAlignmentId ()
    {
        return $this->alignment_id;
    }

    public function getPowerId ()
    {
        return $this->power_id;
    }

    public static function findAll ()
    {
        self::initializeConnection();
        $superhero = null;
        $name = "";
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from superhero WHERE name LIKE :name");
            $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $superhero;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $superhero = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from superhero WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $superhero;
    }

    public static function findByName ($name)
    {
        self::initializeConnection();
        $superhero = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT * from superhero WHERE name LIKE :name");
            if($name != "") $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $superhero = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $superhero;
    }
}