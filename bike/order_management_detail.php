<!DOCTYPE html>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
<head>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

	<style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 700px;
		}
	</style>

	<title>Bike Seller</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript></noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

</head>

<body>

	<!-- 메뉴 바 -->
	<!-- Header -->
	<header id="header">
		<h1><a href="home.php">Bike Seller</a></h1>
		<nav id="nav">
			<ul>
				<li class="special">
					<a href="#menu" class="menuToggle"><span>Menu</span></a>
					<div id="menu">
						<ul>
							<?php
								if(!isset($_SESSION['user_email']) || !isset($_SESSION['user_name'])) {
									// echo "<li><a href=\"login.php\">Log In</a></li>";
									// echo "<li><a href=\"signup.php\">Sign Up</a></li>";
								} else {
									$user_email = $_SESSION['user_email'];
									$user_name = $_SESSION['user_name'];
									//echo "<li><a href=\"\">'$user_name'님 환영합니다.</a></li>";
									echo "<li><a href=\"mypage.php\">'$user_name'님 환영합니다.</a></li>";
									// echo "<li><a href=\"order_cart.php\">Shopping Cart</a></li>";
									// echo "<li><a href=\"logout.php\">Log Out</a></li>";
								}
							?>
							<li><a href="home.php">Home</a></li>
							<li><a href="roadbikes_goods.php">road bikes</a></li>
							<li><a href="mtb_goods.php">mountain bikes</a></li>
							<li><a href="fitnessbikes_goods.php">fitenss bikes</a></li>
							<?php
								if($_SESSION['user_id'] == '1') {
									//echo "<li><a>관리자 모드</a></li>";
									echo "<li><a href=\"product_add.php\">제품 등록</a></li>";
									echo "<li><a href=\"product_management.php\">제품 관리</a></li>";
									echo "<li><a href=\"order_management.php\">주문 목록</a></li>";
								}
							?>
							<?php
								if(!isset($_SESSION['user_email']) || !isset($_SESSION['user_name'])) {
									echo "<li><a href=\"login.php\">Log In</a></li>";
									echo "<li><a href=\"signup.php\">Sign Up</a></li>";
								} else {
									$user_email = $_SESSION['user_email'];
									$user_name = $_SESSION['user_name'];
									//echo "<li><a href=\"\">'$user_name'님 환영합니다.</a></li>";
									//echo "<li><a href=\"mypage.php\">'$user_name'님 환영합니다.</a></li>";
									if($_SESSION['user_id'] != '1') {
										//echo "<li><a>관리자 모드</a></li>";
										echo "<li><a href=\"order_cart.php\">Shopping Cart</a></li>";
										echo "<li><a href=\"order_list.php\">주문 내역</a></li>";
									}
									echo "<li><a href=\"logout.php\">Log Out</a></li>";
								}
							?>
							
							<!-- <li><a href="signup.php">Sign Up</a></li> -->
							<!-- <li><a href="login.php">Log In</a></li> -->
						</ul>
					</div>
				</li>
			</ul>
		</nav>
	</header>

	<!-- 체크아웃 -->
	<section style="margin-top: 3em;">
	<div class="container bootstrap snippets bootdeys">
		<div class="row">
			<div class="col-sm-12">
					<div class="panel panel-default invoice" id="invoice">
					<div class="panel-body">
						<div class="invoice-ribbon"><div class="ribbon-inner">ORDER INFO</div></div>
						<div class="row">

							<div class="col-sm-6 top-right">
							</div>

						</div>
						<hr>
						<div class="row">

							<div class="col-xs-4 to">
								<?php
									$host_name = '127.0.0.1';
									$user_name = 'root';
									$password = 'gozldgkwlak!724';
									$dbName = 'user_data';
									$tbName = 'user_order';

									$query = "SELECT * FROM user_order";
									
									// mysql 접속
									$conn = mysqli_connect($host_name, $user_name, $password);

									// 데이터베이스 선택
									mysqli_select_db($conn, $dbName);

									// 쿼리 전송
									$result = mysqli_query($conn, $query);
									$order_id_value = $_GET['order_id'];
									while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){                  
										$id_check = $row["id"];
										if($order_id_value == $id_check){
											$recipient_check = $row["recipient"];
											$contact_check = $row["contact"];
											$zip_code_check = $row["zip_code"];
											$address_check = $row["address"];
											$address_opt_check = $row["address_opt"];
											$memo_check = $row["memo"];
											echo "<p>수령인 : $recipient_check</p>";
											echo "<p>연락처 : $contact_check</p>";
											echo "<p>우편번호 : $zip_code_check</p>";
											echo "<p>주소 : $address_check</p>";
											echo "<p>세부주소 : $address_opt_check</p>";
											echo "<p>배송메모 : $memo_check</p>";
										}
										
									}
									

									// mysql 종료
									mysqli_close($conn);

									// 페이지 이동
									//header("location: order_finish.php");
								?>
								

							</div>

							<!-- <div class="col-xs-4 text-right payment-details">
								<p class="lead marginbottom payment-info">Payment details</p>
								<p>Date: 14 April 2014</p>
								<p>VAT: DK888-777 </p>
								<p>Total Amount: $1019</p>
								<p>Account Name: Flatter</p>
							</div> -->

						</div>

						<div class="row table-row">
							<table class="table table-striped" style="color : white;">
							<thead>
								<tr>
								<th class="text-center" style="width:5%">#</th>
								<th style="width:50%">Item</th>
								<th class="text-right" style="width:15%">Size</th>
								<th class="text-right" style="width:15%">Price</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$host_name = '127.0.0.1';
								$user_name = 'root';
								$password = 'gozldgkwlak!724';
								$dbName = 'user_data';
								$tbName = 'user_order';

								$query = "SELECT * FROM user_order";
								
								// mysql 접속
								$conn = mysqli_connect($host_name, $user_name, $password);

								// 데이터베이스 선택
								mysqli_select_db($conn, $dbName);

								// 쿼리 전송
								$result = mysqli_query($conn, $query);
								$order_id_value = $_GET['order_id'];

								$shipping_cost = 10000;

								while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){                  
									$id_check = $row["id"];
									if($order_id_value == $id_check){
										$output_array = json_decode($row["goods_info"]);
										$num = sizeof($output_array);

										// echo "<p>goods_info_check : $goods_info_check</p>";
										// echo "<p>output_array : $output_array</p>";
										// echo "<p>num : $num</p>";
										$count = 0;
										$count_num = 1;
										while($num > $count){
											$output_array = json_decode($row["goods_info"]);
											$size_array = json_decode($row["goods_size"]);

											$output = $output_array[$count];
											$size = $size_array[$count];

											mysqli_select_db($conn, "goods_data");
											$result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $output");
											$result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);

											$shipping_charges += $shipping_cost;
											$subtotal += $result_row[prod_price];
											
											echo "<tr>";
											echo "<td class=\"text-center\">$count_num</td>";
											echo "<td>$result_row[prod_name]</td>";
											echo "<td class=\"text-right\">$size</td>";
											echo "<td class=\"text-right\">₩$result_row[prod_price]</td>";
											echo "</tr>";
											
											$count++;
											$count_num++;
										}
										$total = $subtotal + $shipping_charges;
									}
									
								}
								// mysql 종료
								mysqli_close($conn);

								// 페이지 이동
								//header("location: order_finish.php");
							?>
							
							</tbody>
							</table>

						</div>

						<div class="row table-row mt-5">
							<table class="table table-striped" style="color : white;">
								<thead>
									<tr>
									<th class="text-left" style="width:15%">상품 금액</th>
									<th class="text-center" style="width:15%">배송비</th>
									<th class="text-right" style="width:50%">총 주문 금액</th>
									</tr>
								</thead>
								<tbody>
									<?php
										echo "<tr>";
										echo "<td class=\"text-left\">₩$subtotal</td>";
										echo "<td class=\"text-center\">₩$shipping_charges</td>";
										echo "<td class=\"text-right\">₩$total</td>";
										echo "</tr>";
									?>
								</tbody>
							</table>
						</div>

						<div class="row">
						<div class="col-xs-6 margintop">

							<!-- <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
							<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button> -->
						</div>
						<!-- <div class="col-xs-6 text-right pull-right invoice-total">
								<p>Subtotal : $1019</p>
								<p>Discount (10%) : $101 </p>
								<p>VAT (8%) : $73 </p>
								<p>Total : $991 </p>
						</div> -->
						</div>

					</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
<footer id="footer" style="background : #2e3842;">
				<!-- <ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
					<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
				</ul> -->
				<ul class="copyright">
					<li><a href="http://html5up.net">개인정보취급방침</a></li>
					<li><a href="http://html5up.net">이용약관</a></li>
					<li><a href="http://html5up.net">사업자정보확인</a></li>
<pre style="color : gray;">
바이크셀러 대표 김성범     주소 : 07011 서울특별시 동작구 사당동 318-13
사업자등록번호 : 123-45-67890     통신판매업신고: 제2020-서울동작-00002호
개인정보관리책임자 김성범     이메일: bikeseller@bikeseller.com     고객센터: 1588-1588
&copy; Bike Seller Components. All Rights Reserved.
</pre>
				</ul>
			</footer>
	
	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
</html>
