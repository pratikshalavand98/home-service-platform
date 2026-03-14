<?php

class DB
{
    public const HOST = "localhost";
    public const DBNAME = "hsp";
    public const USERNAME = "root";
    public const PASSWORD = "";
 
    /**
     * PDOStatement object used by Database class
     *
     * @var \PDOStatement
     */
    protected static $_stmt = null;

    /**
     * method returns the connection to the database
     *
     * @throws \PDOException
     *
     * @return PDO connection object
     */
    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USERNAME, self::PASSWORD, []);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Query performs query on database
     *
     * @param string $sql SQL query to be performed
     * @param array $params Parameters to be bound
     *
     * @return mixed
     */
    public static function query($sql, $params = array())
    {
        try {
            $conn = self::getConnection();
            if ($conn === null) {
                throw new PDOException("Connection failed");
            }

            self::$_stmt = $conn->prepare($sql);
            
            if (strstr($sql, "SELECT") === false) {
                return self::$_stmt->execute($params);
            }

            self::$_stmt->execute($params);

            return self::$_stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function getStmt()
    {
        return self::$_stmt;
    }
}
