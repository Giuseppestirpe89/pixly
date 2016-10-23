<?php
    /*  Slug page
     *  -- eventBanner.php prints the pannel containing the Name and scrolling gallery of each event to index.php
     *  There is a nested While loop that pulls two selerate SQL querys to populate the page with contect
     *  
     */
    $query = "SELECT * FROM events ORDER BY eventId DESC";
    $result = mysql_query($query); 
    while ($row = mysql_fetch_assoc($result)) {
?>

    <div class="container">
        <div class="col-xs-12">
            <h3>
                <?php echo $row['eventName']?>
            </h3>
            <div class="well">
                <div id="myCarousel2" class="carousel slide">
                    <div class='carousel-inner'>
                        <div class='item active'>
                            <div class='row'>
                                <?php
                                    $test = $row['eventName'];
                                    $iquery = "SELECT * FROM images WHERE event = '$test'";
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
                    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel2" data-slide="next">›</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    // end of line 13 - while ($row = mysql_fetch_assoc($result)) {
    } 
?>