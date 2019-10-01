<?php
    class Pizza
    {
        
        public $tipo;
        public $cantidad;
        public $sabor;
        public $precio;
        public $id;
    

        public function __construct($tipo, $cantidad, $sabor, $precio, $id)
        {
            $this->tipo = $tipo;
            $this->cantidad = $cantidad;
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->id = $id;

        }
        

        
        
    }

?>