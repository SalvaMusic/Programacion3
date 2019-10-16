<?php
    class Vehiculo
    {
        public $marca;
        public $patente;
        public $kms;

        public function __construct($marca, $patente, $kms)
        {
            $this->marca = $marca;
            $this->patente = $patente;
            $this->kms = $kms;
        }
        
        public function buscarPatente($array)
        {
            if($array != NULL)
            {
                
                for($i = 0; $i< count($array); $i++)
                {             
                    $a = $array[$i];
                    if ($a->patente == $this->patente)
                    {
                        return 0;
                    }
                }
            }
            
            return -1;
        }
    }

?>