<?php
include 'Cliente.php';
include 'Moto.php';
include 'Venta.php';
include 'Empresa.php';

$objCliente1= new Cliente("estevan","quito",true,"dni","111111");
$objCliente2= new Cliente("yaqui","sieras",false,"dni","222222");
$colClientes=[$objCliente1,$objCliente2];

$objMoto1= new Moto("11",2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2= new Moto("12",594000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3= new Moto("13",999900,2023,"Zanella Patagonian Eagle 250",55,false);
$colMotos=[$objMoto1,$objMoto2,$objMoto3];

function mostrarDatosDeColeccion($coleccion){
    echo "++++++++ Ventas +++++++++++"."\n";
    foreach($coleccion as $elemento){
        echo $elemento."\n";
    }
}

echo " ----------------------PUNTO 1-------------------------"."\n";
$colVentas=[];
$objEmpresa= new Empresa("alta gama","Av Argenetina 123",$colClientes,$colMotos,$colVentas);
echo $objEmpresa."\n";

echo " ----------------------PUNTO 5-------------------------"."\n";
//Si la venta se realiza va a mostrar el importe total, pero puede pasar que la venta 
//no se realize porque el cliente esta dado de baja o no se encuentren los codigos 
//de las motos.
$colCodigos=["11","12","13"];
$objEmpresa->registrarVenta($colCodigos,$objCliente2);
echo $objEmpresa."\n";

echo " ----------------------PUNTO 6-------------------------"."\n";
//Si la venta se realiza va a mostrar el importe total, pero puede pasar que la venta 
//no se realize porque el cliente esta dado de baja o no se encuentren los codigos 
//de las motos.

$objEmpresa->registrarVenta(["0"],$objCliente2);
echo $objEmpresa."\n";

echo " ----------------------PUNTO 7-------------------------"."\n";
//Si la venta se realiza va a mostrar el importe total, pero puede pasar que la venta 
//no se realize porque el cliente esta dado de baja o no se encuentren los codigos 
//de las motos.
echo $objEmpresa->registrarVenta(["2"],$objCliente2)."\n";

echo " ----------------------PUNTO 8-------------------------"."\n";
//La funcion mostrarDatosDeColeccion, se va a encargar de  mostrar el arreglo/coleccion 
//que metamos por parametros
$lasVentas=$objEmpresa->retornarVentaXCliente("dni","111111");
mostrarDatosDeColeccion($lasVentas);

echo " ----------------------PUNTO 9-------------------------"."\n";
//La funcion mostrarDatosDeColeccion, se va a encargar de  mostrar el arreglo/coleccion 
//que metamos por parametros
mostrarDatosDeColeccion($objEmpresa->retornarVentaXCliente("dni","222222"));
