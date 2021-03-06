<?php
	session_start();

	$Company_Name = "Zephair";
	$Slogan = "LIVE CLEAN, BREATHE EASY";
?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Zephair - Live Clean, Breathe Easy</title>

	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

	<!--Our own css -->
	<link href="css/homepage.css" rel="stylesheet">

  </head>

  <body id="page-top">

	<?php
		include(dirname(__FILE__).'/components/nav.php');
	?>

    <header id="homepage-header" class="masthead" style="background-attachment:fixed">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">FRESH AIR. <br> FOR EVERYONE.</h1>
          <hr>
		  <p style="font-size:20px">Clean, natural solutions to the air quality epidemic</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="/shop">Shop Now</a>
        </div>
		<br>
		<div id="dot-div" style="text-align:center">
			<span class="dot dot-active" id="dot-0" data-slide="1"></span>
			<span class="dot" id="dot-1" data-slide="2"></span>
			<span class="dot" id="dot-2" data-slide="3"></span>
			<span class="dot" id="dot-3" data-slide="4"></span>
		</div>
      </div>
    </header>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Live Clean, Breathe Easy</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-globe text-primary sr-icons"></i>
              <h3>Globally Sourced</h3>
              <p class="text-muted">Our air comes from the cleanest sources around the globe.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-send text-primary sr-icons"></i>
              <h3>Ready to Ship</h3>
              <p class="text-muted">We ship worldwide, so you can breathe cleaner everywhere.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-child text-primary sr-icons"></i>
              <h3>Health Benefits</h3>
              <p class="text-muted">Our air has been proven to provide health benefits to users in poor-air regions.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
              <h3>Made with Love</h3>
              <p class="text-muted">Each of our cannisters is packed by hand to ensure the highest quality.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid">
        <div class="row no-gutter">
          <div class="col-lg-4 col-sm-6">
            <a id="pf-1" class="portfolio-box" href="shop/item/?id=6">
              <img class="img-fluid" src="img/alaska.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    Alaska
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a id="pf-2" class="portfolio-box" href="shop/item/?id=8">
              <img class="img-fluid" src="img/newz.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    New Zealand
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a id="pf-3" class="portfolio-box" href="shop/item/?id=4">
              <img class="img-fluid" src="img/chile.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    Chile
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a id="pf-4" class="portfolio-box" href="shop/item/?id=7">
              <img class="img-fluid" src="img/iceland.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    Iceland
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a id="pf-5" class="portfolio-box" href="shop/item/?id=2">
              <img class="img-fluid" src="img/spain.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    Spain
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a id="pf-6" class="portfolio-box show-hover" href="shop/item/?id=3">
              <img class="img-fluid" src="img/antarctica.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Air from
                  </div>
                  <div class="project-name">
                    Antarctica
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <div class="call-to-action bg-brand">
      <div class="container text-center">
        <h2>Check out our products from around the world!</h2>
        <a class="btn btn-default btn-xl sr-button" href="/shop">Shop Now</a>
      </div>
    </div>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="primary">
			<p>Have questions about our product? Want to tell us how we're doing? That's great! Give us a call or send us an email and we will get back to you as soon as possible.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-2x sr-contact"></i>
            <p class="iconspace" >
		<a href="tel:4343214321">434-321-4321</a>
	    </p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-2x sr-contact"></i>
            <p class="iconspace" >
              <a href="mailto:zephair.merchant@gmail.com">zephair.merchant@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.3.6/scrollreveal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./js/creative.min.js"></script>

	<!--Preload the background images -->
	<script>
		var h1 = new Image();
		var h2 = new Image();
		var h3 = new Image();
		h1.src = "img/header1.jpg";
		h2.src = "img/header2.jpg";
		h3.src = "img/header3.jpg";
	</script>

	<!--Our own js -->
	<script src="js/homepage.js"></script>

  </body>

</html>
