 <?php
    include('connect.php');
    session_start();

    $query = "SELECT * FROM users";
    $result = mysql_query($query); 
    $formusername=$_POST["username"];
    $formpassword=$_POST["password"];
    
 
    while ($row = mysql_fetch_assoc($result)) {
            $dbUsername=$row['username'];
            $dbPassword=$row['password'];

            if($formusername == $dbUsername && $formpassword == $dbPassword){
                $_SESSION['user']=$dbUsername;
                header("Location: ../index.php");
                
            }
        }

?>  
    


