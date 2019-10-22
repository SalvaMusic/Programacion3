<?php
    class Guardar
    {
        public static function guardarArchivo($obj, $archivo)
        {
            $ar = fopen($archivo, "a");
            if ($ar !=NULL)
            {
                fwrite($ar,json_encode($obj)."\n");
            }

            fclose($ar);
        }

        
        public static function guardarArchivoValidar($obj, $archivo)
        {
            $ar = fopen($archivo, "a");
            $retorno = -1;
            
            if ($ar !=NULL && $obj != NULL)
            {
                if(Guardar::buscarPatente(Guardar::traerListado($archivo),$obj) == -1)
                {
                    if (fwrite($ar,json_encode($obj)."\n"))
                    {
                        $retorno = 0;
                    }
                }
            }

            fclose($ar);
            return $retorno;
        }

        //mueve un archivo cargado por POST a la carpeta de origen del documento php
        /*public static function guardarFotos($key,$nombreSalida)
        {
            //muestra la informacion del archivo extraido
            //var_dump($_FILES[$key]["tmp_name"]);

            //Extraigo el archivo temporal
            $nom = $_FILES[$key]["tmp_name"];

            //Divido el nombre del archivo en arrays divididos por el punto con explode y lo doy vuelta con array reverse
            $explode = array_reverse(explode(".", $_FILES[$key]["name"]));

            //creo el nombre del destino concatenando la extencion
            $destino = $nombreSalida.".".$explode[0];

            //muevo el archivo $nombre al destino puesto
            move_uploaded_file($nom, $destino);

            print("el archivo se guardo como ".$destino);
        }
*/
        public static function buscarPatente($array, $obj)
        {

            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
            
                if ($a->patente == $obj->patente)
                {
                    return 0;
                }
            }
            return -1;
        }

        public static function retXPatente($array, $patente)
        {

            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
            
                if ($a->patente == $patente)
                {
                    return $a;
                }
            }
            return NULL;
        }

        public static function retXServicio($array, $servicio)
        {

            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
            
                if ($a->nombre == $servicio)
                {
                    return $a;
                }
            }
            return NULL;
        }

        public static function retArrayXServicio($array, $servicio)
        {
            $arrayAux = array();
            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
                if ($a->servicio == $servicio)
                {
                    array_push($arrayAux, $a); 
                }
            }
            return $arrayAux;   
        }

        public static function retArrayXMarca($array, $marca)
        {
            $arrayAux = array();
            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
                if ($a->marca == $marca)
                {
                    array_push($arrayAux, $a); 
                }
            }
            return $arrayAux;   
        }

        public static function retArrayXFecha($array, $fecha)
        {
            $arrayAux = array();
            for($i = 0; $i< count($array); $i++)
            {             
                $a = $array[$i];
                if ($a->fecha == $fecha)
                {
                    array_push($arrayAux, $a); 
                }
            }
            return $arrayAux;
            
        }

        public static function traerListado($archivo)
        {
            if (file_exists ($archivo))
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
            
           return NULL;
        }
    }
?>