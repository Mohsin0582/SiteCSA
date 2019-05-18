<?php

//connects database
$conn = mysqli_connect("localhost", "root", "", "myshop");

/*
The function checks if a specific brand or category is not clicked, then it shows the 6 random products of any category or brand
*/
function getProduct(){
	global $conn ;
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
			$sql="Select * from products order by rand() LIMIT 0,6";
							$result=mysqli_query($conn, $sql);
							
							while($res=mysqli_fetch_array($result))
							{
								$product_id=$res['product_id'];
								$cat_id=$res['cat_id'];
								$brand_id=$res['brand_id'];
								$product_title=$res['product_title'];
								$product_desc=$res['product_desc'];
								$product_price=$res['product_price'];
								$product_img=$res['product_img'];
								
								echo "<div id='single_product'>
										<h3>$product_title</h3>
										<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
										</br>
										<p><b>Price:</b>&nbsp;$product_price</p>
										<div class='prod_controls'>
											<a href='details.php?pro_id=$product_id' style='float:left;'>Details</a>
											<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
										</div>
									</div>";
							}
			}
	}
}

/*
The function checks if a specific brand is clicked, then it shows the products of that particular brand
*/
function getBrandsProduct(){
	global $conn ;
	
	if(isset($_GET['brand'])){
		$brand_id=$_GET['brand'];
			$sql="Select * from products where cat_id='$brand_id'";
							$result=mysqli_query($conn, $sql);
							
							$count=mysqli_num_rows($result);
							if($count==0)
							{
								echo "<h4>Oops! No Product found in this brand!</h4>";
							}
							
							else{
								while($res=mysqli_fetch_array($result)){
									$product_id=$res['product_id'];
									$cat_id=$res['cat_id'];
									$brand_id=$res['brand_id'];
									$product_title=$res['product_title'];
									$product_desc=$res['product_desc'];
									$product_price=$res['product_price'];
									$product_img=$res['product_img'];
									
									echo "<div id='single_product'>
											<h3>$product_title</h3>
											<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
											</br>
											<p><b>Price:</b>&nbsp;$product_price</p>
											
											<div class='prod_controls'>
												<a href='details.php?pro_id=$product_id' style='float:left;'>Details</a>
												<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
											</div>
										</div>";
								}
							}
	}
}

/*
The function dynamically shows all the brands registered in the database manually
*/
function getBrands(){
	global $conn ;
	$get_brands="select * from brands";
					$result= mysqli_query($conn, $get_brands);
					
					while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$brand_id=$res['brand_id'];
						$brand_title=$res['brand_title'];
						echo " <li><a href='index.php?brand=$brand_id'>$brand_title</a></li> ";
					}
}

/*
The function checks if a specific category is clicked, then it shows the products of that particular category
*/
function getCategoriesProduct(){
	global $conn ;
	
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
			$sql="Select * from products where cat_id='$cat_id'";
							$result=mysqli_query($conn, $sql);
							
							$count=mysqli_num_rows($result);
							if($count==0)
							{
								echo "<h4>Oops! No Product found in this category!</h4>";
							}
							
							else{
								while($res=mysqli_fetch_array($result)){
									$product_id=$res['product_id'];
									$cat_id=$res['cat_id'];
									$brand_id=$res['brand_id'];
									$product_title=$res['product_title'];
									$product_desc=$res['product_desc'];
									$product_price=$res['product_price'];
									$product_img=$res['product_img'];
									
									echo "<div id='single_product'>
											<h3>$product_title</h3>
											<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
											</br>
											<p><b>Price:</b>&nbsp;$product_price</p>
											<div class='prod_controls'>
												<a href='details.php?pro_id=$product_id' style='float:left;'>Details</a>
												<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
											</div>
										</div>";
								}
							}
	}
}
	
/*
The function dynamically shows all the categories registered in the database manually
*/
function getCategories(){
	global $conn ;
	$get_cats="select * from categories";
					$result= mysqli_query($conn, $get_cats);
					
					while($res = mysqli_fetch_array($result)){
						$cat_id=$res['cat_id'];
						$cat_title=$res['cat_title'];
						echo " <li><a href='index.php?cat=$cat_id'>$cat_title</a></li> ";
					}
}	


function getAllProduct(){
	global $conn ;
			$sql="Select * from products";
							$result=mysqli_query($conn, $sql);
							
							while($res=mysqli_fetch_array($result))
							{
								$product_id=$res['product_id'];
								$cat_id=$res['cat_id'];
								$brand_id=$res['brand_id'];
								$product_title=$res['product_title'];
								$product_desc=$res['product_desc'];
								$product_price=$res['product_price'];
								$product_img=$res['product_img'];
								
								echo "<div id='single_product'>
										<h3>$product_title</h3>
										<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
										</br>
										<p><b>Price:</b>&nbsp;$product_price</p>
										<div class='prod_controls'>
											<a href='details.php?pro_id=$product_id' style='float:left;'>Details</a>
											<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
										</div>
									</div>";
							}
}

/*
Searchs the product customer has entered
*/
function searchProducts(){
	global $conn ;
	
	if(isset($_GET['search'])){
		$user_query=$_GET['user_query'];
			$sql="Select * from products where keywords like '%$user_query%'";
							$result=mysqli_query($conn, $sql);
							
							while($res=mysqli_fetch_array($result))
							{
								$product_id=$res['product_id'];
								$cat_id=$res['cat_id'];
								$brand_id=$res['brand_id'];
								$product_title=$res['product_title'];
								$product_desc=$res['product_desc'];
								$product_price=$res['product_price'];
								$product_img=$res['product_img'];
								
								echo "<div id='single_product'>
										<h3>$product_title</h3>
										<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
										</br>
										<p><b>Price:</b>&nbsp;$product_price</p>
										<a href='details.php?pro_id=$product_id' style='float:left;'>Details</a>
										<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
									</div>";
							}
	}
}

/*
Shows the details of the selected product
*/
function productDetails(){
	global $conn ;
	
	if(isset($_GET['pro_id'])){
		$product_id=$_GET['pro_id'];
			$sql="Select * from products where product_id='$product_id'";
							$result=mysqli_query($conn, $sql);
							
							while($res=mysqli_fetch_array($result))
							{
								$product_id=$res['product_id'];
								$cat_id=$res['cat_id'];
								$brand_id=$res['brand_id'];
								$product_title=$res['product_title'];
								$product_desc=$res['product_desc'];
								$product_price=$res['product_price'];
								$product_img=$res['product_img'];
								
								echo "<div id='single_product'>
										<h3>$product_title</h3>
										<img src='admin_area/product_imgs/$product_img' widht='180' height='180'/>
										</br>
										<p><b>Price:</b>&nbsp;$product_price</p>
										</br>
										<p>$product_desc</p>
										</br>
										<a href='index.php' style='float:left;'>Go Back</a>
										<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
									</div>";
							}
	}
}

//gets the id address of the customer pc
function ipAddress(){
		$ip_address='';
		//whether ip is from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   
		  {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		  }
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
		  {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		//whether ip is from remote address
		else
		  {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		  }
		  
		  return $ip_address;
}

/*
the function adds the specific clicked product into the cart
*/
function cart(){
	global $conn ;
	
	//check if add to cart button is clicked
	if(isset($_GET['add_cart'])){
		//if add to cart button is clicked,  store the product id of that particular product
		$product_id=$_GET['add_cart'];
		$ip_add=ipAddress();
		
		//select that particular product from the products table
				$sql3="Select * from products where product_id='$product_id'";
						$result3=mysqli_query($conn, $sql3);
						
						$result3_array=mysqli_fetch_array($result3);
						
						//get the product title and stock values
						$result3_name=$result3_array['product_title'];
						$result3_stock=$result3_array['stock'];	
						
						//menus one integer from the stock value
							$quantity=$result3_stock-1;
							//menus one integer from the stock value
							if($quantity<0){
								//if stock value reaches below zero threshold then generate an error
								echo "<script>window.open('error.php', '_self')</script>";
							}else{
								//if stock value is greater than 0 then insert the item in the cart
								$sqlQuery="insert into cart (product_id, ip_add, qty) values ('$product_id', '$ip_add', 1 )";
								$res=mysqli_query($conn, $sqlQuery);
								echo "<script>window.open('index.php', '_self')</script>";
								
							}
	}
}
/*
shows the numbers of items added in the cart
*/
function items(){
	global $conn ;
		$ip_add=ipAddress();
			$sql="Select * from cart where ip_add='$ip_add'";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				echo "$count";
}

/*
shows the total amount of all the products in the cart
*/
function total_price(){
	global $conn ;
	
	$total=0;
		$ip_add=ipAddress();
		$qty=0;
			$sql="Select * from cart where ip_add='$ip_add'";
				$result=mysqli_query($conn, $sql);
				while ($res=mysqli_fetch_array($result)){
					$product_id=$res['product_id'];		
					$qty=$res['qty'];		
					
					$sql2="Select * from products where product_id='$product_id'";
					$result2=mysqli_query($conn, $sql2);
					
					while($res2=mysqli_fetch_array($result2))
					{
							$res2['product_price']= $res2['product_price'] * $qty;
							$product_price=array($res2['product_price']);
							
						$values=array_sum($product_price);
						$total += $values;
					}
				}
				
				echo "$" . $total;
}

/*
	removes the selected items from the cart
*/
function removeItemFromCart(){
	global $conn ;
				if(isset($_POST['update'])){
							foreach($_POST['remove'] as $remove_id){
								$sql="delete from cart where product_id='$remove_id'";
								$result=mysqli_query($conn, $sql);
								
								if($result)
								{
									echo "<script>window.open('cart.php', '_self')</script>";
								}
							}
				}
}

/*
	shows the orders to the customer that are pending
*/
function getDefault(){
	global $conn ;
	 
	$c=$_SESSION['customer_email'];
	$sql="select * from customers where customer_email='$c'";
	$result=mysqli_query($conn, $sql);
	$result_array=mysqli_fetch_array($result);
	$customer_id=$result_array['customer_id'];
	
	if(!isset($_GET['orders'])){
		if(!isset($_GET['edit'])){
			if(!isset($_GET['changepassword'])){
				if(!isset($_GET['deleteaccount'])){
					$sql="select * from customer_orders where customer_id='$customer_id' AND order_status='pending'";
					$result=mysqli_query($conn, $sql);
					
					$result_array=mysqli_fetch_array($result);
	$order_id=$result_array['order_id']; 
	
					$count_rows=mysqli_num_rows($result);
					
					if($count_rows>0){
						echo "
							<div style='padding:10px;'>
								<h2>($count_rows) Pending Orders</h2>
								<h3><a href='my_account.php?orders'>Details</a></h3>
								</br>
								<h3><a href='confirm.php?orders=$order_id'>Pay Offline</a></h3>
							</div>
						";
					}
					else{
						echo "
							<div style='padding:10px;'>
								<h2>(0) Pending Orders</h2>
							</div>
						";
					}
					
	}
		
	}
	}
	}
}

?>