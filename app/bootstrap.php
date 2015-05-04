<?php

/* 
 * Ładuje loader.php
 * Ładuje index.php [kontroler]
 */

require_once CONFIG_DIR . 'loader.php';

if($mode == "user")
{
    require_once CONTROLLERS_DIR . 'index.php';
}
else 
{
    require_once CONTROLLERS_DIR . 'admin.php';  
}

