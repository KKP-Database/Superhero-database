<?php
class DatabasePDO
{
    private static $_instance = array();

    /*
     * I'm setting the default db name to 'testdb'.
     * FYI: I don't really have a database with username/password of root/root, just substitute
     * your actual DB
     */
    static function getInstance ($dbName = 'pawiscinth_hero')
    {
        if (! array_key_exists($dbName, self::$_instance)) {
            $dbtype = 'mysql';
            $username = 'pawiscinth';
            $password = 'Joe12345';
            $hostname = 'localhost';
            $dsn = $dbtype . ":host=" . $hostname . ";dbname=" . $dbName;
            try {
                self::$_instance[$dbName] = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage();
                die();
            }
        }
        return self::$_instance[$dbName];
    }
}