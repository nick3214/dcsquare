<?php 
  include'config/db.php';
  include'config/functions.php';
  include'config/main_function.php';
  $contact = getSingleRow("*","contact_id","contact","1");
?>
<?php include'assets/main_header.php';?>
  <body>
<?php include'assets/main_nav.php';?>
  <div class="hero-wrap" style="background-image: url('images/2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>ABOUT US</span></p>
            <h1 class="mb-3 bread">ABOUT US</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftc-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/2.jpg);">
						
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 wrap-about pb-md-5 ftco-animate">
	            <div class="heading-section heading-section-wo-line mb-5 pl-md-5">
	          	 <div class="pl-md-5 ml-md-5">
		          	<span class="subheading">Company Overview</span>
		            
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p align="justify">A.	Holy Ground Memorial Park Inc. is the owner and developer of the Holy Ground Memorial Garden. We conceptualized a memorial park that will honor and immortalized the sacredness of a place for our dearly departed loved ones, thus, the Holy Ground Memorial Garden</p>
							<p align="justify">B.	The Company was incorporated last April 20 2000. It was registered at the housing and land use regulatory board (HLURB) on December 16 2000 under certificate registration number 05735 similarly, our business was also registered at the beauro of internal revenue on October 20 2000.</p>
							<p align="justify">C.	The project is located 904 Km. from the town proper of Sta. Ignacia Tarlac. It is conveniently located in Brgy. Poblacion East, near the public cemetery. It has an area of 17,716 sq., 30% or 5,315 sq. will be allotted to roads, pathways, parking spaces, garden and service facilities. The remaining 70% or 12,401 sq. will be for the saleable lots (4,960 lots).</p>
							<p align="justify">D.	The ownership structure is corporate in nature. It deals with sale of memorial lots and its maintenance.</p>
							
				</div>
			</div>
		</section>

    <?php include'assets/main_footer.php';?>