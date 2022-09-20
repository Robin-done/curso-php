<?php

    use App\Models\Project;

    $projects = Project::all();

    function printProject($project){    
        
        echo "<ul><li>".$project->title."</li> ";
        
        echo "<li>". $project->description."</li>";    

        echo "</ul>";  
 
 }

?>

