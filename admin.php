<!doctype html>
<html>

<head>
    <?php
        include("includes/headerAdmin.php");
    ?>
        <?php
        include("includes/head.php");
    ?>



</head>

<body>

    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="chart-container">
                        <canvas id="mycanvas"></canvas>
                        <canvas id="mycanvas2"></canvas>
                    </div>
                  
                 </div>
                </div>
                    </div>
               </div>
            </div>
        </div>
     </section>

		<!-- javascript -->
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
        
        <br />
        <section/>
        <!-- Footer section -->
        <?php
            include("includes/footer.php");
        ?>
</body>

</html>