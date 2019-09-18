<?php
     class alumnoDAO
    {
        public static function guardar($alumno)
        {
            if(!isset($_SESSION["alumnos"]))
            {
                $_SESSION["alumnos"] = array();
            }
            array_push($_SESSION["alumnos"],$alumno);
            echo json_encode("Alumno creado con éxito");
        }
        
        public static function traerListado()
        {
            var_dump($_SESSION["alumnos"]);
        }
    }
?>