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
    <script>
    $(document).ready(function(){
        $("input[type=password]").keyup(function(){
            var ucase = new RegExp("[A-Z]+");
        	var lcase = new RegExp("[a-z]+");
        	var num = new RegExp("[0-9]+");
        	
        	if($("#password1").val().length >= 8){
        		$("#8char").removeClass("glyphicon-remove");
        		$("#8char").addClass("glyphicon-ok");
        		$("#8char").css("color","#FFFF00");
        	}
        // 	}else{
        // 		$("#8char").removeClass("glyphicon-ok");
        // 		$("#8char").addClass("glyphicon-remove");
        // 		$("#8char").css("color","#FF0004");
        // 	}
        	
        // 	if(ucase.test($("#password1").val())){
        // 		$("#ucase").removeClass("glyphicon-remove");
        // 		$("#ucase").addClass("glyphicon-ok");
        // 		$("#ucase").css("color","#00A41E");
        // 	}else{
        // 		$("#ucase").removeClass("glyphicon-ok");
        // 		$("#ucase").addClass("glyphicon-remove");
        // 		$("#ucase").css("color","#FF0004");
        // 	}
        	
        // 	if(lcase.test($("#password1").val())){
        // 		$("#lcase").removeClass("glyphicon-remove");
        // 		$("#lcase").addClass("glyphicon-ok");
        // 		$("#lcase").css("color","#00A41E");
        // 	}else{
        // 		$("#lcase").removeClass("glyphicon-ok");
        // 		$("#lcase").addClass("glyphicon-remove");
        // 		$("#lcase").css("color","#FF0004");
        // 	}
        	
        // 	if(num.test($("#password1").val())){
        // 		$("#num").removeClass("glyphicon-remove");
        // 		$("#num").addClass("glyphicon-ok");
        // 		$("#num").css("color","#00A41E");
        // 	}else{
        // 		$("#num").removeClass("glyphicon-ok");
        // 		$("#num").addClass("glyphicon-remove");
        // 		$("#num").css("color","#FF0004");
        // 	}
        	
        // 	if($("#password1").val() == $("#password2").val()){
        // 		$("#pwmatch").removeClass("glyphicon-remove");
        // 		$("#pwmatch").addClass("glyphicon-ok");
        // 		$("#pwmatch").css("color","#00A41E");
        // 	}else{
        // 		$("#pwmatch").removeClass("glyphicon-ok");
        // 		$("#pwmatch").addClass("glyphicon-remove");
        // 		$("#pwmatch").css("color","#FF0004");
        // 	}
        });
    });
    </script>
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:20px">
        <form class="form-signin" action='createUser.php' method='post'>
           	
		<hr class="colorgraph">
		 <div class="form-group">
            <h2 class="form-signin-heading">Please sign in</h2>
         </div>
         <div class="form-group">
            <input type="username" class="form-control" placeholder="Username" name="username"required autofocus>
         </div>
         <div class="form-group">
            <input type="password"  class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <input type="password"  class="form-control" placeholder="Confirm Password" name="passwordmatch" required>
        </div>  
        <div class="form-group">
            <input type="email"  class="form-control" placeholder="Email" name="email" required>
         </div>  
         
            <!--IF TIME DEVELOP-->
            <!--http://bootsnipp.com/snippets/featured/change-password-form-with-validation-->
            <!--<div class="checkbox">-->
            <!--    <p><span id="8char" class="glyphicon glyphicon-ok-circle"></span> 8 or more characters</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Upper and lower case</p>-->

            <!--    <span class="glyphicon glyphicon-ok-circle"></span> At least number</p>-->
                
            <!--    <span class="glyphicon glyphicon-ok-circle"></span> Passwords match</p>-->
            <!--</div>-->
            <button class="btn btn-small  btn-primary center-block">Create Account</button>
        </form>
    </div>
</div>
    
    
<!--<div class="container">-->
<!--<div class="row" style="margin-top:20px">-->
<!--    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">-->
<!--        <form class="form-signin" action='createUser.php' method='post'>-->
		
<!--				<h2 class="form-signin-heading">Please sign in</h2>-->
<!--				<hr class="colorgraph">-->
<!--				<div class="form-group">-->
<!--                   <input type="username" class="form-control" placeholder="Username" name="username" required autofocus>-->
<!--				</div>-->
<!--				<div class="form-group">-->
<!--				    <label for="inputPassword" class="sr-only">Password</label>-->
<!--                    <input type="password" class="form-control" placeholder="Password" name="password" required>-->
<!--				</div>-->
<!--				<div class="form-group">-->
<!--                    <input type="password"  class="form-control" placeholder="Confirm Password" name="passwordmatch" required>-->
<!--				</div>-->

<!--				<hr class="colorgraph">-->
<!--				<div class="row">-->
<!--					<div class="col-xs-12 col-sm-8 col-md-6">-->
<!--						<a href="" class="btn btn-small  btn-primary center-block">Login</a>-->
<!--					</div>-->
<!--				</div>-->
<!--		</form>-->
<!--	</div>-->
<!--</div>-->
<!--</div>-->
</body>
</html>


