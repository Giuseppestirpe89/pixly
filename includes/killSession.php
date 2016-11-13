<?php
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy(); 
    setcookie("TestCookie", '', time() - 10, "", "","","");
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    unset($_COOKIE["TestCookie"]);
    session_write_close();    
    header("Location: ../index.php");
?>