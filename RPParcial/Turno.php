<?php
    class Turno
    {
        public $patente;
        public $precio;
        public $fecha;
        public $servicio;

        public function __construct($patente, $precio, $servicio, $fecha)
        {
            $this->patente = $patente;
            $this->precio = $precio;
            $this->servicio = $servicio;
            $this->fecha = $fecha;
        }
        
        public function buscarCupo($array)
        {
            if($array != NULL)
            {
                
                for($i = 0; $i< count($array) ; $i++)
                {             
                    $a = $array[$i];
                    if ($a->fecha == $this->fecha)
                    {
                        return 0;
                    }
                }
            }
            
            return -1;
        }
    }

?>