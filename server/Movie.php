<?php
class Movie
{
	private $movie_id = null;
	private $name = '';
	private $plot = '';
	private $release_date = ''; // Collect as DATE
	private $imdb_score = null;
	private $poster_url = '';
	private $trailer_url = '';
    private $director_id = null;

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
        return $this->movie_id;
    }

    public function getName () {
        return $this->name;
    }

    public function getPlot () {
        return $this->plot;
    }

    public function getReleaseDate () {
        return $this->release_date;
    }

    public function getImdbScore () {
        return $this->imdb_score;
    }

    public function getPosterUrl () {
        return $this->poster_url;
    }

    public function getTrailerUrl () {
        return $this->trailer_url;
    }

    public function getDirectorId() {
        return $this->director_id;
    }

    public static function findById ($id)
    {
        self::initializeConnection();
        $movie = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from movie WHERE movie_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $movie = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $movie;
    }

    public static function findByName ($name)
    {
        self::initializeConnection();
        $movie = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from movie WHERE name LIKE :name");
            if($name != "") $name = "%" . $name . "%";
            $statement->bindValue(":name", $name);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $movie = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $movie;
    }

    // Maybe add find by imdb score (Movie score > 7.5), release date (movie release in 2013)
}