<?php

namespace DB\Connexion {

    use PDOException;

    class Connexion
    {
        static function getInstance()
        {
            static $dbh = NULL;
            if ($dbh == NULL) {

                $dsn = "mysql:host=localhost:3306;dbname=promed";
                $username = "root";
                $password = "";

                /*** OPTIONS SQL ***/
                //pour expliciter le namespace, on préfixe la classe avec \
                $options = array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION //gestion des erreurs SQL
                );

                try {
                    $dbh = new \PDO($dsn, $username, $password, $options);
                } catch (PDOException $e) {
                    echo "Problème de connexion!\n\r<br>", $e;
                }
            }
            return $dbh;
        }
    }
}
