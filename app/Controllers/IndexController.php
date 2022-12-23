<?php

namespace App\Controllers;

use App\Models\Job; 
use App\Models\Project; 
use App\Models\User; 

class IndexController extends BaseController{

    public function indexAction(){       

        $jobs = Job::all();
        
        $projects = Project::all();        


        $name = "Robin Done";
        $limitMonths = 2000;

        return $this->renderHTML('index.twig', [
            'name' => $name,
            'jobs' => $jobs,
            'projects' => $projects,
        ]);
    }
}




?>