<?php
  
  session_start();
  include("connect.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Patient Treatment System</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="UIU Book Shop" />
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
 <style>
#results {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#results td, #results th {
    border: 1px solid #ddd;
    padding: 8px;
}

#results tr:nth-child(even){background-color: #f2f2f2;}

#results tr:hover {background-color: #ddd;}

#results th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

</style>
</head>
	
<body>


			
                    

           

            <br>
			<div class="clearfix"> </div>
			<h1 style="text-align: center; color: orange;">Patient Treatment System</h1>

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
								<li Class="active"><a> </a></li>
								<li Class="active"><a> </a></li>
								<li Class="active"><a> </a></li>
								<li Class="active"><a> </a></li>
								<li Class="active"><a> </a></li>

									<li class="active"><a href="index.php" class="act">Home</a></li>
									<li class="active"><a href="History.php" class="act">History</a></li>	
								
									  <?php
              
             if(isset($_SESSION['email'])) { ?>
               <li class="nav-item">
                <a href="logout.php" class="nav-link ">Logout</a>
              </li>


            <?php }
             else{ ?>
              <li class="nav-item">
                <a href="login.php" class="nav-link ">Login</a>
              </li>
            <?php }?>
									
									
								
									
									
									<li><a href="registration.php">Sign Up</a></li>
								</ul>
							</div>
							</nav>
							</div>
							</div>
							<br>
							<br>
			
		
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">History Page</li>
			</ol>
		</div>
	</div>

<div>

 <?php
if(isset($_SESSION['email'])) {
	 $email = $_SESSION['email'];
if($_SESSION['type']=='doctor'){ 
   ?><table id="results">

                    <tr>
                   
                    <th>Patient's Name</th>
                    
                    <th>Patient's Email</th>
                    <th>Disease</th>
                    <th>Medicines</th>
                    
                    <th>Tests</th>
                     <th>Date</th>
                    </tr>
                    
              <?php
              
    
    $result1=mysqli_query($conn,"SELECT * FROM prescriptions Where doctor_email='" . $email . "'");

             
                   while($row=$result1->fetch_assoc())
    { 
    echo "<tr>
     <td>".$row['patient_name']."</td>
    <td>".$row['patient_email']."</td>
    <td> ".$row['disease']."</td>
    <td> ".$row['medicines']."</td>
    <td> ".$row['tests']."</td>
     <td> ".$row['date']."</td>";
    
    echo "
         </tr>";
    }
    echo "</table>";
    
  }
  else
  {
  	?><table id="results">

                    <tr>
                   
                    <th>Doctor's Name</th>
                    
                    <th>Doctors's Email</th>
                    <th>Disease</th>
                    <th>Medicines</th>
                    
                    <th>Tests</th>
                     <th>Date</th>
                    </tr>
                    
              <?php
              
    
    $result1=mysqli_query($conn,"SELECT * FROM prescriptions Where patient_email='" . $email . "'");

             
                   while($row=$result1->fetch_assoc())
    { 
    echo "<tr>
     <td>".$row['doctor_name']."</td>
    <td>".$row['doctor_email']."</td>
    <td> ".$row['disease']."</td>
    <td> ".$row['medicines']."</td>
    <td> ".$row['tests']."</td>
     <td> ".$row['date']."</td>";
    
    echo "
         </tr>";
    }
    echo "</table>";
    
  }

  }

     else
    {
       echo "<script>
                        alert('Login First.....');
                        window.location.href='login.php';
                    </script>";    
    }
?>
</div>    

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