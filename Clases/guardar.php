<?php
    class Guardar
    {
        public static function guardarArchivo($obj, $archivo, $tipo)
        {
            $ar = fopen($archivo, $tipo);
            if ($ar !=NULL)
            {
                fwrite($ar,json_encode($obj)."\n");
            }

            fclose($ar);
        }

        //mueve un archivo cargado por POST a la carpeta de origen del documento php
        public static function guardarFotos($key,$nombreSalida)
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

        public static function modificar($obj, $archivo)
        {
            $json = Guardar::traerlistado($archivo);
            $array = json_decode($json);
            var_dump($array);
            var_dump($json);
/*
            foreach($array as $objeto)
            {
                if ($array[i]->legajo == $obj->$leg)
                {
                    $array[i] = $obj;
                    Guardar::guardar($array,$archivo,"w");
    
                }
            }*/
        }

        public static function borrar($legajo)
        {

        }
        /*
        public static function leerPorLegajo($archivo, $leg)
        {
            $array = json_decode(traerlistado($archivo));

            for(int i=0; i<$array->count(); i++)
            {
                if ($array[i]->legajo == $leg)
                {
                    $array[i];
                }
            }
        }
        */
        public static function traerListado($archivo)
        {
            $ar = fopen($archivo, "r");
            $json;
            if ($ar !=NULL)
            {
                $json = fread($ar, filesize($archivo));
            }
            fclose($ar);
           
            return $json;   
        }
    }
?>