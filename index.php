<html lang="en">
<?php
  $Company_Name = "CANNED AIR";
  $Slogan = "Slogan";
?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $Company_Name . " - " . $Slogan ?></title>

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
		include(dirname(__FILE__).'/nav.php');
	?>

    <header class="masthead">

    <div class="slides">

    	<div class="mySlides">
    		<img src="../img/header.jpg" style="width: 100%; height: 100%;"">
    		<div class="header-content">
		        <div class="header-content-inner">
		          <h1 id="homeHeading">It's air, but in a can...<br>...it's canned air</h1>
		          <hr>
				  <p>"This product is... good" - Verified Sources</p><br><br>
				  <a class="btn btn-primary btn-xxl js-scroll-trigger" href="/shop">Shop Now</a>
		        </div>
      		</div>
    	</div>

      	<div class="mySlides">
        	<img src="https://static.pexels.com/photos/34950/pexels-photo.jpg" style="width:100%; height: 100%">
        	<div class="header-content">
		        <div class="header-content-inner">
		          <h1 id="homeHeading">Brady Madden</h1>
		          <hr>
				  <a class="btn btn-primary btn-xxl js-scroll-trigger" href="/shop">Shop Now</a>
		        </div>
      		</div>
      	</div>

      	<div class="mySlides">
       		<img src="https://static.pexels.com/photos/33109/fall-autumn-red-season.jpg" style="width:100%; height: 100%;">
       		<div class="header-content">
		        <div class="header-content-inner">
		          <h1 id="homeHeading">Bobby Hails</h1>
		          <hr>
				  <a class="btn btn-primary btn-xxl js-scroll-trigger" href="/shop">Shop Now</a>
		        </div>
      		</div>
     	</div>

	   	<div class="mySlides">
	    	<img src="https://static.pexels.com/photos/20974/pexels-photo.jpg" style="width:100%; height: 100%;">
	    	<div class="header-content">
		        <div class="header-content-inner">
		          <h1 id="homeHeading">Spencer Wolfe</h1>
		          <hr>
				  <a class="btn btn-primary btn-xxl js-scroll-trigger" href="/shop">Shop Now</a>
		        </div>
      		</div>
	    </div>

	</div>

      <br>

      <div style="text-align:center">
        <span class="dot" onclick="setSlideIndex(1)"></span>
        <span class="dot" onclick="setSlideIndex(2)"></span> 
        <span class="dot" onclick="setSlideIndex(3)"></span> 
        <span class="dot" onclick="setSlideIndex(4)"></span>
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
        <div class="row no-gutter popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
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
        <h2>Check out all our locations around the world!</h2>
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
            <p class="iconspace" >434-321-4321</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-2x sr-contact"></i>
            <p class="iconspace" >
              <a href="mailto:your-email@your-domain.com">contactus@cannedair.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Script controlling the carousel actions -->
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function setSlideIndex(n){
    	showSlides(slideIndex = n)
    }
    
    function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	  //setTimeout(showSlides, 2000); // Change image every 5 seconds
	  //slideIndex++;
	  
	}
	
    /*
    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";  
        }
        slideIndex++;
        if (n > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 5 seconds
    }
    */
    
    </script>

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

  </body>

</html>
