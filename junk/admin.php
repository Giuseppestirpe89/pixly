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
    
<!-- display chart section -->
    <section id="intro" class="intro-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="chart-container">
                           <!--dispaly the chart in the divs area -->
                        <canvas id="mycanvas"></canvas> <br/>
                        <canvas id="mycanvas2"></canvas> <br/>
                        <canvas id="mycanvas3"></canvas>
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
    <!-- Footer section -->
    <section id="footer" class="footer-section">
            <?php
                include("includes/footer.php");
            ?>
    </section>

</html>