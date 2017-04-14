<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Pincare</title>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:400,400i" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/layout.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/custom.js"></script>

<script type="text/javascript">

$(document).ready(function(){

     $("form[name='add_outlet']").validate({
    
    rules: {
       
      outlet_id: "required",
      password: "required",
      outlet_name: "required",
      address: "required",
      city :"required",
      zip :"required",
      country: "required",
      logni: "required",
      lati:"required",
      fb_page_id: "required",
      search_params:"required"
    },
     
    messages: {
      outlet_id: "Please enter outlet id (Which will be your login id!)",
      password: "Please enter your password",
      outlet_name: "Please enter your outlet name",
      address: "Please enter address",
      city : "Please enter city",
      country: "Please enter country",
      logni:"Please enter your outlet longitude",
      lati:"Please enter your outlet latitude",
      fb_page_id: "Please enter your facebook page id or page url",
      search_params:"Please enter search area for outlets/mall." 
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script>

</head>

<body>
    
<!-- leftmenu starts here -->
<div class="leftmenu">
    
    <ul>
        <li>Un-approved Products</li>
        
    </ul>
    
</div>  
<!-- leftmenu ends here -->    
    
<!-- right container starts here -->
<div class="right-container">
<div class="form-container">
    <table border="1" width="1200">
    <tr>
    <td width="200px">Product ID</td>
    <td width="200px">Product Title</td>
    <td width="200px">Image 1</td>
    <td width="200px">Image 2</td>
    <td width="200px">Image 3</td>
    <td width="200px">Image 4</td>
    <td width="200px">Image 5</td>
    <td width="200px" >Status/Action</td>
    </tr>

    <? if(!empty($all_prod)){
      foreach($all_prod as $prod){?>
    
    <tr>
    <td width="200px"><?php echo $prod['id']?></td>
    <td width="200px"><?php echo $prod['title']?></td>
    <td width="200px"><a href="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image1']?>" target="_blank"><img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image1']?>"></a></td>
    <td width="200px"><a href="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image2']?>" target="_blank"><img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image2']?>"></a></td>
    <td width="200px"><a href="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image3']?>" target="_blank"><img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image3']?>"></a></td>
    <td width="200px"><a href="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image4']?>" target="_blank"><img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image4']?>"></a></td>
    <td width="200px"><a href="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image5']?>" target="_blank"><img src="<?php echo base_url();?>public/images/product_images/<?php echo $prod['image5']?>"></a></td>
    <td width="200px" >
    <?php if($prod['status']=='t')
    {
      echo "Approved";
    }
    else
    {?>
       <a href="<?php echo base_url();?>admin/dashboard/update/<?php echo $prod['id'];?>"><input type="button" name="Update" value="update" ></a>
    <?php }?>
    

    </td>
    </tr>
  <?php }}?>


    </table>
</div>    
</div>    
<!-- right container ends here -->    
   
</body>    
</html>    