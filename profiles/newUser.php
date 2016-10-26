<?php 
    session_start();
    include("../includes/connect.php");
?>

<html>

<head>
    <?php include("../includes/head.php");?>
</head>

<body>

    <!--<form action='createUser.php' method='post'>-->
    <!--    <label>Username</label>-->
    <!--    <input type="text" class="form-control" id="username" placeholder="Username" name="username">-->
    <!--    <label>Password</label>-->
    <!--    <input type="password" class="form-control" id="password" placeholder="Password" name="password">-->
    <!--    <label>Password (confirm)</label>-->
    <!--    <input type="password" class="form-control" id="password" placeholder="Password" name="password">-->
    <!--    <div class="checkbox">-->
    <!--        <p><span class="glyphicon glyphicon-ok-circle"></span> 8 or more characters</p>-->
    <!--        <span class="glyphicon glyphicon-ok-circle"></span> Upper and lower case</p>-->
    <!--        <span class="glyphicon glyphicon-ok-circle"></span> At least number</p>-->
    <!--        <span class="glyphicon glyphicon-ok-circle"></span> Passwords match</p>-->
    <!--    </div>-->
    <!--    <button type="submit" class="btn btn-default">Submit</button>-->
    <!--</form>-->


    <div class="container" id="loginwrapper">

        <form class="form-signin" action='createUser.php' method='post'>
            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="username" class="form-control" placeholder="Username" name="username"required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password"  class="form-control" placeholder="Password" name="password" equired>
            <input type="password"  class="form-control" placeholder="Confirm Password" name="passwordmatch" required>
            
            <!--IF TIME DEVELOP-->
            <!--http://bootsnipp.com/snippets/featured/change-password-form-with-validation-->
            <!--<div class="checkbox">-->
            <!--    <p><span id="8char" class="glyphicon glyphicon-ok-circle"></span> 8 or more characters</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Upper and lower case</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> At least number</p>-->
                
            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Passwords match</p>-->
            <!--</div>-->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
        </form>

    </div>

</html>


