 
             
            <?php 
                session_start(); 
                include('../includes/connect.php');
                
                //gets the URL
                $url = $_SERVER['REQUEST_URI'];
                
                //removes .php
                $username =  str_replace('.php','',$url);
                
                //removes prefix of the url
                $username =  str_replace('/profiles/','',$username);
                
                //Scrubs the url of any dangerious charicters that could be entered by the end user
                $username = stripslashes(trim($username));
                $username = escape_data($username);
            ?>
            <html>
                <head>
                    <?php
                    include('../includes/profileHead.php');?>
                    
                    <script>
                    $( document ).ready(function() {
                        $('#prompt').delay(2500).fadeOut('slow');
                    });
                    </script>
                </head>
                <body>
                    <?php
                   include ('../includes/profileHeader.php');?>
                    
                    
                     <?php
                    include ('../includes/container.php');?>
              
                    
                    <?php
                    include ('../includes/profileFooter.php');
                   ?>
                </body>
            </html>