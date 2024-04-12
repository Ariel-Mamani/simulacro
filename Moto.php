<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncremento;
    private $activa;

    public function __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa)
    {
        $this-> codigo=$codigo;
        $this-> costo=$costo;
        $this-> anioFabricacion=$anio;
        $this-> descripcion=$descripcion;
        $this-> porcentajeIncremento=$porcentaje;
        $this-> activa=$activa;
        
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function getAnio(){
        return $this->anioFabricacion;
    }
    public function setAnio($anio){
        $this->anioFabricacion=$anio;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function getPorcentaje(){
        return $this->porcentajeIncremento;
    }
    public function setPorcentaje($porcentaje){
        $this->porcentajeIncremento=$porcentaje;
    }
    public function getActiva(){
        return $this->activa;
    }
    public function setActiva($activa){
        $this->activa=$activa;
    }
    public function __toString()
    {
        return "Codigo: ".$this->getCodigo()."\n".
               "Costo: ".$this->getCosto()."\n".
               "Año de fabricacion: ".$this->getAnio()."\n".
               "Descripcion: ".$this->getDescripcion()."\n".
               "Porcentaje de incremento anual: ".$this->getPorcentaje()."\n".
               "Activa: ".$this->getActiva();
    }
public function darPrecioVenta(){
    $venta=-1;
    $disponible=$this->getActiva();
    $anio=2024-$this->getAnio();
    $porcentaje=$this->getPorcentaje();
    if($disponible==true){
        $venta=$this->getCosto()+$this->getCosto()*($anio*$porcentaje);
    }
    return $venta;
}
}