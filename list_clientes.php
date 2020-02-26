<?php

session_start();

?>

<!DOCTYPE html>
<html> 
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Listado Clientes</title>


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>   



        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />



    </head>


    <body class="fixed-left" >
         
    <?php include("header.php") ?>

     </div><!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                              <div class="card-box table-responsive" >

                               <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"><br>

                                <table id="datatable" class="table table-bordered ">

                                  <thead class="btn-primary">

                                    <h2 class="m-t-0 m-b-50 text-center"><strong>Listado de clientes</strong></h2>
                                    <tr>
                                      <th class="text-white">Nombre</th>
                                      <th class="text-white">Latitud</th>
                                      <th class="text-white">Longitud </th>
                                    </tr>

                                  </thead>
                                  
                                  <tbody>

                                      <tr class="w3-hover-orange">
                                        <td>Punto 1</td>
                                        <td>13.705243</td>
                                        <td>-89.24231</td>
                                       
                                      </tr>

                                      <tr class="w3-hover-orange">
                                        <td>Punto 2</td>
                                        <td>13.696674</td>
                                        <td>-89.197927</td>

                                      </tr>


                                      <tr class="w3-hover-orange">
                                        <td>Punto 3</td>
                                        <td>14.692511</td>
                                        <td>-87.86136</td>

                                      </tr>


                                      <tr class="w3-hover-orange">
                                        <td>Punto 4</td>
                                        <td>12.022747</td>
                                        <td>-86.252007</td>

                                      </tr>


                                    </tbody>

                                  </table>

                                </div>

                                
                              </div>

                          </div>
                      </div>
                      <!-- end col -->
                  </div>
                  <!-- container -->
              </div>
              <!-- content -->

             </div>

              <footer class="footer text-right">
                <?php include("footer.php") ?>
            </footer>

         <!-- ============================================================== -->
         <!-- End Right content here -->
         <!-- ============================================================== -->


        <script>
            var resizefunc = [];
        </script>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>



        <script type="text/javascript">  
          $(document).ready(function() {
            $('#datatable').DataTable();

          });
        </script>



    </body>
</html>

       


