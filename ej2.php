<?php 

 $paises = [
    
       'clavep1' => ['valor1','valor2','valor3'],
    
       'clavep2' => ['valor1','valor2','valor3'],
    
       'clavep3' => ['valor1','valor2','valor3'], 
    
       'clavep4' => ['valor1','valor2','valor3'],
    
       'clavep5' => ['valor1','valor2','valor3']
     
 ];
    echo '<pre>';
        //var_dump($paises);

        foreach($paises as $cl=>$val){
          echo $cl.': ';
          foreach ($val as  $value) {
            echo $value.' ';
          }
          echo '<br> <br>';
        }
    echo '</pre>';

?>