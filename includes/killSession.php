<?php
    session_start();
    //destroy teh session
    $_SESSION = array();
    session_unset();
    session_destroy(); 
    //clears the data from the cookie
    setcookie("TestCookie", '', time() - 10, "", "","","");
    // destroyes the cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    //removes the cookie
    unset($_COOKIE["TestCookie"]);
    session_write_close();   
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, 'inactive') !== false) {
        header("Location: ../index.php?inactive");
        exit();
    }
    
    header("Location: ../index.php");
?>