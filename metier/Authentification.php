<?php

namespace Promed\Authentification {

    // use Promed\Identite\Identite;


    // class Authentification
    // {
    //     // private $mailU = Identite::getMail();
    //     // private $mdpU = Identite::getMdp();

    //     function login($mailU, $mdpU)
    //     {
    //         if (!isset($_SESSION)) {
    //             session_start();
    //         }

    //         $util = Identite::getMail();
    //         $mdpBD = $util["mdpU"];

    //         if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
    //             // le mot de passe est celui de l'utilisateur dans la base de donnees
    //             $_SESSION["mailU"] = $mailU;
    //             $_SESSION["mdpU"] = $mdpBD;
    //         }
    //     }

    //     function logout()
    //     {
    //         if (!isset($_SESSION)) {
    //             session_start();
    //         }
    //         unset($_SESSION["mailU"]);
    //         unset($_SESSION["mdpU"]);
    //     }

    //     function isLoggedOn()
    //     {
    //         if (!isset($_SESSION)) {
    //             session_start();
    //         }
    //         $ret = false;

    //         if (isset($_SESSION["mailU"])) {
    //             $util = Identite::getMail(($_SESSION["mailU"]));
    //             if (
    //                 $util["mailU"] == $_SESSION["mailU"] && $util["mdpU"] == $_SESSION["mdpU"]
    //             ) {
    //                 $ret = true;
    //             }
    //         }
    //         return $ret;
    //     }
    // function getMailULoggedOn()
    // {
    //     if (isLoggedOn()) {
    //         $ret = $_SESSION["mailU"];
    //     } else {
    //         $ret = null;
    //     }
    //     return $ret;
    // }
    // }
}
