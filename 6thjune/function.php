<?php
	session_start();
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'cms');
	class DB_con
	{
		function __construct()
		{
			$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			$this->connection=$con;

		//<-----------------Check connection------------------->//
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}

		//<--------------Data Insertion Function--------------->//
		public function insert1($id,$product_name,$product_description,$product_SKU,$product_status)
		{
			$id = $id+1;
	    	 mysqli_query($this->connection,"INSERT INTO products(id,product_name, product_description, product_SKU, product_status) VALUES($id,'$product_name','$product_description','$product_SKU','$product_status')");
		 
		}

		public function insert2($id,$product_SKU,$product_price, $product_quantity)
		{ 
			$id = $id+1;
		 	mysqli_query($this->connection,"INSERT INTO stock_price(id,product_SKU, product_price, product_quantity) VALUES($id,'$product_SKU', '$product_price', '$product_quantity')");
		}

		//<--------------Fetching Data--------------->//
		public function fetchdata()
		{
			$result=mysqli_query($this->connection,"SELECT * FROM products LEFT JOIN stock_price ON stock_price.product_SKU = products.product_SKU");
			return $result;
		}

		//<--------------Data updation Function--------------->//
		public function update1($product_name,$product_description,$product_SKU,$product_status)
		{
			$updaterecord=mysqli_query($this->connection,"UPDATE  products SET product_name='$product_name',product_description='$product_description',product_SKU='$product_SKU',product_status='$product_status' WHERE product_SKU = '$product_SKU'");
			return $updaterecord;
		}

		public function update2($product_SKU,$product_price, $product_quantity)
		{
			$updaterecord=mysqli_query($this->connection,"UPDATE  stock_price SET product_SKU='$product_SKU',product_price='$product_price',product_quantity='$product_quantity' WHERE product_SKU = '$product_SKU'");
			return $updaterecord;
		}

		//<--------------Data Deletion function Function--------------->//
		public function delete($rid)
		{
			$deleterecord=mysqli_query($this->connection,"DELETE products, stock_price FROM products INNER JOIN stock_price ON products.product_SKU = stock_price.product_SKU where products.product_SKU='$rid'");
			return $deleterecord;
		}

		//<--------------To get last id value--------------->//
		public function lastrecord()
		{
			$result = mysqli_query($this->connection,"SELECT * FROM products ORDER BY id DESC LIMIT 1");
			return $result;
		}
	}