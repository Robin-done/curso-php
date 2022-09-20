<?php

    use App\Models\Job;

    $jobs = Job::all();

    function printElement($job){    
        
        echo "<ul><li>".$job->title."</li> ";
        
        echo "<li>". $job->description."</li>";
        
        echo "<li>". $job->getDurationAssString()."</li>";

        echo "</ul>";  
 
    }

?>

