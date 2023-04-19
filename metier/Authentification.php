<?php

namespace Promed\Authentification {

    use DAO\Identite\IdentiteDAO;

    class Authentification
    {
        static function login($mail, $mdp)
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $util = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($mail);
            $mdpBD = $util["mdp"];
            $role = $util["role"];
            echo "$mail, $mdpBD, $mdp";
            var_dump(password_verify($mdp, $mdpBD));

            $verify = password_verify($mdp, $mdpBD);

            if ($verify) {
                // le mot de passe est celui de l'utilisateur dans la base de donnees
                $_SESSION["mail"] = $mail;
                $_SESSION["mdp"] = $mdpBD;
                $_SESSION["role"] = $role;
            }
        }

        static function logout()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            unset($_SESSION["mail"]);
            unset($_SESSION["mdp"]);
            unset($_SESSION["role"]);
            header('Location: ./');
        }

        static function isLoggedOn()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $ret = false;

            if (isset($_SESSION["mail"])) {
                $util = IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
                if (
                    $util["mail"] == $_SESSION["mail"] && $util["mdp"] == $_SESSION["mdp"]
                ) {
                    $ret = true;
                }
            }
            return $ret;
        }

        function getMailULoggedOn()
        {
            if (Authentification::isLoggedOn()) {
                $ret = $_SESSION["mail"];
            } else {
                $ret = null;
            }
            return $ret;
        }
    }
}
