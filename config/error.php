<?php

/* 
 * Zawiera metody bledów
 */

function DatabaseConnectionError($message)
{
    echo "Nastapil blad polaczenia z baza danych: " . $message;
    exit;
}
