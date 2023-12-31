<?php

namespace Discord\Bot\connect;

class Connect
{
    /** @const array */
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    /** @var \PDO */
    private static \PDO $instance;

    /**
     * Connect constructor.
     */
    final private function __construct()
    {
    }

    /**
     * @return \PDO
     */
    public static function getInstance(): ?\PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new \PDO(
                    "mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::OPTIONS
                );
            } catch (\PDOException $exception) {
                if(ENVIROMENT === 'localhost') {
                    var_dump($exception->getMessage());
                    die();
                }
                redirect('/error/problemas');
            }
        }

        return self::$instance;
    }

    /**
     * Connect clone.
     */
    /*final private function __clone()
    {
    }*/
}