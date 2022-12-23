<?php

namespace App\Controllers;

use App\Models\User;

class UsersController extends BaseController{

    public function getAddUser(){
        return $this->renderHTML('addUser.twig');
    }
    
    public function postSaveUser($request) {         
        $postData = $request->getParsedBody();
        //Validacion
   
        $user = new User();
        $user->email = $postData['email'];
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);  
        $user->save();   
        $responseMessage = "Saved";     
        return $this->renderHTML('adduser.twig', [
            "responseMessage" => $responseMessage
        ]);
        
    }
    
}


?>