<?php

namespace DB\Connexion {

    use PDOException;

    class Connexion
    {
        static function getInstance()
        {
            static $dbh = NULL;
            if ($dbh == NULL) {
                $PARAM_hote = 'localhost'; //serveur local (redirige vers MYSQL via le port 3306 par défaut)

                //config serveur sio
                $PARAM_nom_bd = 'promo23_mariecaroline';  // nom de la base de données
                $username = 'promo23'; // nom d'utilisateur
                $password = 'user@sio23'; // mot de passe de l'utilisateur

                //config serveur local
                // $PARAM_nom_bd = 'promed';  // nom de la base de données
                // $username = 'root'; // nom d'utilisateur
                // $password = ''; // mot de passe de l'utilisateur

                $dsn = "mysql:host=$PARAM_hote:3306;dbname=$PARAM_nom_bd";

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
