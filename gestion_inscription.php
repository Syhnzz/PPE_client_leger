<?php
    include_once './common/header.php';
    include("common/menu.php");
    include_once './helpers/session_helper.php';

?>

<center>

<?php

flash('register');

require_once ("./vue/vue_insert_inscription.html");

?>
</center>