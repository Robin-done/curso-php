<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

use App\Models\Job;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cursophp',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

include 'persona.php';
include 'porjecto-persona.php';

$name = "Robin Done";
$limitMonths = 2000;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>

        <h3>Hola <?php echo $name; ?></h3>

        <h3>Trabajos</h3>
        <?php
        $totalMonths = 0;

        for ($i=0; $i < count($jobs); $i++) { 

            $totalMonths += $jobs[$i]->months; 

            if($totalMonths > $limitMonths){
                break;
            }

            printElement($jobs[$i]);   
            
        }        
        ?>    
        
        <h3>Proyectos</h3>
        <?php        

        for ($i=0; $i < count($projects); $i++) { 

            $totalMonths += $projects[$i]->months; 

            if($totalMonths > $limitMonths){
                break;
            }

            printProject($projects[$i]);   
            
        }        
        ?>  
            
    </body>
</html>