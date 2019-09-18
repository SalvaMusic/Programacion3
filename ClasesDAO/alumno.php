<?php
include "./clases/persona.php";
    class Alumno extends Persona
    {
        public function mostrar ()
        {
            // echo "Nombre: ".$this->nom;
            // echo "<br/>";
            // echo "Apellido: ".$this->ape;

            echo json_encode($this);
        }
    }
?>