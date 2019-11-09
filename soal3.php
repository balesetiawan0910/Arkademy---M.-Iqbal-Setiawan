<?php
    thirdHighest([1,2,3,4,5,6]);
    echo("<br>");
    thirdHighest("ini bukan array");
    echo("<br>");

    thirdHighest([1,2]);
    echo("<br>");
    thirdHighest([107,1,-4,'a',true,0, -77]);

    
    function thirdHighest ($array){
        if(is_array($array)){
            $leng = count($array);
            if($leng < 3){
                echo "Minimal array length is 3!";
            }else{
                rsort($array);
               echo $array[2];
            }
        }else{
            echo "Parameter shoul be an array!";
        }
    }
?>