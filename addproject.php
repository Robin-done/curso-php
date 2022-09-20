<?php

    require_once 'vendor/autoload.php';

    use Illuminate\Database\Capsule\Manager as Capsule;

    use App\Models\Project;

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

    if (!empty($_POST)) {

        $project = new Project();

        $project->title = $_POST['title'];

        $project->description = $_POST['description'];
        
        $project->save();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Add Project</title>
</head>
<body>
    <div class="container-form">    
        <h2> Add Project</h2>
        <form action="addproject.php"  method="post">           
            <input type="text" name="title"  placeholder="Title">
                     
            <input type="text" name="description"  placeholder="Description">
            
            <input type="submit" name="submit"  value="Enviar" class="btn">
        </form> 
    </div>   
</body>
</html>

