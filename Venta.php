<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;
   

    public function __construct($num,$fecha,$objCliente,$colMotos,$precio)
    {
        $this-> numero=$num;
        $this-> fecha=$fecha;
        $this-> objCliente=$objCliente;
        $this-> colMotos=$colMotos;
        $this-> precioFinal=$precio;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($num){
        $this->numero=$num;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getCliente(){
        return $this->objCliente;
    }
    public function setCliente($cliente){
        $this->objCliente=$cliente;
    }
    public function getMotos(){
        return $this->colMotos;
    }
    public function setMotos($colMotos){
        $this->colMotos=$colMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    public function setPrecioFinal($precio){
        $this->precioFinal=$precio;
    }

    public function __toString()
    {
        return "Numero: ".$this->getNumero()."\n".
               "Fecha: ".$this->getFecha()."\n".
               "Cliente: ".$this->getCliente()."\n".
               "Motos: ".$this->muestraMotos()."\n".
               "Precio final: ".$this->getPrecioFinal();
    }
    //MUESTRA coleccion de motos
    public function muestraMotos(){
        $colMotos=$this->getMotos();
        $cadena=" ";
        $i=0;
        foreach($colMotos as $moto){
            $cadena= $cadena."Moto nº ".$i.$moto."\n";
        }
        return $cadena;
    }
    //INCORPORA una moto a la coleccion de motos, si es posible, y setea el precio final
    public function incorporarMoto($objMoto){
        $respuesta=false;
        if($objMoto->getActiva()==true){
            $respuesta=true;
            $coleccionMotos=$this->getMotos();
            array_push($coleccionMotos,$objMoto);
            $this->setMotos($coleccionMotos);
            $precioMoto=$objMoto->darPrecioVenta();
            $precioFinal=$this->getPrecioFinal();
            $this->setPrecioFinal($precioFinal + $precioMoto);
        }
        return $respuesta;
    }
}