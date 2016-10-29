<?php
    /*  Slug page
     *  -- eventBanner.php prints the pannel containing the Name and scrolling gallery of each event to index.php
     *  There is a nested While loop that pulls two selerate SQL querys to populate the page with contect
     *  
     */
    $query = "SELECT * FROM events ORDER BY eventId DESC";
    
    /*
     * mysql_query() was chosen over the other connection functions as it only allows one query to be sent to the DB
     * if a second query was introduced via SLQ injection the second query would not exacute 
     */
    
    $result = mysql_query($query); 
    
    //$incrementDivId used it increment the <div id="myCarousel"> href for the toggle button left anr right as a unique ID is needed
    $incrementDivId = 1;
    while ($row = mysql_fetch_assoc($result)) {
    /*
     * The if() checks how many images are in each event
     * There is a max of 3 slides on each event, with 4 pictures on each slide
     * The 4 images per slide are within <div class='item active'> or <div class='item'> pending on there order
     * The if generates the correct number of these divs 1,2 or 3 slides to suit the number of images, between 1-4, 5-8 or 9+
     * Only the top 12 liked photos are shown in the preview slides
     * Besides bringing the best contect to front it also lightins the load on the browser by not pulling up 1000s of images
     */
        if($row['numOfPhotos'] <= 4){
?>
            <!--4 PHOTOS 1 SLIDE-->
            <div class="container">
                <div class="col-xs-12">
                    <h3>
                        <?php echo $row['eventName']?>
                    </h3>
                    <div class="well">
                        <div id="myCarousel<?php echo $incrementDivId ?>" class="carousel slide">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <div class='row'>
                                        <?php
                                            //loops and prints HTML for 4 images in one preview slide
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName'";
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }elseif($row['numOfPhotos'] <= 8){
           $incrementDivId++;
?>
            <!--8 PHOTOS 2 SLIDES-->
            <div class="container">
                <div class="col-xs-12">
                    <h3>
                        <?php echo $row['eventName']?>
                    </h3>
                    <div class="well">
                        <div id="myCarousel<?php echo $incrementDivId ?>" class="carousel slide">
                            <div class='carousel-inner'>
                                <!--First slide of 4 photos-->
                                <div class='item active'>
                                    <div class='row'>
                                        <?php
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName' LIMIT 0,4";
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                                <!--Second slide of 4 photos-->
                                <div class='item'>
                                    <div class='row'>
                                        <?php
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName' LIMIT 4,9";
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel<?php echo $incrementDivId ?>" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel<?php echo $incrementDivId ?>" data-slide="next">›</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }else{
            $incrementDivId++;
?>
           <!--12 PHOTOS 3 SLIDES-->
            <div class="container">
                <div class="col-xs-12">
                    <h3>
                        <?php echo $row['eventName']?>
                    </h3>
                    <div class="well">
                        <div id="myCarousel<?php echo $incrementDivId ?>" class="carousel slide">
                            <div class='carousel-inner'>
                                <!--First slide of 4 photos-->
                                <div class='item active'>
                                    <div class='row'>
                                        <?php
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName' ORDER BY imageId ASC LIMIT 0,4";
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                                <!--Second slide of 4 photos-->
                                <div class='item'>
                                    <div class='row'>
                                        <?php
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName' ORDER BY imageId ASC LIMIT 4,4" ;
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!--Third slide of 4 photos-->
                                <div class='item'>
                                    <div class='row'>
                                        <?php
                                            $eventName = $row['eventName'];
                                            $iquery = "SELECT * FROM images WHERE event = '$eventName' ORDER BY imageId ASC LIMIT 8,4" ;
                                            $iresult = mysql_query($iquery); 
                                            while ($irow = mysql_fetch_assoc($iresult)) {
                                        ?>
                                                <div class="col-xs-3">
                                                    <a href=#x><img src="event/<?php echo $irow['event']."/".$irow['imageName'] ?>" alt="Image" class="img-responsive"></a>
                                                </div>
                                        <?php
                                            //end of - while ($irow = mysql_fetch_assoc($iresult)) {
                                            }
                                        ?>
                                    </div>
                                </div>                        
                            </div>
                            <a class="left carousel-control" href="#myCarousel<?php echo $incrementDivId ?>" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel<?php echo $incrementDivId ?>" data-slide="next">›</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } 
?>
