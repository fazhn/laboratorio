<?php include '../Conexion_Cron.php';

//QUERY PARA MOSTRAR LA INFORMACION 
$query_produccion=sqlsrv_query($conn_spc,"SELECT
    MP.PRODUCT0,
    LTRIM(RTRIM(MP.DESCRIPCION_PROD))AS DESCRIPCION_PROD,
    ISNULL((SELECT SUM(DET.CANTIDAD_PEDIDA) FROM GC_PEDIDOS_PENDIENTES_ENC ENC,GC_PEDIDOS_PENDIENTES_DET DET,MAESTRO_PRODUCTOS MPI
    WHERE ENC.ESTADO_PEDIDO IN ('P','Q','Z','B','W','K')
    AND DET.NUMERO_DE_PEDIDO=ENC.NUMERO_DE_PEDIDO
    AND DET.PRODUCT0=MPI.PRODUCT0
    AND ENC.TIPO_ENTREGA NOT IN ('2')
    AND MPI.PRODUCT0=MP.PRODUCT0), 0)AS PEDIDOS,
    (SELECT MPZ.EXISTENCIA_MINIMA FROM MAESTRO_PRODUCTOS MPZ WHERE MPZ.PRODUCT0=MP.PRODUCT0)AS EXISTENCIA_MINIMA,
    (SELECT ISNULL(SUM(L.CANTIDAD_DISPONIBLE),0) FROM LOTES L WHERE L.PRODUCT0=MP.PRODUCT0 AND L.CODIGO_BODEGA='04' AND L.CODIGO_DE_UBICACION='01')AS DISPONIBLE,
    (SELECT ISNULL(SUM(L.CANTIDAD_DISPONIBLE),0) FROM LOTES L WHERE L.PRODUCT0=MP.PRODUCT0 AND L.CODIGO_BODEGA='04' AND L.CODIGO_DE_UBICACION='01')-ISNULL((SELECT SUM(DET.CANTIDAD_PEDIDA) FROM GC_PEDIDOS_PENDIENTES_ENC ENC,GC_PEDIDOS_PENDIENTES_DET DET,MAESTRO_PRODUCTOS MPI
    WHERE ENC.ESTADO_PEDIDO IN ('P','Q','Z','B','W','K')
    AND DET.NUMERO_DE_PEDIDO=ENC.NUMERO_DE_PEDIDO
    AND DET.PRODUCT0=MPI.PRODUCT0
    AND ENC.TIPO_ENTREGA NOT IN ('2')
    AND MPI.PRODUCT0=MP.PRODUCT0), 0)AS DIFERENCIA,
    ISNULL((SELECT TOP 1 FECHA_INGRESO FROM COMPRAS_ENC CE, COMPRAS_DET CD WHERE CE.CODIGO_TIPO_COMPRA = CD.CODIGO_TIPO_COMPRA AND CE.CODIGO_DE_COMPRA = CD.CODIGO_DE_COMPRA AND CD.PRODUCT0 = MP.PRODUCT0
    ORDER BY CE.FECHA_INGRESO DESC),0) AS ULTIMO_INGRESO,   
    LTRIM(RTRIM(MP.CLASE_PRODUCTO))AS CATEGORIA
    FROM MAESTRO_PRODUCTOS MP
    WHERE MP.USAR_EN_MOVIL = 1
    AND MP.PRODUCT0 IN ('0409-020','0110-007','0110-022','0110-041','0110-008','0110-001','0110-040','0110-005','0110-002','0110-018','0110-003','0110-017','0110-038','0110-039','0110-044','0110-042','0110-043','0499-025','0499-028','0410-010','0110-013','0110-014','0405-015','0405-007','0405-001','0405-003','0405-023','0405-002','0405-009','0405-005','0405-017','0405-019','0405-018','0404-014','0404-011','0404-012','0404-013','0405-014','0403-025','0405-013','0506-030','0507-002','0507-001','0506-023','0506-017','0506-016','0506-015','0506-004','0506-022','0506-003','0506-035','0506-002','0506-001','0506-028','0507-003','0401-001','0401-003','0401-002','0401-004','0402-005','0403-021','0403-007','0403-009','0403-008','0403-010','0403-023','0412-001','9902-001','9902-002','9902-004','9902-003','9902-005','9902-007','9902-006','0499-026','0499-032','0499-037','0499-029', '0499-033','0499-036','0499-015','0410-020','0408-018','0110-010','0110-047','0110-049','0110-050','0110-051','0110-052')
    AND LTRIM(RTRIM(MP.CLASE_PRODUCTO)) = 'ARROZ'
    ORDER BY MP.DESCRIPCION_PROD");


//QUERY PARA MOSTRAR LAS PLANTAS
$query_plantas=sqlsrv_query($conn_spc,"SELECT * FROM GC_PLANTAS ORDER BY ID");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <title>Producción Imsa</title>

    <link href="../Produccion_assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../Produccion_assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="../Produccion_assets/js/modernizr.min.js"></script>


</head>

<style type="text/css">
.table > thead > tr > th,  .table > thead > tr > td{
    padding: 6px;
    font-size: 14px;
</style>



<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo text-muted font-18 m-b-15  " style="font-size: 25px; ">Industrias Molineras</a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras">

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li>
                        </li>
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-T`H`E`M`E`L`O`C`K`.`C`O`M`-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>

                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                <img src="../assets/images/users/logoPerfil.jpg" alt="user-img" class="img-circle user-img">
                                <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>

        <div class="navbar-custom">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li>
                            <a href="#"><i class="fa fa-calendar-check-o"></i> <span >Última Actualización : <span id="UltimaActualizacion"> </span></span> </a>
                        </li>

                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>
        </div>
    </header>
    <!-- End Navigation Bar-->



    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-box">

                        <h2 class=" m-t-0 m-b-30 text-center">Monitoreo de pedidos & existencia de producto </h2>

                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control" onchange="ActualizarTabla()" id="planta">
                                <?php while ($planta=sqlsrv_fetch_object($query_plantas)):
                                if ($planta->CLASE=="ARROZ") {
                                     $select="selected";
                                 }else{
                                     $select="";
                                 } ?>
                                    <option value="<?php echo $planta->CLASE ?>" <?php echo $select; ?>><?php echo $planta->DESCRIPCION ?></option>
                                <?php endwhile;  ?>

                            </select>

                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"><p class="text-muted  m-b-15 " style="font-size: 14px;"><strong><i class=" ti-time"> </i>Actualizando en :</strong> <code id="conteo"></code></p><br></div>


                        <div id="tabla">

                            <table class="table table-bordered table-hover ">
                                <thead class="btn-primary">
                                    <tr >
                                        <th class="text-white text-center">#</th>
                                        <th class="text-white text-center">Producto</th>
                                        <th class="text-white text-center">Descripción de producto</th>
                                        <th class="text-white text-center">Pedidos</th>
                                        <th class="text-white text-center">Existencia mínima</th>
                                        <th class="text-white text-center">Disponible</th>
                                        <th class="text-white text-center">Diferencia</th>
                                        <th class="text-white text-center">Último Ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $contador=1;
                                    while ($row=sqlsrv_fetch_object($query_produccion)):
                                        if ($row->EXISTENCIA_MINIMA<$row->DISPONIBLE) {
                                            $color="text-inverse";
                                        }else{
                                           $color="text-danger";
                                       }

                                       ?>
                                     <tr class="<?php echo $color ?> " >
                                        <th><?php echo $contador++;  ?></th>
                                        <td><?php echo $row->PRODUCT0;  ?></td>
                                        <td><?php echo $row->DESCRIPCION_PROD;  ?></td>
                                        <td class="text-center"><?php echo number_format($row->PEDIDOS,2); ?></td>
                                        <td class="text-center"><?php echo number_format($row->EXISTENCIA_MINIMA,2); ?></td>
                                        <td class="text-center"><?php echo number_format($row->DISPONIBLE,2); ?></td>
                                        <td class="text-center"><?php echo number_format($row->DIFERENCIA,2); ?></td>
                                        <td class="text-center"><?php echo $row->ULTIMO_INGRESO->format("Y/m/d h:i:s A");  ?></td>
                                    </tr>
                                <?php endwhile;

                                        //Free statement and connection resources
                                sqlsrv_free_stmt($query_produccion);  
                                sqlsrv_close($conn_spc); 
                                ?>
                            </tbody>
                        </table>

                    </div>


                </div>


            </div>

        </div>


        <footer class="footer">
           <p class="text-center">2018 © Developed by Ing.Fredy Zamora  </p>
       </footer>


       <!-- jQuery  -->
       <script src="../Produccion_assets/js/jquery.min.js"></script>
       <script src="../Produccion_assets/js/bootstrap.min.js"></script>
       <script src="../Produccion_assets/js/detect.js"></script>
       <script src="../Produccion_assets/js/fastclick.js"></script>
       <script src="../Produccion_assets/js/jquery.slimscroll.js"></script>
       <script src="../Produccion_assets/js/jquery.blockUI.js"></script>
       <script src="../Produccion_assets/js/waves.js"></script>
       <script src="../Produccion_assets/js/wow.min.js"></script>
       <script src="../Produccion_assets/js/jquery.nicescroll.js"></script>
       <script src="../Produccion_assets/js/jquery.scrollTo.min.js"></script>


       <!-- App js -->
       <script src="../Produccion_assets/js/jquery.core.js"></script>
       <script src="../Produccion_assets/js/jquery.app.js"></script>


       <script type="text/javascript">
        function ActualizarTabla() {
            var planta=$("#planta").val();

            $.ajax({
                type: "POST",
                url: "../Ajax/ActualizarPlantaProduccion.php",
                data:{planta:planta},
                statusCode: {
                    404: function() {
                        $('#tabla').html("<br><br><br><br><h3 class='text-center text-danger'>Parece que hay un problema con la conexión :(</h3>");
                    }
                },
                beforeSend: function(){
           //$('#DetallePartesInteresadas').show();
       },
       success: function(data){
         $('#tabla').html(data);
         ActualizarFecha();
         totalTiempo=120;
        }//FIN SUCCESS

    });


        }
    </script>


    <script type="text/javascript">
        function ActualizarFecha() {

            $.ajax({
                type: "POST",
                url: "../Ajax/ActualizarFechaPlantaProduccion.php",
                data:{},
                statusCode: {
                    404: function() {
                        $('#tabla').html("<br><br><br><br><h3 class='text-center text-danger'>Parece que hay un problema con la conexión :(</h3>");
                    }
                },
                beforeSend: function(){
           //$('#DetallePartesInteresadas').show();
       },
       success: function(data){
           $('#UltimaActualizacion').html(data);

        }//FIN SUCCESS

    });


        }
    </script>



    <script type="text/javascript">

     var totalTiempo=120;
     restar_segundos();
     ActualizarFecha();


     function restar_segundos(){

        document.getElementById('conteo').innerHTML = totalTiempo+" Segundos";
        if(totalTiempo==0)
        {

            ActualizarTabla();
            totalTiempo=120;
            setTimeout("restar_segundos()",1000);

        }else{
            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("restar_segundos()",1000);
        }
    }

</script>

</body>
</html>