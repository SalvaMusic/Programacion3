<?php
    class Servicio
    {
        public $id;
        public $tipo;
        public $precio;
        public $demora;
        public $nombre;

        public function __construct($nombre, $id, $tipo, $precio, $demora)
        {
            $this->nombre = $nombre;
            $this->id = $id;
            $this->tipo = $tipo;
            $this->precio = $precio;
            $this->demora = $demora;
        }
        
        public function buscarId($array)
        {
            if($array != NULL)
            {
                
                for($i = 0; $i< count($array) -1; $i++)
                {             
                    $a = $array[$i];
                    if ($a->id == $this->id)
                    {
                        return 0;
                    }
                }
            }
            
            return -1;
        }
    }

?>