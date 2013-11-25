<?php
class MemberOf
{
	private $superhero_id = null;
	private $team_id = null;
    private $status = '';

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

    public function getStatus () {
        return $this->status;
    }

    public function getTeamId () {
        return $this->team_id;
    }

    public static function findBySuperheroId ($id)
    {
        self::initializeConnection();
        $memberof = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from member_of WHERE superhero_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $memberof = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $memberof;
    }

    public static function findByTeamId ($id)
    {
        self::initializeConnection();
        $memberof = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from member_of WHERE team_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $memberof = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $memberof;
    }
}