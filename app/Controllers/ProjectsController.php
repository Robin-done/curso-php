<?php

namespace App\Controllers;
use App\Models\Project;
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController{
    public function getAddProjectAction($request){

        $responseMessage = null;
       
        if ($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();
            $projectValidator = v::key('title', v::stringType()->notEmpty())->key('description', v::stringType()->notEmpty());
            
            try {

                $projectValidator->assert($postData);
                $postData = $request->getParsedBody();

                $files = $request->getUploadedFiles();  
                $file = $files['file'];

                if($file->getError() == UPLOAD_ERR_OK){
                    $fileName = $file->getClientFileName();
                    $fileType = $file->getClientMediaType();

                    if($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png'){                        
                        $file->moveTo("uploads/$fileName"); 

                        $project = new Project();    
                        $project->title = $postData['title'];    
                        $project->description = $postData['description'];   
                        $project->file_name = 'uploads/'.$fileName;  
                        $project->save();
                        
                        $responseMessage = "Saved";

                        }                        
                        else{
                            $responseMessage = "Image type error";
                        }
                    }
                }    
            catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            } 
        }
        return $this->renderHTML('addproject.twig', [
            "responseMessage" => $responseMessage
        ]);
    }
}

