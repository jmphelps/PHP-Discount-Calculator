<?php
    // get the data from the form
    $product_description = $_POST['product_description'];
    $list_price = $_POST['list_price'];
    $discount_percent = $_POST['discount_percent'];
	
	// validate product description data
    if ( empty($product_description) ) {
        $error_message = 'Product description is required.'; }
	
	// validate list price data
	else if ( empty($list_price) ) {
        $error_message = 'List Price is required.'; }
	else if ( !is_numeric($list_price) )  {
        $error_message = 'List Price must be a valid number.'; }
    else if ( $list_price <=0 ) {
        $error_message = 'List Price must be greater than zero.'; }
	 
	// validate discount percent data
	else if ( empty($discount_percent) ) {
        $error_message = 'Discount percent is required.'; }
	else if ( !is_numeric($discount_percent) )  {
        $error_message = 'Discount Percent must be a valid number.'; }
    else if ( $discount_percent <= 0 ) {
        $error_message = 'Discount Percent must be greater than zero.'; }
		
	// set error message to empty string if no invalid entries
	else {
       $error_message = ''; }  
	   
	// if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }
	
    // calculate the discount
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;
	$sales_tax_amount = $discount_price * .08;

    // apply currency formatting to the dollar and percent amounts
    $list_price_formatted = "$".number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".number_format($discount, 2);
    $discount_price_formatted = "$".number_format($discount_price, 2);
	$sales_tax_rate_formatted = "8%";
	$sales_tax_amount_formatted = "$".number_format($sales_tax_amount, 2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Product Discount Calculator</h1>
		
        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />
		
		<p><label>Sales Tax Rate:</label></p>
        <span><?php echo $sales_tax_rate_formatted; ?></span><br />
		
		<label>Sales Tax Amount:</label>
        <span><?php echo $sales_tax_amount_formatted; ?></span><br />

    </div>
</body>
</html>