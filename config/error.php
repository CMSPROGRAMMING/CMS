<?php

/* 
 * Zawiera metody bledów
 */

$debug = true;

function DatabaseConnectionError($message)
{
    echo "Nastapil blad polaczenia z baza danych: " . $message;
    exit;
}

function DatabaseDisonnectionError($message)
{
    echo "Nastapil blad rozlaczenia z baza danych: " . $message;
}

function DatabaseLogInsertError($message)
{
    echo "Nastapil krytyczny blad dodania logow: " . $message;
    exit;
}

function DatabaseQueryError($message)
{
    echo "Nastapił błąd zapytania: " . $message;
}

function OperationSucces()
{
     echo "Poprawnie zmodyfikowano dane!";
}

function OperationFailed()
{
    echo "Blad modyfikacji danych! Sproboj ponownie lub skontaktuj sie z administartorem!";
}

function DatabaseQuerySucces()
{
    //echo "Poprawnie dodano zapytanie!";
}

function ModelLoadError($filename)
{
    echo "Krytyczna blad warstwy modelu. Brak mozliwosci zaladowania pliku! <b>Model: " . $filename . "</b>";
    exit;
}