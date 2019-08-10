<?php 
  include'config/db.php';
  include'config/functions.php';
  include'config/main_function.php';
  $contact = getSingleRow("*","contact_id","contact","1"); 
  if(!empty($_SESSION['login_admin']))
{
    header("location: admin/");
}
if(!empty($_SESSION['login_user']))
{
    header("Location: user/");
}

?>
<?php include'assets/main_header.php';?>
  <body>
<?php include'assets/main_nav.php';?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/2.jpg);">
      	<div class="overlay"></div>
        <div class="container">

          <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
            
          <div class="col-md-6 text p-4 ftco-animate">
            <h1 class="mb-3">The Garden of the Holy Sacrifice</h1>
            <span class="location d-block mb-3"><i class="icon-my_location"></i> Sta. Ignacia Tarlac City</span>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
             <a href="register.php" class="btn btn-danger btn-lg"><i class="fa fa-pencil"></i> Signup</a> <a href="login.php" class="btn btn-info btn-lg"><i class="fa fa-pencil"></i> Login</a>
            
           
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
          <div class="col-md-6 text p-4 ftco-animate">
            <h1 class="mb-3">Where to find our Office?</h1>
            <span class="location d-block mb-3"><i class="icon-my_location"></i>Located at 2nd Floor Menchu Optical Building, F. Tafiedo Street, Tarlac City.</span>
            <p>We are open during weekdays at 8am-5pm and 8am-11am during Saturdays</p>
            <a href="register.php" class="btn btn-danger btn-lg"><i class="fa fa-pencil"></i> Signup</a> <a href="login.php" class="btn btn-info btn-lg"><i class="fa fa-pencil"></i> Login</a>
           
           
          </div>
        </div>
        </div>
      </div>
    </section>

  
	              


    
    <section class="ftco-section ftco-properties">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recent Posts</span>
            <h2 class="mb-4">Recent Properties</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="properties-slider owl-carousel ftco-animate">
    					<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/heywe.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<span class="status sale">Sold</span>
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Musoleum</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;20,000</span>
		    							</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/IMG_1530.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<span class="status sale">Sold</span>
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Musoleum</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;2,000 <small>/ month</small></span>
		    							</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/IMG_1532.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<span class="status sale">Sold</span>
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Musoleum</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;20,000</span>
		    							</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/IMG_1539.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<span class="status sale">Sold</span>
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Musoleum</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;20,000</span>
		    							</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/IMG_1538.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<span class="status rent">Sold</span>
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Musoleum</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;900 <small>/ month</small></span>
		    							</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="properties">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/IMG_1537.PNG);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<span class="status sale">Sale</span>
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">North Parchmore Street</a></h3>
				    						<p>Apartment</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">&#8369;20,000</span>
		    	
    	</div>
    </section>


<?php include'assets/main_footer.php';?>