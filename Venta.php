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
    public function getPrecio(){
        return $this->precioFinal;
    }
    public function setPrecio($precio){
        $this->precioFinal=$precio;
    }

    public function __toString()
    {
        return "Numero: ".$this->getNumero()."\n".
               "Fecha: ".$this->getFecha()."\n".
               "Cliente: ".$this->getCliente()."\n".
               "Motos: ".$this->getMotos()."\n".
               "Precio final: ".$this->getPrecio();
    }
    public function incorporarMoto($objMoto){
        $coleccionMotos[0]=-1;
        if($objMoto->getActiva()==true){
            $coleccionMotos=$this->getMotos();
            array_push($coleccionMotos,$objMoto);
            $this->setMotos($coleccionMotos);
            $objMoto->darPrecioVenta();
            $this->setPrecio($objMoto->darPrecioVenta());
        }
        return $coleccionMotos;
    }

}