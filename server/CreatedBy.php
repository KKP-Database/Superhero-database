<?php
class CreatedBy
{
	private $story_id = null;
	private $author_id = null;

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

    public function getStoryId () {
        return $this->story_id;
    }

    public function getAuthorId () {
        return $this->author_id;
    }

    public static function findByStoryId ($id)
    {
        self::initializeConnection();
        $createdby = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from created_by WHERE story_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $createdby = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $createdby;
    }

    public static function findByAuthorId ($id)
    {
        self::initializeConnection();
        $createdby = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from created_by WHERE author_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $createdby = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $createdby;
    }
}