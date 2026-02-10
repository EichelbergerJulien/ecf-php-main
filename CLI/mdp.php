<?php

$mdp = password_hash("motdepasse", PASSWORD_BCRYPT);

var_dump(password_verify("motdepase", $mdp));

