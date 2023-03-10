<?php

  namespace App\Models;   

  use Illuminate\Database\Eloquent\Model;

  class Job extends Model { 
        
    protected $table = 'jobs';
        
    public function getDurationAssString(){

        $years = floor($this->months / 12);

        $extraMonths = $this->months % 12;
        
        return "Job duration: $years Years $extraMonths Months";
        
        }


    }

?>

