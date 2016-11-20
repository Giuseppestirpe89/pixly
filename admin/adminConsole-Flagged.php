 
            <?php session_start(); 
            include('../includes/connect.php');
            ?>
            <html>
                <head>
                    <?php
                    include('../includes/profileHead.php');?>
                </head>
                <body>
                    <?php
                    include ('../includes/profileHeader.php');?>
        <!-- Intro Section -->
        <section>
            <div class="container">
                <div style="height:79px">
                </div>    
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Admin Console</h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <ul class="nav nav-tabs">
                    <li><a href="adminConsole.php">Home</a></li>
                    <li><a href="adminConsole-Security.php">Security logs</a></li>
                    <li class="active"><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                </ul>
                <br>

               
                <hr>
                



            </div>
        </section>
        <?php
            //include("includes/footer.php");
        ?>
        </section>
    </body>

    </html>