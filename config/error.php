<?php

/* 
 * Zawiera metody bledów
 */

function DatabaseConnectionError($message)
{
    echo "Nastapil blad polaczenia z baza danych: " . $message;
}

function DatabaseDisonnectionError($message)
{
    echo "Nastapil blad rozlaczenia z baza danych: " . $message;
}

function DatabaseLogInsertError($message)
{
    echo "Nastapil krytyczny blad dodania logow: " . $message;
}

function DatabaseQueryError($message)
{
    echo "Nastapił błąd zapytania: " . $message;
}

function DatabaseQuerySucces()
{
    echo "Poprawnie dodano zapytanie!";
}