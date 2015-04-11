<?php

/* 
 * Ładuje bootstrap.pgp
 * Ładuje directory.php
 */
// Bazowy katalog aplikacji

    $app = "app";
    
//Ładowanie define katalogów
    require_once "config/directory.php";

//Ładowanie bootstrap
    require_once "$app/bootstrap.php";
