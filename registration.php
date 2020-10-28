<?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}

include_once 'connect.php';

//set validation error flag as false
$error = false;
echo $error;

//check if form is submitted
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
     $type = mysqli_real_escape_string($conn, $_POST['type']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if ($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO users(name,email,password,type) VALUES('" . $name . "', '" . $email . "', '" . $password . "','" . $type . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Paient Management System</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->

            <br>
			<div class="clearfix"> </div>
			<h1 style="text-align: center; color: orange;">Patient Treatment System</h1>
		</div>
        <br>
        <br>

<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
                                                                    <li class="active"><a href="index.php" class="act">Home</a></li>	
                                                                    <li class="active"><a href="History.php" class="act">History</a></li>
									<!-- Mega Menu -->
									 <?php
              
             if(isset($_SESSION['email'])) { ?>
               <li class="active">
                <a href="logout.php" >Logout</a>
              </li>


            <?php }
             else{ ?>
              <li class="active">
                <a href="login.php" >Login</a>
              </li>
            <?php }?>
									
									
								
									
									
									<li><a href="registration.php">Sign Up</a></li>
								</ul>
							</div>
							</nav
			</div>
		</div>
									
								
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register" style="background-color: white;">
		<div class="container" style="background-color: white;">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                                   <input type="text" name="name" placeholder="Your Name" required class="form-control " >
                                   <input type="text" name="type" placeholder="Your Profession" required class="form-control " >
                                        
                                        
                                       
				
<!--				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>-->
				<h6>Login information</h6>
					
                                            <input type="email" name="email" placeholder="Email Address" required value="<?php if($error) echo $email; ?> " >
                                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                                            <input type="password" name="password" placeholder="Password" required class="form-group" >
                                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                                        <input name="cpassword" type="password" placeholder="Password Confirmation" required class="form-group" >
                                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
<!--					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>-->
<input type="submit" value="Register" name="register">
				</form>
                                
                    <span class="text-success"><?php
                        if (isset($successmsg)) {
                            echo $successmsg;
                        }
                        ?></span>
                    <span class="text-danger"><?php
                        if (isset($errormsg)) {
                            echo $errormsg;
                        }
                        ?></span>
			</div>
			<div class="register-home">
                            <a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- //footer -->

<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>