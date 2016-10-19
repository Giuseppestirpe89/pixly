 <?php   
    $host = "dublinscoffee.ie";
    $user = "dubli653_dib";                     //Your Cloud 9 username
    $pass = "0u.ipTVc)zpq";                         //Remember, there is NO password by default!
    $db = "dubli653_ncirl";                   //Your database name you want to connect to
    $port = 3306;                       //The port #. It is always 3306
    //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db);
    
    $query = "SELECT * FROM test";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "The ID is: " . $row['working'] ;
    }
?>