<?php 

namespace App\Models;  

  require_once 'Printable.php';  

class BaseElement implements Printable{
    private $title;
    public $description;
    public $visible = true;
    public $months;

    public function __construct($title, $description){
        $this->title = $title;
        $this->description = $description;
        
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

    public function getDurationAssString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
    
        return "$years Years $extraMonths Months";
    }  
    
    public function getDescription(){
        return $this->description;
    }

} 

?>