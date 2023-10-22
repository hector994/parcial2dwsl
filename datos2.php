<?php
include_once 'conexion.php';
        $totales = isset($_POST['totales']) ? $_POST['totales']:"";

        if ($totales === "") {
            
            $consulta = "SELECT sum(venta) as venta, year(fecha) as año 
            FROM detalle_factura 
            INNER JOIN encabezado_factura ON detalle_factura.codigo = encabezado_factura.codigo 
            GROUP BY year(fecha) ORDER by fecha ASC";
            // ORDER BY año ASC";
            $ejecutar = mysqli_query($pdo,$consulta);
            while ($data=mysqli_fetch_array($ejecutar)) {
                $ventastotales = number_format($data[0],2,'.','');
                echo $ventastotales.",";
            }
        
        } else {
            
            $consulta = "SELECT sum(venta) as venta, year(fecha) as año 
            FROM detalle_factura 
            INNER JOIN encabezado_factura ON detalle_factura.codigo = encabezado_factura.codigo 
            GROUP BY year(fecha)
            HAVING SUM(venta) >= $totales ORDER by fecha ASC";
            //ORDER BY año ASC";

            $consulta2 = "SELECT year(fecha) as año FROM detalle_factura 
            INNER JOIN encabezado_factura ON detalle_factura.codigo = encabezado_factura.codigo 
            GROUP BY year(fecha) HAVING SUM(venta) >= $totales ORDER by fecha ASC";

            $ejecutar = mysqli_query($pdo,$consulta);
            $ejecutar2 = mysqli_query($pdo,$consulta2);
            
            while ($data=mysqli_fetch_array($ejecutar)) {
                
                $ventastotales = number_format($data['venta'],2,'.','');                
                $yearZ2 = number_format($data['año'],0,'','');

                if(empty($yearSelect)) 
                {
                    echo $ventastotales.",";
                } else {
                    while ($periodos = mysqli_fetch_array($ejecutar2)) {
                        $yearZ = number_format($periodos['año'],0,'','');
                        if(in_array($yearZ, $yearSelect)){
                            echo $ventastotales.","; 
                        }
                        break;
                    }

                }
            }
        
        } 

        ?>