<?php

         //http://stackoverflow.com/questions/4366730/check-if-string-contains-specific-words
        //http://php.net/manual/en/function.str-replace.php
            $welcome="color_animation";
            $summery="color_animation";
            $about="color_animation";
            $reservations="color_animation";
            //gets url
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($actual_link, 'summery') !== false) {
                $summery="navactive color_animation";
            }
            else if (strpos($actual_link, 'index2') !== false) {
                $about="navactive color_animation";
            }
            else if (strpos($actual_link, 'auction') !== false) {
                $reservations="navactive color_animation";
            }
            
            if(isset($_SESSION['user'])){
                $profile = "restaurants/".$_SESSION['user'];   
            }
            else{
                $profile = "landing-page/Login/index-rest";
            }
            
            
    echo"
    <nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
            <div class='container'>
                <div class='row'>
                <!--Header    -->
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class='navbar-header'>
                        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                        </button>
                    <a class='navbar-brand' href='#'>BestBook &trade;</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                        <ul class='nav navbar-nav main-nav  clear navbar-right '>
                            <li><a class='".$summery."' href='summery.php'>RESTAURANTS</a></li>
                            <li><a class='".$reservations."' href='auction.php'>RESERVATION</a></li>
                            <li><a class='color_animation' href='".$profile.".php'><span class='glyphicon glyphicon-user white' style='text-color: white'></span> PROFILE</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    ";
    
    include("securityLog.php");
?>