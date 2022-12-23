<?php

namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
    public function getAddJobAction($request){

        $responseMessage = null;

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            //Validation
            $jobValidator = v::key('title', v::stringType()->notEmpty())->key('description', v::stringType()->notEmpty());

                try {

                    $jobValidator->assert($postData);
                    $postData = $request->getParsedBody();
                    $files = $request->getUploadedFiles();  
                    $file = $files['file'];
                  
                    if($file->getError() == UPLOAD_ERR_OK){
                        $fileName = $file->getClientFileName();
                        $fileType = $file->getClientMediaType();

                        if($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png'){                        
                            $file->moveTo("uploads/$fileName");                           

                            $job = new Job();
                            $job->title = $postData['title'];
                            $job->description = $postData['description'];
                            $job->file_name = 'uploads/'.$fileName;
                            $job->save();

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
        return $this->renderHTML('addjob.twig', [
            "responseMessage" => $responseMessage
        ]);
    }
}

