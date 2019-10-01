<?php
    class Guardar
    {

        public static function guardarFotos($keya,$keyb,$nombreSalida)
        {
            //muestra la informacion del archivo extraido
            //var_dump($_FILES[$key]["tmp_name"]);
            $carpeta = './images/pizzas';
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            //Extraigo el archivo temporal
            $noma = $_FILES[$keya]["tmp_name"];
            $nomb = $_FILES[$keyb]["tmp_name"];
            

            //Divido el nombre del archivo en arrays divididos por el punto con explode y lo doy vuelta con array reverse
            $explodea = array_reverse(explode(".", $_FILES[$keya]["name"]));
            $explodeb = array_reverse(explode(".", $_FILES[$keyb]["name"]));

            //creo el nombre del destino concatenando la extencion
            $destinoa = $nombreSalida."a.".$explodea[0];
            $destinob = $nombreSalida."b.".$explodeb[0];

            //muevo el archivo $nombre al destino puesto
            move_uploaded_file($noma, $destinoa);
            move_uploaded_file($nomb, $destinob);

        }
       
        public static function guardarArchivo($obj, $archivo)
        {

            $json = json_encode($obj);
            $aux = false;
        
            if(file_exists($archivo))
		    {
                $archivo = fopen($archivo, "a");
                
		    }else
		    {
			    $archivo = fopen($archivo, "w");	 
            }   
            $renglon = $json.="\r\n";
            
            fwrite($archivo, $renglon); 
           
		   		 
		    fclose($archivo);
        }

        
        public static function buscarSabor($array, $obj)
        {

            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
            
                if ($a->tipo == $obj->tipo && $a->sabor == $obj->sabor)
                {
                    return 0;
                }
            }
            return -1;
        }

        public static function traerListado($archivo)
        {
            $ar = fopen($archivo, "r");
            $array = array();

            if ($ar !=NULL)
            {
                while(!feof($ar))
                {
                    array_push($array, json_decode(fgets($ar)));
                }
            }

            fclose($ar);
            return $array;
        }
      
    }
?>