<?php

session_start();

$hora = date("G");
if ($hora >= 12 and $hora <= 17) {
    $mjs = "Buenas Tardes";
} elseif ($hora >= 18 and $hora <= 23) {
    $mjs = "Buenas Noches";
} elseif ($hora >= 1 and $hora <= 11) {
    $mjs = "Buenos Dias";
}
?>
 
<!DOCTYPE html>
<html> 
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Inicio</title>



        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />



        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>   


        <style type="text/css" media="screen">
        .ml13 {
          font-weight: 200;
          font-size: 1.8em;
          text-transform: uppercase;
          letter-spacing: 0.5em;
        }

        .ml13 .letter {
          display: inline-block;
          line-height: 1em;
        }


      </style>  


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
                            <div class="col-lg-12 col-md-12">
                              <div class="card-box">
                                <center >
                                   <img src="assets\animaciones\hello.gif" class="img-responsive" alt="user" style="width:500px"  alt="Portada">

                                  <h1 class="ml13"><?php echo $_SESSION['NOMBRE']." ".$mjs ?></h1>
                                  
                                </center>
                              </div>
                              <br><br>

                          </div>
                      </div>
                      <!-- end col -->
                  </div>
                  <!-- container -->
              </div>
              <!-- content -->
              <footer class="footer text-right">
                <?php include("footer.php") ?>
            </footer>
        </div>
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


        <!-- anime js -->
         <script src="assets/js/anime.min.js"></script>


         <script type="text/javascript">
          $('.ml13').each(function(){
            $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
          });

          anime.timeline({loop: true})
          .add({
            targets: '.ml13 .letter',
            translateY: [100,0],
            translateZ: 0,
            opacity: [0,1],
            easing: "easeOutExpo",
            duration: 1400,
            delay: function(el, i) {
              return 300 + 30 * i;
            }
          }).add({
            targets: '.ml13 .letter',
            translateY: [0,-100],
            opacity: [1,0],
            easing: "easeInExpo",
            duration: 1200,
            delay: function(el, i) {
              return 100 + 30 * i;
            }
          });


        </script>

    </body>
</html>

       


