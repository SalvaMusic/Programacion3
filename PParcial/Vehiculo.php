<?php
    class Vehiculo
    {
        public $marca;
        public $modelo;
        public $patente; 
        public $precio;

        public function __construct($marca, $modelo, $patente, $precio)
        {
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->patente = $patente;
            $this->precio = $precio;
            
        }

        public function mostrar()
        {
            //var_dump($this);
        }
        
    }

?>