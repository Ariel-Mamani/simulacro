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
               "Coleccion Clientes: "."\n".$this-> listadoClientes()."\n".
               "Coleccion Motos: "."\n".$this->listadoMotos()."\n".
               "Coleccion Ventas: "."\n".$this->listadoVentas();
    }
    //MUESTRA los datos de los clientes
    public function listadoClientes(){
        $colClientes=$this->getClientes();
        $num=count($colClientes);
        for($i=0;$i<$num;$i++){
            $cliente=$colClientes[$i];
            $lista=$cliente." ";
        }
        return $lista;
    }
    //MUESTRA los datos de las motos
    public function listadoMotos(){
        $colMotos=$this->getMotos();
        $num=count($colMotos);
        for($i=0;$i<$num;$i++){
            $moto=$colMotos[$i];
            $lista=$moto." ";
        }
        return $lista;
    }
    //MUESTRA los datos de las ventas
    public function listadoVentas(){
        $lista=" ";
        $colVentas=$this->getVentas();
        $num=count($colVentas);
        for($i=0;$i<$num;$i++){
            $venta=$colVentas[$i];
            $lista=$venta." ";
        }
        return $lista;
    }
    // ESTO SOLO LA BUSCA LA MOTO Y LA GUARDA PARA RETORNARLAAA
    public function retornarMoto($codigoMoto){
        $colMotos=$this->getMotos();
        $laMoto=null;
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
    
    public function registrarVenta($colCodigos,$objCliente){
        $precioFinal=0;
        $arrayMotos=[];
        $numVenta=count($this->getVentas());
        $fecha=date("Y");
        $objVenta= new Venta($numVenta+1,$fecha,$objCliente,$arrayMotos,0);
        if($objCliente->getEstado()!=true){
            for($i=0;$i<count($colCodigos);$i++){
                $objMoto=$this->retornarMoto($colCodigos[$i]);
                if($objMoto!=null){
                    $objVenta->incorporarMoto($objMoto);
                    
                }
            }
            $precioFinal=$objVenta->getPrecio();
        }
        $colVentas=$this->getVentas();
        array_push($colVentas,$objVenta);
        $this->setVentas($colVentas);
        return $precioFinal;
    }
   
    // RETORNA LA COLECCION DE VENTAS AL CLIENTE
    public function retornarVentaXCliente($tipo,$numDoc){
        $ventasACliente=null;
        $colVentas=$this->getVentas();
        $i=0;
        foreach($colVentas as $venta){
            if($venta->getCliente()->getDni()==$numDoc && $venta->getCliente()->getTipoDoc()==$tipo){
                    $ventasACliente[$i]=$venta;
               
            }
        }
        return $ventasACliente;
    }
}