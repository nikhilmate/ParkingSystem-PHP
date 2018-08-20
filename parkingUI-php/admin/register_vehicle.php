<?php
if (isset($_GET['areaName']) && isset($_GET['region'])) {
	include 'includes/dbc_admin.inc.php';
	$area = mysqli_real_escape_string($conn, $_GET['areaName']);
	$region = mysqli_real_escape_string($conn, $_GET['region']);
}
?>
<?php
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Online Parking - Dummy!</title>
        <meta name="description" content="company is a free job board template">
        <meta name="author" content="Ohidul">
        <meta name="keyword" content="html, css, bootstrap, job-board">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/home_bg.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/animate.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->
		
        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8 col-xs-8">
                        <div class="header-half header-call">
                            <p>
                                <span style="color: #202020;"><i class="icon-cloud"></i>+019 4854 8817</span>
                                <span style="color: #202020;"><i class="icon-mail"></i>ohidul.islam951@gmail.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
              <div class="button admin navbar-right">
                  <button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.8s" onclick="javascript:window.open('../index.html');">Back!</button>
              </div>
              
            </div>

          </div><!-- /.container-fluid -->
        </nav>

        <div class="content-area">
            <div class="container">
                <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">

                    <?php
                    if (isset($_SESSION['admin_uid'])) {
                    	if (isset($_GET['areaName']) && isset($_GET['region'])) {
	                        echo "<h2>Area - ".$_GET['areaName']."</h2>
	                		</div>";
	                		
	                		include 'includes/dbc_admin.inc.php';

							$area = mysqli_real_escape_string($conn, $_GET['areaName']);
							$region = mysqli_real_escape_string($conn, $_GET['region']);

						    $sql1 = "SELECT * FROM area_occupied WHERE area_name='$area' AND region_name='$region'";
						    $query1 = mysqli_query($conn, $sql1);
                            $result = mysqli_num_rows($query1);
                            if ($result <= 0) {
                                echo "<h1>SORRY!</h1>";
                            }
                            else {
                                while ($row = mysqli_fetch_assoc($query1)) {
                                    echo "<div class=\"area-info col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12\">
                                        <table class=\"info-table\">
                                            <tr>
                                                <th>Content</th>
                                                <th>Description</th>
                                            </tr>
                                            <tr>
                                                <td>Registered By:</td>
                                                <td>".$row['user_first']." ".$row['user_last']."</td>
                                            </tr>
                                            <tr>
                                                <td>Registered By Email:</td>
                                                <td>".$row['user_email']."</td>
                                            </tr>
                                            <tr>
                                                <td>Time of Booking</td>
                                                <td>".$row['entry_time']."</td>
                                            </tr>
                                            <tr>
                                                <td>Time of Validation</td>
                                                <td>".$row['entry_from']." - ".$row['entry_to']."(".$row['valid_upto'].")</td>
                                            </tr>
                                        </table>
                                    </div>";
                                }
                            }
						    
	                    } else {
	                        header("location: index.php");
	                        exit();
	                    }
                    } else {
	                    header("location: index.php");
	                    exit();
	                }
                    
                    ?>
	        </div>
	    </div>

        <div class="footer-area">
            <div class="container">
                <div class="row footer">
                    <div class="col-md-4">
                        <div class="single-footer">
                            <img src="img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati architecto quaerat facere blanditiis tempora sequi nulla accusamus, possimus cum necessitatibus suscipit quia autem mollitia, similique quisquam molestias. Vel unde, blanditiis.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-footer">
                            <h4>Twitter update</h4>
                            <div class="twitter-updates">
                                <div class="single-tweets">
                                    <h5>ABOUT 9 HOURS</h5>
                                    <p><strong>AGOMeet Aldous</strong> - a Brave New World for #rails with more cohesion, less coupling and greater dev speed <a href="http://t.co/rsekglotzs">http://t.co/rsekglotzs</a></p>
                                </div>
                                <div class="single-tweets">
                                    <h5>ABOUT 9 HOURS</h5>
                                    <p><strong>AGOMeet Aldous</strong> - a Brave New World for #rails with more cohesion, less coupling and greater dev speed <a href="http://t.co/rsekglotzs">http://t.co/rsekglotzs</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-footer">
                            <h4>Useful lnks</h4>
                            <div class="footer-links">
                                <ul class="list-unstyled">
                                    <li><a href="">About Us</a></li>
                                    <li><a href="" class="active">Services</a></li>
                                    <li><a href="">Work</a></li>
                                    <li><a href="">Our Blog</a></li>
                                    <li><a href="">Customers Testimonials</a></li>
                                    <li><a href="">Affliate</a></li>
                                    <li><a href="">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row footer-copy">
                    <p><span>(C) webstie, All rights reserved</span> | <span>Graphic Designed by <a href="https://dribbble.com/siblu">Eftakher Alam</a></span> | <span> Web Designed by <a href="http://ohidul.me">Ohidul Islam</a></span> </p>
                </div>
            </div>
        </div>
		
		<script type="text/javascript">
            const nav = document.querySelector('.navbar');
            let topofnav = nav.offsetTop;

            function stick(e) {
                if (window.scrollY >= topofnav) {
                    document.body.style.paddingTop = nav.offsetHeight + 'px';
                    document.body.classList.add('hide-nav');

                } else {
                    document.body.classList.remove('hide-nav');
                    document.body.style.paddingTop = 0 + 'px';
                }
            }
            window.addEventListener('scroll', stick);

            function loginUp() {
                let admin = document.querySelector('.admin-login');
                let navb = document.querySelector('.navbar');
                let navbHeight = nav.offsetHeight;


                admin.classList.add('show');
                admin.classList.remove('fade');
            }
        </script>
		
		
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/main.js"></script>
        <script src="js/stickynav.js"></script>
    </body>
</html>
