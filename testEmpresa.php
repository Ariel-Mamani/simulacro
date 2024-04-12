<?php
include 'Cliente.php';
include 'Moto.php';
include 'Venta.php';
include 'Empresa.php';

$objCliente1= new Cliente("estevan","quito",true,"dni","111111");
$objCliente2= new Cliente("yaqui","sieras",true,"dni","222222");
$colClientes=[$objCliente1,$objCliente2];

$objMoto1= new Moto("11",2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2= new Moto("12",594000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3= new Moto("13",999900,2023,"Zanella Patagonian Eagle 250",55,false);
$colMotos=[$objMoto1,$objMoto2,$objMoto3];

// ----------------------PUNTO 5
$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colClientes,$colMotos,$colVentas);
$colCodigos=["11","12","13"];
echo $objEmpresa->registrarVenta($colCodigos,$objCliente2);

// ----------------------PUNTO 6
/*$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colMotos,$colClientes,$colVentas);
$colCodigos=[0];
echo $objEmpresa->registrarVenta($colCodigos,$objCliente2);*/

// ----------------------PUNTO 7
/*$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colMotos,$colClientes,$colVentas);
$colCodigos=[2];
echo $objEmpresa->registrarVenta($colCodigos,$objCliente2);*/
// ----------------------PUNTO 8
/*$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colMotos,$colClientes,$colVentas);
print_r($objEmpresa->retornarVentaXCliente("dni",111111));*/

// ----------------------PUNTO 9
/*$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colMotos,$colClientes,$colVentas);
print_r($objEmpresa->retornarVentaXCliente("dni",222222));*/