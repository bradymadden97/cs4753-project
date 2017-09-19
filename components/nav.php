<!-- Navigation -->
<?php
  $Company_Name = "ZEPHAIR";
?>
<!-- Include Navbar CSS file -->
<style rel="text/css">
<?php include(dirname(__FILE__).'/nav.css'); ?>
</style>


<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
		<a class="navbar-brand js-scroll-trigger" href="/">
			<img src="https://s3.amazonaws.com/cs4753-project/logo.png" height="50px" alt="Zephair">
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger nav-margin-10px" href="/about"><span>About</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger nav-margin-10px" href="/shop"><span>Shop</span></a>
				</li>
				<li class="nav-item">
					<a class="btn-solid-color nav-link js-scroll-trigger" href="/register"><span class="nav-margin-10px btn-padding-20 btn-lookalike">Sign up</span></a>
				</li>
				<li class="nav-item">
					<a class="btn-outline nav-link js-scroll-trigger" href="/login"><span class="nav-margin-10px btn-padding-20 btn-lookalike">Login</span></a>
				</li>			
			</ul>
		</div>
	</div>
</nav>