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

        <title>Mapa</title>


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />


        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>   



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

                              <div class="card-box" >
                                <div id="gmaps-markers" class="gmaps"></div>
                              </div>
                              
                              <br><br>

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

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjyM0CyjiksJbMk4SVzZTz-Uzn5QusoRE&callback=initMap"></script>


      <script>
        var map;
        function initMap() {
          map = new google.maps.Map(
            document.getElementById('gmaps-markers'),
            {center: new google.maps.LatLng(13.705243,-89.24231), zoom: 6});

          var iconBase ='https://developers.google.com/maps/documentation/javascript/examples/full/images/';

          var icons = {
            parking: {
              icon: iconBase + 'parking_lot_maps.png'
            },
            library: {
              icon: iconBase + 'library_maps.png'
            },
            info: {
              icon: iconBase + 'info-i_maps.png'
            }
          };

          var features = [
          {
            position: new google.maps.LatLng(13.705243,-89.24231),
            type: 'parking',
            title: 'PUNTO 3'

          }, {
            position: new google.maps.LatLng(13.696674,-89.197927),
            type: 'parking',
            title: 'PUNTO 2'
          }, {
            position: new google.maps.LatLng(14.692511,-87.86136),
            type: 'parking',
            title: 'PUNTO 3'
          }, {
            position: new google.maps.LatLng(12.022747,-86.252007),
            type: 'parking',
            title: 'PUNTO 4'
          }, {
            position: new google.maps.LatLng(8.103289,-80.596013),
            type: 'parking',
            title: 'PUNTO 5'

          }];

        // Create markers.
        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            map: map,   
            label: features[i].title
          });
        };
      }
    </script>


    </body>
</html>

       


