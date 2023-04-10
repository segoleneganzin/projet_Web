<?php

//methode de hachage de mot de passe
$mdp_brut = $_POST["mdp"];
$hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
