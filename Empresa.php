<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;
   

    public function __construct($denominacion,$direccion,$colClientes,$colMotos,$colVentas)
    {
        $this-> denominacion=$denominacion;
        $this-> direccion=$direccion;
        $this-> colClientes=$colClientes;
        $this-> colMotos=$colMotos;
        $this-> colVentas=$colVentas;
    }
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenomionacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function getClientes(){
        return $this->colClientes;
    }
    public function setClientes($clientes){
        $this->colClientes=$clientes;
    }
    public function getMotos(){
        return $this->colMotos;
    }
    public function setMotos($colMotos){
        $this->colMotos=$colMotos;
    }
    public function getVentas(){
        return $this->colVentas;
    }
    public function setVentas($colVentas){
        $this->colVentas=$colVentas;
    }

    public function __toString()
    {
        return "Denominacion: ".$this->getDenominacion()."\n".
               "Direccion: ".$this->getDireccion()."\n".
               "Coleccion Clientes: ".$this->getClientes()."\n".
               "Coleccion Motos: ".$this->getMotos()."\n".
               "Coleccion Ventas: ".$this->getVentas();
    }
    // VERIFICA QUE ESTE LA MOTO   ++++++++++++++++++USAR EN EL TEST
    public function verificaMoto($codigoMoto){
        $colMotos=$this->getMotos();
        $verifica=false;
        $i=0;
        while($i<count($colMotos) && $verifica==false){
            if($colMotos[$i]->getCodigo()==$codigoMoto){
                $verifica=true;
            }
        }
        return $verifica;
    }
    // ESTO SOLO LA BUSCA LA MOTO Y LA GUARDA PARA RETORNARLAAA
    public function retornarMoto($codigoMoto){
        $colMotos=$this->getMotos();
        $laMoto=-1;
        $i=0;
        while($i<count($colMotos)){
            if($colMotos[$i]->getCodigo()==$codigoMoto){
                $laMoto=$colMotos[$i];
                $i=count($colMotos);
            }
            $i++;
        }
        return $laMoto;
    }
    // RETORNA UNA COLECCION DE CODIGOS
    public function creaColeccionCodigos(){
        $colMotos=$this->getMotos();
        for($i=0;$i<count($colMotos);$i++){
            $colCodigos[$i]=$colMotos[$i]->$this->getCodigo();
        }
        return $colCodigos;
    }
    public function registrarVenta($colCodigos,$objCliente){
        $precioFinal=0;
        if( $objCliente->getEstado()!=false){
            for($i=0;$i<count($colCodigos);$i++){
                $unCodigo=$colCodigos[$i];
                $verifica=$this->verificaMoto($unCodigo);
                $laMoto=$this->retornarMoto($unCodigo);
                if($verifica==true && $laMoto->getActiva()==true ){
                    $colMotos=$this->getVentas()->incorporarMoto($laMoto);
                    $precioFinal=$colMotos->$this->getVentas()->getPrecio();
                }
            }
        }
        return $precioFinal;
    }
    // VERIFICA QUE SE RELIZARON VENTAS AL CLIENTE, RETORNA TRUE O FALSE
   
    // RETORNA LA COLECCION DE VENTAS AL CLIENTE
    public function retornarVentaXCliente($tipo,$numDoc){
        $colVentas=$this->getVentas();
        $i=0;
        $verifica=false;
        foreach($colVentas as $venta){
            if($venta->getCliente()->getDni()==$numDoc){
                if($venta->getCliente()->getTipo()==$tipo){
                    $ventasACliente[$i]=$venta;
                    $verifica=true;
                }
            }
        }
        if($verifica==false){
            $ventasACliente[0]=-1;
        }
        return $ventasACliente;
    }

}