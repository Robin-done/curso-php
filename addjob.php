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

    if (!empty($_POST)) {

        $job = new Job();

        $job->title = $_POST['title'];

        $job->description = $_POST['description'];

        $job->save();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Add Job</title>
</head>
<body>
    <div class="container-form">    
        <h2> Add Job</h2>
        <form action="addjob.php"  method="post">           
            <input type="text" name="title"  placeholder="Title">
                     
            <input type="text" name="description"  placeholder="Description">
            
            <input type="submit" name="submit"  value="Enviar" class="btn">
        </form> 
    </div>   
</body>
</html>

