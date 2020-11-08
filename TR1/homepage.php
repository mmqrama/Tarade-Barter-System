<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Tarade! · Homepage</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="design.css?v=<?php echo time(); ?>">

</head>
<body>
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<a class="site-logo">
							<img src="pic/tarade.png">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<div class="container">
							<div class="form-group">
								<div class="dropdown">
									<div class="default-option">Category</div>
									<div class="dropdown-list">
										<ul>
											<li><a href="#">I Want..</a></li>
											<li><a href="#">I Have..</a></li>
										</ul>
									</div>
								</div>
				
								<div class="search">
									<input type="text" class="search-input" placeholder="Search...">
								</div>
								<button class="btn"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-dark md-3">
			<div class="container-fluid">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<div class="navbar-nav">
							<li><a href="index.html" class="nav-item nav-link">Home</a></li>
							<li><a href="latestproducts.html" class="nav-item nav-link">Latest Products</a></li>
							<li><a href="fun.html" class="nav-item nav-link">Click for Fun</a></li>
						</div>
						<div class="up-item ml-auto">
							<?php
								if(isset($_SESSION["userid"])){
									echo " <li><i class='fa fa-user'></i><a href='#'>Profile Page</a></i></li>";
									echo " <li><a href='dbConnect/logout_db.php'>Log Out</a></li>";
								}else{
									header("location: index.php");
                					exit();
								}
    						?>
						</div>
					</div>
			</div>
		</nav>

	</header>

	<!--Carousel-->
	<div id="slides" class="carousel slide carousel-fade" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active" data-interval="3000">
				<img src="pic/bg.jpg">
				<div class="carousel-caption">
					<h1 class="display-5">Denim Jackets</h1>
					<h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum, non!</h3>
					<button type="button" class="btn btn-outline-light btn-sm">See More</button>
					<button type="button" class="btn btn-primary btn-sm">Trade Now</button>
				</div>
			</div>
			<div class="carousel-item" data-interval="3000">
				<img src="pic/bg-2.jpg">
			</div>
		</div>
	</div>

	<!--Jumbotron-->
	<div class="container-fluid">
		<div class="row jumbotron">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tempora veritatis dolorum molestias at neque sed, porro ullam voluptatibus ipsum!</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
				<a href="#"><button type"button" class="btn btn-outline-secondary btn-lg">See More</button></a>
			</div>
		</div>
	</div>

<!--Latest Prod-->
<section class="top-latest-product-section">
    <div class="contatiner">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
                     <img src="pic/product-1.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Lightgray Shoes</p>
                    </div>
                </div>
            </div>
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
                     <img src="pic/product-2.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Socks</p>
                    </div>
                </div>
            </div>
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
						<div class="tag-new">New</div>
                     <img src="pic/product-3.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Watch</p>
                    </div>
                </div>
            </div>
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
                     <img src="pic/product-4.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Black Shoes</p>
                    </div>
                </div>
            </div>
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
                     <img src="pic/product-5.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Darkgray Shoes</p>
                    </div>
                </div>
            </div>
            <div class="ml-2 mr-2">
                <div class="product-item">
                    <div class="pi-pic">
                     <img src="pic/product-2.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>See Details</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                    <p>Assorted Socks</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Latest Prod-->

<!--Banner end-->
<section class="banner-section">
	<div class="container">
		<div class="banner set-bg" data-setbg="img/banner-bg.jpg">
			<div class="tag-new">NEW</div>
			<span>New Products</span>
			<h2>STRIPED SHIRTS</h2>
			<a href="#" class="site-btn">CHECK IT NOW</a>
		</div>
	</div>
</section>
<!--Banner end-->

	<!--Connect-->
	<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-12">
				<h2>Connect</h2>
			</div>
			<div class="col-12 social padding">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-youtube"></i></a>
			</div>
		</div>
	</div>
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<hr class="light">
				<h5>About</h5>
				<hr class="light">
				<p>Lorem, ipsum dolor.</p>
				<p>Lorem, ipsum.</p>
				<p>Lorem, ipsum.</p>
			</div>
			<div class="col-md-4">
				<img src="pic/logo.png">
				<hr class="light">
				<p>0912-345-6789</p>
				<p>tarade@gmail.com</p>
				<p>Manila City</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Free Shipping areas</h5>
				<hr class="light">
				<p>Pasig</p>
				<p>Pasay</p>
				<p>Taguig</p>
				<p>Taytay</p>
			</div>
			<div class="col-12">
				<h5>Copyright &copy;2020 All rights reserved</h5>
			</div>
		</div>
	</div>
</footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/2cdeb7e939.js"></script>

<script>
	$('.owl-carousel').owlCarousel({
		autoplay: true,
		items: 5,
		nav: true,
		loop: true,
		dots: false,
	});
</script>
<script>
	$(document).ready(function(){
		$(".dropdown").click(function(){
			$(".dropdown-list ul").toggleClass("active");
		});

		$(".dropdown-list ul li").click(function(){
		var text = $(this).text();
		$(".default-option").text(text);
		});

	});
</script>

</body>
</html>