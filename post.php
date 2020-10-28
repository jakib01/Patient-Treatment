<?php
  
  session_start();
  include_once  'connect.php';
if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}
else{
 if($_SESSION['type']=='doctor'){
           if(isset($_POST['submit'])){
            $email=$_SESSION['email'];
            $query = "SELECT * FROM `users` WHERE email = '$email'" ;
              $result = $conn->query($query);
              $row = mysqli_fetch_assoc($result);
              $name=$row['name'];
              $email=$row['email'];
            $pname = $_POST['pname'];
            $pemail=$_POST['pemail'];
             $disease=$_POST['disease'];
            $tests=$_POST['tests'];
            $medicines=$_POST['medicines'];
             
           


       if(isset($_SESSION['email']))
       { $sql = "INSERT INTO prescriptions(patient_name,patient_email,doctor_name,doctor_email,disease,medicines,tests,date) VALUES ('$pname','$pemail','$name','$email','$disease','$medicines','$tests',NOW())";
   
         }
        ///////
        $res = $conn->query($sql);
         echo "<script>
                        alert('Submitted Successfully');
                        window.location.href='index.php';
                    </script>"; 
      
    }
}
     else{          
      
      echo "<script>
                        alert('Sorry You cant get access. Only for doctors.....');
                        window.location.href='index.php';
                    </script>";  
     }
 }

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
</head>
    
<body>

            
                    

           

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
                            </nav
            </div>
        </div>
        
<!-- //navigation -->
    <!-- main-slider -->
        <ul id="demo1">
            <li>
                            
                            
                <img src="images/home.jpg" alt="" />
                <!--Slider Description example-->
                <div class="slide-desc">
<!--                    <h3>Buy,Sell Or Eschange Your Old Books</h3>-->
                                        <div class="post-button" style="font-size: 25px;">
                                            <a href="post.php">GET PRESCRIPTION</a>
                                        </div>
                </div>
            </li>
        </ul>
    <!-- //main-slider -->
    <!-- //top-header and slider -->
    <!-- top-brands -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Prescription Page</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- login -->
    <div class="login" style="background-color: white;">
        <div class="container">
            <h2>Prescription Form</h2>
        
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                                    <input type="text" name="pname" placeholder="Patient's Name" required class="form-control " ><br>
                                    <br>
                                    <input type="email" name="pemail" placeholder=" Patient's Email Address" required class="form-control " >
                                    <textarea rows="4" cols="50" name="disease" placeholder="Enter disease here ... " required class="form-control "></textarea>
                                    <textarea rows="4" cols="50" name="medicines" placeholder="Enter medicines here ... " required class="form-control "></textarea>
                                      <textarea rows="4" cols="50" name="tests" placeholder="Enter tests here here... " required class="form-control "></textarea>
                    
                                    <input type="submit" name="submit" value="Submit">
                </form>
                            
                    <span class="text-danger"><?php
                        if (isset($errormsg)) {
                            echo $errormsg;
                        }
                        ?></span>
            </div>
            
        </div>
    </div>
    
                                
                                
                                <div class="clearfix"> </div>
                            </div>
                            
                                
                                
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        
                                
                            
                                
                                
                                <div class="clearfix"> </div>
                            </div>
                            
                                <div class="clearfix"> </div>
                            </div>
                        </div>
<!--                                <div class="clearfix"> </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <!-- /.carousel --> 
<!--banner-bottom-->
<!--banner-bottom-->
<!--brands-->
<!--//brands-->
<!-- new -->
    
                
                    
                        <div class="clearfix"> </div>
                </div>
        </div>
    </div>

<!-- //new -->
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
            jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':false,'showPlayButton':false,'autoSlide':false,'animationType':'fading'});
                        
            jQuery('#responsive').change(function(){
              $('#responsive_wrapper').width(jQuery(this).val());
            });
            
        });
</script>   
<!-- //main slider-banner --> 
</body>
</html>