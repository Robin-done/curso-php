
<?php
    $arrayvalor = [ 23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61  ];
    
     
    sort($arrayvalor);
    
    /* Foreach */
    $maxcount = count($arrayvalor) - 1;
    $mincount = 0;

   	$mayores = array_slice($arrayvalor,  $maxcount - 2,  $maxcount);
    $menores = array_slice($arrayvalor, $mincount, $mincount + 3);

    echo'<pre>';
    foreach($mayores as $m){
        echo 'Los Mayores son: '.$m.'<br>';
    }
    echo '<br>';
    foreach($menores as $m){
        echo 'Los Menores son: '.$m.'<br>';
    }
    
    echo '<br><br>';
  
    /* For */
    for ($i=0; $i < 3; $i++) { 
        echo 'Los Menores son: '.$arrayvalor[$i].'<br>';         
    }

    echo '<br>';

    rsort($arrayvalor);     
    for ($i=0; $i < 3; $i++) { 
        echo 'Los Mayores son: '.$arrayvalor [$i].'<br>';         
    } 

    echo'</pre>';

?>