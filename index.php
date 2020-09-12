<?php 
session_start();

$host="localhost";
$user="root";
$password="";
$db="rubellite";

//code for cookie
$cookie_name = "Rubellite";
$cookie_value = "Hetal";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
if(!isset($_COOKIE[$cookie_name])) {
     //echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     //echo "Cookie '" . $cookie_name . "' is set!<br>";
     //echo "Value is: " . $_COOKIE[$cookie_name];
}

//end of cookie 

$conn = mysqli_connect($host,$user,$password);
mysqli_select_db($conn,$db);

if(isset($_POST['signin_submit'])){
    $login_email=mysqli_real_escape_string($conn,$_POST['signin_email']);
    $login_pass=mysqli_real_escape_string($conn,$_POST['signin_pass']);
    
    
	$sql="select * from logininfo where email='".$login_email."' AND password='".$login_pass."'";
	$result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
	
	
    $sql1 = "select id from logininfo where email='".$login_email."' ";
	
	$result2 = mysqli_query($conn,$sql1);

	#for getting no of rows(useless)
	$rows2 = mysqli_num_rows($result2);
	
	#for getting each row....but we will always get one row so not using loop


	$datarow = mysqli_fetch_assoc($result2);

	$_SESSION["user"]=$datarow["id"];
	
    if($rows==1){		
        echo '<script type="text/JavaScript">  
     alert("Logged in successfully");
     alert("'.$_SESSION["user"].'"); 
     </script>' ;
	 
	 header("Location:welcome.php");
	 
        exit();
    }
    else{
        echo '<script type="text/JavaScript">  
     alert("No account found"); 
     </script>' ;
        exit();
    }
}
	
	//code for registration
	if(isset($_POST['signup_submit'])){
    
    $i_name=mysqli_real_escape_string($conn,$_POST['signup_name']);
    $i_email=mysqli_real_escape_string($conn,$_POST['signup_email']);
	$i_password=mysqli_real_escape_string($conn,$_POST['signup_pass']);
    $i_phone=mysqli_real_escape_string($conn,$_POST['signup_phone']);

    $sql= "Insert INTO logininfo (email,password,name,phone) VALUES ('$i_email','$i_password','$i_name','$i_phone')";

    if (mysqli_query($conn,$sql)){
    	echo '<script type="text/JavaScript">  
     alert("Data inserted"); 
     </script>' ;
	 exit();

    	
    }
    else {
    	echo '<script type="text/JavaScript">  
     alert("Data Not inserted"); 
     </script>' ;
	 exit();
    }

   }
        

 ?>

<!DOCTYPE html>
<html>
<head>
<title>Rubellite</title>

<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="manifest" href="manifest.json">
<link rel="icon" href="images/favicon1.png" type="image/png" sizes="16x16">

<!--//tags -->
<!-- adding Favicons -->
  <link rel="icon" href="images/favicon1.png" type="image/png" sizes="16x16">

<!--  end -->
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a data-toggle="modal" data-target="#myModal">Sign In </a></li>
			<li> <a data-toggle="modal" data-target="#myModal2">Sign Up </a></li>
			<li>Call : 01234567898</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="index.php"><span>R</span>ubellite</a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
						                                   <li class="share">Share On : </li>
															<li><a href="https://www.facebook.com/rubellite.ruby.1" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															
															<li><a href="https://www.instagram.com/rubellite1/?hl=en" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
								
														</ul>



		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home</a></li>
					<li class=" menu__item"><a class="menu__link" href="about.html">About</a></li>
					<!-- LIST TAG FOR ALL THE EARNING -->
					<li class="dropdown menu__item">
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="#"><img src="images/i4.jpg" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="#"><img src="images/i2.jpg"/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">Contact Us</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
			<!-- end of navbar -->
		</div><!-- end of nav bar divsion -->
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
  
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 --><!-- code for sign in -->
		<div class="modal fade" id="myModal"  role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button><!-- cancel button on sign in modal -->
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
									<form action="index.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="signin_email" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="signin_pass" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" name="signin_submit" value="Sign In"><br>
								
						</form>
								<div class="clearfix"></div>
								<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>
								</div><!-- div for image in ssign in-->
								<div class="col-md-4 modal_body_right modal_body_right1">
									<img src="images/log_pic.jpg" alt=" "/>
								</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- // end of Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>

						 <form name="myForm" action="index.php" method="post" onsubmit="return validateForm()">



							<div class="styled-input agile-styled-input-top">
								<input type="text" name="signup_name">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="signup_email"> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="signup_pass"> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="signup_phone"> 
								<label>Phone</label>
								<span></span>
							</div> 
							
							<div class="styled-input">
								<select class="form-control" onchange="myfun(this.value)" name="signup_state">
								<option>Select State</option>
								<option>Maharashtra</option>
								<option>bihar</option>
								<option>UP</option>
								</select>
							</div>
							
							<div class="styled-input">
								<select class="form-control" id="city" name="signup_city">
								<option>Select city</option>
								</select>
							</div>
							
							
							<input type="submit" name="signup_submit" value="Sign Up">
						</form>
						  
														<div class="clearfix"></div>
														

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->

<!-- image slider-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest<span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>For Dazzling<span>Look</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Festive<span>Offer</span></h3>
						<p>Season Special</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Grab Your<span>Wedding Look!</span></h3>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Catchy<span>Look!</span></h3>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<!-- // End of Image slider -->
    <div class="banner_bottom_agile_info">
	    <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
    	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/fall head1.png" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>			
						</figure>
					</div>
					 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/fall head2.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>F</span>all Ahead</h3>
								<p>New Arrivals</p>
							</figcaption>			
						</figure>
					</div>
					<div class="clearfix"></div>
		    </div> 
		 </div> 
    </div>
  <!-- banner-bootom-w3-agileits -->
<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">Our<span>Products</span></h3>		
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li> Necklaces</li>
							<li> Earrings</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
						<div class="tab1">
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/necklace set/s1.jpg" alt="" class="pro-image-front">
										<img src="images/necklace set/s1.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
											
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Single Chain with pearl</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 50</span>
											<del>Rs 100</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Single Chain with pearl" />
																	<input type="hidden" name="amount" value="50" />
														
																	<input type="hidden" name="currency_code" value="Rs" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/necklace set/s2.jpg" alt="" class="pro-image-front">
										<img src="images/necklace set/s2.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
											
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Oval Silver Earrings</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 800</span>
											<del>900</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Oval Silver Earrings" />
																	<input type="hidden" name="amount" value="800" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
                            <div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/necklace set/s3.jpg" alt="" class="pro-image-front">
										<img src="images/necklace set/s3.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
											
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Silver Finish</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 1000</span>
											<del>Rs 1500</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Silver Finish" />
																	<input type="hidden" name="amount" value="1000" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/necklace set/s4.jpg" alt="" class="pro-image-front">
										<img src="images/necklace set/s4.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
											
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Fine Necklace Set</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 3000</span>
											<del>Rs 4000</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fine Necklace Set" />
																	<input type="hidden" name="amount" value="3000" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							
							<div class="clearfix"></div>
						</div><!-- exact end of tab 1 -->
						<!--//tab_one-->
						<!--/tab_two-->
						<div class="tab2">
							 <div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/earring/e1.jpg" alt="" class="pro-image-front">
										<img src="images/earring/e1.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
										
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Authentic Set</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 5000</span>
											<del>Rs 9000</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Authentic Set" />
																	<input type="hidden" name="amount" value="5000" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/earring/e2.jpg" alt="" class="pro-image-front">
										<img src="images/earring/e2.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
										
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Oval chain</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 900</span>
											<del>Rs 1000</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Oval chain" />
																	<input type="hidden" name="amount" value="900" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/earring/e3.jpg" alt="" class="pro-image-front">
										<img src="images/earring/e3.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
										
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Long Earrings</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 800</span>
											<del>Rs 980</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Long Earrings " />
																	<input type="hidden" name="amount" value="800" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="images/earring/e4.jpg" alt="" class="pro-image-front">
										<img src="images/earring/e4.jpg" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="#" class="link-product-add-cart" data-toggle="modal" data-target="#myModal">Quick View</a>
												</div>
											</div>
										
											
									</div>
									<div class="item-info-product ">
										<h4><a href="#">Delicate Look</a></h4>
										<div class="info-product-price">
											<span class="item_price">Rs 500</span>
											<del>Rs 1000</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Delicate Look" />
																	<input type="hidden" name="amount" value="500" />
																	<input type="hidden" name="discount_amount" value="0" />
																	<input type="hidden" name="currency_code" value="INR" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>
							
							<div class="clearfix"></div>
						</div><!-- exact end of tab 2 -->
					 <!--//tab_two-->
					</div><!-- end of class reponsive tab contatiner -->
				</div>	
			</div>
		</div><!-- end of 1st div -->
	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
			</div>
		</div>
	<!-- //we-offer -->
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span>E</span>Rubellite </a></h2>
			<p>Rubllite is Largest Fashion jwelley destination with robust online presence.Rubellite the only versatile collection of dazzling jwellery.</p>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+1 234 567 8901</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> rubellite@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Borivali(west),Shop no:20 
								<p>We open at <time>10:00</time> every morning.</p>

								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
</div>
<!-- //footer -->
<!-- signup start -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom"> 
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login end -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- js -->

<script><!-- script for signup -->
	function validateForm(){
		var name = document.forms["myForm"]["signup_name"].value;
		var email = document.forms["myForm"]["signup_email"].value;
		var password = document.forms["myForm"]["signup_pass"].value;
		var phone = document.forms["myForm"]["signup_phone"].value;

  		if (name == "") {
    		alert("Name must be filled out");
   		 return false;
		}
		else if (email == ""){
		alert("Email must be filled out");
   		 return false;
		}
		else if (password == ""){
		alert("password must be filled out");
   		 return false;
		}
		else if (phone == ""){
		alert("Phone number Required");
   		 return false;
		}
			
	}<!-- end of function -->
</script>


<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
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

	<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
<!-- script for ajax -->
<script type="text/javascript">
		function myfun(data)
		{
			//alert (data);
			var req = new XMLHttpRequest();
			req.open("GET","http://localhost/final rubellite website/response.php?datavalue="+data,true);
			req.send();
			//to acccess info onreadychange is us
			req.onreadystatechange=function(){
				if(req.readyState==4 && req.status==200){
					document.getElementById('city').innerHTML = req.responseText;
				}
			}
		}
	</script>
<!-- end ajax script -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
