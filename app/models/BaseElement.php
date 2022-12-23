<?php 

namespace App\Models;    

class BaseElement implements Printable{
    private $title;
    public $description;
    public $file_name;
    public $visible = true;
    public $months;

    public function __construct($title, $description, $file_name){
        $this->title = $title;
        $this->description = $description;
        $this->file_name = $file_name;
        
    }

    public function setTitle($t){

        if($t == ''){
            $this->title = 'N/A';
        }else{
            $this->title = $t;
        }
    }

    public function getTitle(){        
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getfileName(){
        return $this->file_name;
    }

    public function getDurationAssString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
    
        return "$years Years $extraMonths Months";
    }  
    
   

} 

?>