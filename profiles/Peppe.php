<?php session_start(); 
            include('../includes/connect.php');?>
<html>

<head>
    <?php
                    include('../includes/profileHead.php');?>
</head>

<body>
    <?php
                    include ('../includes/profileHeader.php');
                    ?>

        <section id="intro" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Pixly &copy;</h1>

                        <header class="clearfix feed-header" data-role="banner">
                            <div class="compWrapper">
                                <div class="compInnerWrapper">
                                    <div class="compContainer" id="cycler1">
                                        <div class="compPhoto compPhoto1">
                                            <a href="#">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/225x225/888/fff&text=photo1" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compPhoto compPhoto2">
                                            <a href="#">
                                                <div class="Image iLoaded iWithTransition">
                                                    <img src="http://placehold.it/225x225/545454/fff&text=photo2" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compPhoto compPhoto3">
                                            <a href="#" class="">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/425x425/157B86/fff&text=photo3" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>


                                        </div>
                                        <div class="compPhoto compPhoto4">
                                            <a href="#">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/250x250/222/fff&text=photo4" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compPhoto compPhoto5">
                                            <a href="#">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/220x220/444/fff&text=photo5" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compPhoto compPhoto6">
                                            <a href="#">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/230x230/333/fff&text=photo6" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compPhoto compPhoto7">
                                            <a href="#">
                                                <div class="Image iWithTransition">
                                                    <img src="http://placehold.it/250x250/555/fff&text=photo7" />
                                                    <b class="compPhotoShadow"></b>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>

                        <div class="profile-user">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="pull-left" style="margin-right:15px">
                                        <img src="http://www.gravatar.com/avatar/f6112e781842d6a2b4636b35451401ff?s=80&d=mm&r=g" class="img-polaroid" />
                                    </div>

                                    <h2>john doe</h2>
                                    <p>
                                        <strong>Jonnie Spratley</strong> <a href="#">http://info@you.google</a>
                                    </p>
                                </div>
                                <div class="span6">
                                    <ul class="inline user-counts-list">
                                        <li>Photos <span class="count">100</span></li>
                                        <li>Followers <span class="count">50</span></li>
                                        <li>Following <span class="count">130</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<br><br><br><br><br><br><br><br>

        <?php
                    include ('../includes/profileFooter.php');
                   ?>
</body>

</html>