<?php
    class Entidades
    {
        //mueve un archivo cargado por POST a la carpeta de origen del documento php
        public static function moverArchivos($nombre,$nombreSalida)
        {
            //muestra la informacion del archivo extraido
            //var_dump($_FILES[$nombre]["tmp_name"]);

            //Extraigo el archivo temporal
            $nom = $_FILES[$nombre]["tmp_name"];

            //Divido el nombre del archivo en arrays divididos por el punto con explode y lo doy vuelta con array reverse
            $explode = array_reverse(explode(".", $_FILES[$nombre]["name"]));

            //creo el nombre del destino concatenando la extencion
            $destino = $nombreSalida.".".$explode[0];

            //muevo el archivo $nombre al destino puesto
            move_uploaded_file($nom, $destino);

            print("el archivo se guardo como ".$destino);
        }
    }
?>