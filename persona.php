<?php

require_once 'vendor/autoload.php';

$name = "Robin Done";
$limitMonths = 2000;

use App\Models\{Job, Project, Printable};



$job1 = new Job('PHP Developer', 'Descripcion del trabajo PHP Developer');
$job1->months = 16;

$job2 = new Job('Python Dev', 'Descripcion del trabajo Python Dev');
$job2->months = 24;

$job3 = new Job('JavaScript Dev', 'Descripcion del trabajo JavaScript Dev');
$job3->months = 14;

$jobs = [
    $job1,
    $job2,
    $job3
];


$project1 = new Project('Project 1', 'Description 1');

$project = [
    $project1
];

function printElement($job){    
    
    if ($job->visible == false) {
    return;    
    }

    echo "<ul><li>".$job->getTitle()."</li> ";    
     echo "<li>". $job->description."</li>";
    
    echo "<li>". $job->getDurationAssString()."</li>";
    echo "</ul>";  

}


?>