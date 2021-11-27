<?php
class Utilerias{

    public static function parametrosSonCorrectos($parametros){//arreglo
        $sonValidos = true;
        foreach($parametros as $parametro){
            if(isset($parametro)){
                if($parametro!=""){
                    $sonValidos = true;
                }else{
                    $sonValidos = false;
                }
            }else{
                $sonValidos = false;
            }
        }
        return $sonValidos;        
    }
}
?>