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
				 
			</div>


	    	<div class="sidebar-wrapper">
				<ul class="nav">
	                 

	                <li class="active">
	                    <a href="table.html">
	                        <i class="material-icons">content_paste</i>
	                        <p>Product Lists</p>
	                    </a>
	                </li>
	                    
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						 
						<a class="navbar-brand" href="#">Product List</a>
					</div>
					 
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Approved/Unapproved Products</h4>
	                                
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Title</th>
	                                    	<th>Product Type</th>
	                                    	<th>Packege Type</th>
											<th>Packege Weight</th>
											<th>Quantity</th>
											<th>Start Price</th>
											<th>Quality</th>
											<th>Source</th>
											<th>Status</th>
											<th>View</th>


	                                    </thead>
	                                    <tbody>

											<?php if(!empty($all_prod)){
											foreach($all_prod as $prod){?>

	                                        <tr>
	                                        	<td><?php echo $prod['title'];?></td>
	                                        	<td><?php echo $prod['product_type'];?></td>
	                                        	<td><?php echo $prod['packege_type'];?></td>
	                                        	<td><?php echo $prod['packege_weight'];?></td>
	                                        	 
	                                        	<td><?php echo $prod['quantity'];?></td>
	                                        	<td><?php echo $prod['current_price'];?></td>
	                                        	<td><?php echo $prod['degree_or_quality'];?></td>
	                                        	<td><?php echo $prod['source'];?></td>

	                                        	<td  >
    <?php if($prod['status']=='t')
    {
      echo "Approved";
    }
    else
    {?>
       <a href="<?php echo base_url();?>admin/dashboard/update/<?php echo $prod['id'];?>"><input type="button" name="Update" value="update" ></a>
    <?php }?>
    									<td>

    										<a href="<?php echo base_url();?>admin/dashboard/full_view/<?php echo $prod['id'];?>" target="_blank">Full View</td></a>
												 
	                                        </tr>

	                                        <?php }}?>
	                                         
	                                    </tbody>
	                                </table>

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
