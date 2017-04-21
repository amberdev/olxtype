<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Project Name</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>public/assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>public/assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">

			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
			 
					Project Name
				</a>
			</div>

	    	<div class="sidebar-wrapper">
				<ul class="nav">


	                
	                   
	                <li class="active">
	                   
	                    <a href="<?php echo base_url();?>admin/dashboard/">
	                        <i class="material-icons">library_books</i>
	                        <p>Product LIst</p>
	                    </a>
	                </li>
	                   
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			 

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Full view</h4>
	                               
	                            </div>
	                            <div class="card-content">
									<div id="typography">
										<div class="title">
											<h2>Product Details</h2>
										</div>
										<div class="row">
											     


											<div class="tim-typo">
												<h6><span class="tim-note">Title</span>
												<?php echo $prod[0]['title'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Product Type</span>
												<?php echo $prod[0]['product_type'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Packege Type</span>
												<?php echo $prod[0]['packege_type'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Packege Weight</span>
												<?php echo $prod[0]['packege_weight'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Weight</span>
												<?php echo $prod[0]['weight'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Quantity</span>
												<?php echo $prod[0]['quantity'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Current Price</span>
												<?php echo $prod[0]['current_price'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Degree Or Quality</span>
												<?php echo $prod[0]['degree_or_quality'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Source</span>
												<?php echo $prod[0]['source'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">location</span>
												<?php echo $prod[0]['location'];?> </h6>
											</div> 
											<?php if($prod[0]['image5']!='')
											{?>
												<div class="tim-typo">
												<h6><span class="tim-note">Image1</span></h6>
												

												<img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod[0]['image5']?>" width="200" height="200">


											</div> 
											<?php }?>

											<?php if($prod[0]['image4']!='')
											{?>
												<div class="tim-typo">
												<h6><span class="tim-note">Image2</span></h6>
												

												<img width="200" height="200" src="<?php echo base_url();?>public/images/product_images/<?php echo $prod[0]['image4']?>">


											</div> 
											<?php }?>

											<?php if($prod[0]['image3']!='')
											{?>
												<div class="tim-typo">
												<h6><span class="tim-note">Image3</span></h6>
												

												<img width="200" height="200" src="<?php echo base_url();?>public/images/product_images/<?php echo $prod[0]['image3']?>">


											</div> 
											<?php }?>


											<?php if($prod[0]['image2']!='')
											{?>
												<div class="tim-typo">
												<h6><span class="tim-note">Image4</span></h6>
												

												<img width="200px" height="200px" src="<?php echo base_url();?>public/images/product_images/<?php echo $prod[0]['image2']?>">


											</div> 
											<?php }?>

											<?php if($prod[0]['image1']!='')
											{?>
												<div class="tim-typo">
												<h6><span class="tim-note">Image5</span></h6>
												

												<img width="200px" height="200px" src="<?php echo base_url();?>public/images/product_images/<?php echo $prod[0]['image1']?>">


											</div> 
											<?php }?>

											 

											<div class="tim-typo">
												<h6><span class="tim-note">Closed Bid</span>
												<?php echo $prod[0]['closed_bid'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Added On</span>
												<?php echo $prod[0]['added_on'];?> </h6>
											</div> 

											<div class="tim-typo">
												<h6><span class="tim-note">Description</span>
												<?php echo $prod[0]['product_desc'];?> </h6>
											</div> 
										      
										 
										</div>
									</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	       
	    </div>
	</div>

</body>


	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>public/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>public/assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url();?>public/assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url();?>public/assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>public/assets/js/demo.js"></script>

</html>
