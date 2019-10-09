<?php
    class Pizza
    {
        public $tipo;
        public $cantidad;
        public $sabor;
        public $precio;
        public $id;
    

        public function __construct($tipo, $cantidad, $sabor, $precio)
        {
            $this->tipo = $tipo;
            $this->cantidad = $cantidad;
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->id = $_SESSION["id"];
            // $_SESSION["id"] --- sesion iniciada en el index 
            $_SESSION["id"] = $_SESSION["id"] + 1;

            
        }
        

        
        
    }

?>