<!--
    This is where new users details are taken befor being posted to createUser.php to create their account
    Users are drected here from index.php to creates new accounts
    basic user info is taken and posted to createUser.php
-->

<?php 
    session_start();
    include("../includes/connect.php");
?>
<html>
<head>
    <?php include("../includes/head.php");?>
</head>
<body>

    <!--<div class="container" id="loginwrapper">-->

    <!--    <form class="form-signin" action='createUser.php' method='post'>-->
    <!--        <h2 class="form-signin-heading">Please sign in</h2>-->
    <!--        <input type="username" class="form-control" placeholder="Username" name="username"required autofocus>-->
    <!--        <label for="inputPassword" class="sr-only">Password</label>-->
    <!--        <input type="password"  class="form-control" placeholder="Password" name="password" equired>-->
    <!--        <input type="password"  class="form-control" placeholder="Confirm Password" name="passwordmatch" required>-->
            
            <!--IF TIME DEVELOP-->
            <!--http://bootsnipp.com/snippets/featured/change-password-form-with-validation-->
            <!--<div class="checkbox">-->
            <!--    <p><span id="8char" class="glyphicon glyphicon-ok-circle"></span> 8 or more characters</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Upper and lower case</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> At least number</p>-->
                
            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Passwords match</p>-->
            <!--</div>-->
    <!--        <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>-->
    <!--    </form>-->

    <!--</div>-->
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form class="form-signin" action='createUser.php' method='post'>
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                   <input type="username" class="form-control" placeholder="Username" name="username"required autofocus>
				</div>
				<div class="form-group">
                    <input type="password"  class="form-control" placeholder="Password" name="password" required>
				</div>
				<div class="form-group">
                    <input type="password"  class="form-control" placeholder="Confirm Password" name="passwordmatch" required>
				</div>

				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6">
						<a href="" class="btn btn-small  btn-primary center-block">Login</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</body>
</html>


