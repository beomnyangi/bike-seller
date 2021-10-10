<!DOCTYPE html>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
<head>

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
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

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

	<!-- 이미지 슬라이드 -->
	<section style="margin-top: 3em;">


		<div id="demo" class="carousel slide"  data-ride="carousel">


			<div class="container">


				<!-- Indicators -->
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>

				<!-- The slideshow -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img id="goods_img1" src="images/goods/road_goods_1-1.jpg">
						<div class="carousel-caption">
							<h3 id="goods_name1">S-WORKS TARMAC SL7 - DURA ACE DI2</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img id="goods_img2" src="images/goods/road_goods_1-2.jpg">
						<div class="carousel-caption">
							<h3 id="goods_name2">S-WORKS TARMAC SL7 - DURA ACE DI2</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img id="goods_img3" src="images/goods/road_goods_1-3.jpg">
						<div class="carousel-caption">
							<h3 id="goods_name3">S-WORKS TARMAC SL7 - DURA ACE DI2</h3>
						</div>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>


			</div>
		</div>
	</section>
	
	<!-- 제품 이름, 가격 주문 버튼 -->
	<section>
		<div class="row mr-1 mt-5">


			<div class="col ml-5">
				<div class="d-flex align-items-center justify-content-around">
					<div>
						<h1 id="goods_name4">S-Works Tarmac SL7 - Dura Ace Di2</h1>
            			<p id="goods_price">₩13,900,000</p>
            
					</div>
				</div>
			</div>

			<div class="col">
				<div class="d-flex align-items-center justify-content-around">
					<!-- size choice -->
					<div class="d-flex mr-5">
						<div class="d-flex align-items-center">
							<p class="mr-3">size 선택</p>
							<form action="order_cart_add.php" method="POST">
								<select id="goods_size" name="goods_size">
									<option value='2XS'>2XS</option>
									<option value='XS'>XS</option>
									<option value='S'>S</option>
									<option value='M'>M</option>
									<option value='L'>L</option>
									<option value='XL'>XL</option>
									<option value='2XL'>2XL</option>
								</select>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="d-flex align-items-center justify-content-around">
					<div>
					<!-- order_cart_add.php -->
						<!-- <form action="order_cart_add.php" method="POST" onsubmit=""> -->
							<?php
								$user_id = $_SESSION['user_id'];
								echo "<input type=\"hidden\" name=\"user_id\" value=\"$user_id\">"; 
							?>
							<?php
								$detail_value = $_GET['detail'];
								echo "<input type=\"hidden\" name=\"goods_id\" value=\"$detail_value\">"; 
							?>
							<?php
								if($_SESSION['user_id'] != '1') {
									echo "<button class=\"btn-primary\" type=\"submit\" value=\"submit\" style=\"color: black;\">장바구니에 담기</button>";
								}
							?>
							<!-- <button class="btn-primary" type="submit" value="submit" style="color: black;">장바구니에 담기</button> -->
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<hr>

	<section>

		<div class="row mr-1 mt-5">
			<div class="col">
				<div class="container">
					<div class="d-flex align-items-center justify-content-start">
						<div>
							<h1>Specs</h1>
							<p id="goods_name5">S-Works Tarmac SL7 - Dura Ace Di2</p>
						</div>
					</div>
					<div>
<pre id="com" style="color : white;">

</pre>
					
					</div>

				</div>
				
			</div>
		</div>
		
	</section>

	<hr>
	
	<section>

		<div class="row mr-1 mt-5">
			<div class="col">
				<div class="container">
					<div class="d-flex align-items-center justify-content-left">
						<div>
							<h1>지오메트리</h1>
						</div>
					</div>

				</div>
				
			</div>
		</div>

		<div class="row mr-1 mt-5">
			<div class="col">
				<div class="container">
					<div class="d-flex align-items-center justify-content-center">
						<div>
							<img id="goods_geo" src="images/geo/road_geo.jpg" alt="Geometry">
						</div>
					</div>

				</div>
				
			</div>
		</div>

		<div class="row mr-1 mt-5 mb-5">
			<div class="col">
				<div class="container">
					<div class="d-flex align-items-center justify-content-center">
							
						<div>
							<table style="font-size: 15px;">
								<thead>
									<tr>
										<td><!--empty--></td>
										<td><!--empty--></td>
										
											<th>2XS</th>
										
											<th>XS</th>
										
											<th>S</th>
										
											<th>M</th>
										
											<th>L</th>
										
											<th>XL</th>
										
											<th>2XL</th>
										
									</tr>
								</thead>
								<tbody>
									
										<tr>
											<td></td>
											<th>
												<div>
													신장
												</div>
											</th>
											
												<td>
													<span>&lt; 166 cm</span>
												</td>
											
												<td>
													<span>166 - 172 cm</span>
												</td>
											
												<td>
													<span>172 - 178 cm</span>
												</td>
											
												<td>
													<span>178 - 184 cm</span>
												</td>
											
												<td>
													<span>184 - 190 cm</span>
												</td>
											
												<td>
													<span>190 - 196 cm</span>
												</td>
											
												<td>
													<span>&gt; 196 cm</span>
												</td>
											
										</tr>
									
										<tr>
											<td>A</td>
											<th>
												<div>
													안장 높이
												</div>
											</th>
											
												<td>
													<span>624 - 704 mm</span>
												</td>
											
												<td>
													<span>654 - 734 mm</span>
												</td>
											
												<td>
													<span>684 - 764 mm</span>
												</td>
											
												<td>
													<span>714 - 794 mm</span>
												</td>
											
												<td>
													<span>744 - 824 mm</span>
												</td>
											
												<td>
													<span>774 - 854 mm</span>
												</td>
											
												<td>
													<span>804 - 884 mm</span>
												</td>
											
										</tr>
									
										<tr>
											<td>B</td>
											<th>
												<div>
													스택
												</div>
											</th>
											
												<td>
													<span>498 mm</span>
												</td>
											
												<td>
													<span>521 mm</span>
												</td>
											
												<td>
													<span>539 mm</span>
												</td>
											
												<td>
													<span>560 mm</span>
												</td>
											
												<td>
													<span>580 mm</span>
												</td>
											
												<td>
													<span>606 mm</span>
												</td>
											
												<td>
													<span>624 mm</span>
												</td>
											
										</tr>
									
										<tr>
											<td>C</td>
											<th>
												<div>
													리치
												</div>
											</th>
											
												<td>
													<span>372 mm</span>
												</td>
											
												<td>
													<span>378 mm</span>
												</td>
											
												<td>
													<span>390 mm</span>
												</td>
											
												<td>
													<span>393 mm</span>
												</td>
											
												<td>
													<span>401 mm</span>
												</td>
											
												<td>
													<span>419 mm</span>
												</td>
											
												<td>
													<span>429 mm</span>
												</td>
											
										</tr>
									
										<tr>
											<td>F</td>
											<th>
												<div>
													헤드튜브 각도
												</div>
											</th>
											
												<td>
													<span>70,5&deg;</span>
												</td>
											
												<td>
													<span>71,5&deg;</span>
												</td>
											
												<td>
													<span>72,75&deg;</span>
												</td>
											
												<td>
													<span>73,25&deg;</span>
												</td>
											
												<td>
													<span>73,25&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,75&deg;</span>
												</td>
											
										</tr>
									
										<tr>
											<td>G</td>
											<th>
												<div>
													시트튜브 각도
												</div>
											</th>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
												<td>
													<span>73,5&deg;</span>
												</td>
											
										</tr>
									
										<tr>
											<td>H</td>
											<th>
												<div>
													시트튜브 길이
												</div>
											</th>
											
												<td>
													<span>443 mm</span>
												</td>
											
												<td>
													<span>473 mm</span>
												</td>
											
												<td>
													<span>503 mm</span>
												</td>
											
												<td>
													<span>533 mm</span>
												</td>
											
												<td>
													<span>563 mm</span>
												</td>
											
												<td>
													<span>593 mm</span>
												</td>
											
												<td>
													<span>623 mm</span>
												</td>
											
										</tr>
									
										<tr>
											<td>I</td>
											<th>
												<div>
													체인스테이 길이
												</div>
											</th>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
												<td>
													<span>410 mm</span>
												</td>
											
										</tr>
									
								</tbody>
							</table>
						</div>

					</div>

				</div>
				
			</div>
		</div>

	</section>

	
	<?php
		$detail_value = $_GET['detail'];
		
		$host_name = '127.0.0.1';
		$user_name = 'root';
		$password = 'gozldgkwlak!724';
		$dbName = 'goods_data';
		$tbName = 'goods_detail';
		
		$query = "SELECT * FROM goods_detail";
		
		// mysql 접속
		$conn = mysqli_connect($host_name, $user_name, $password);
		
		// 데이터베이스 선택
		mysqli_select_db($conn, $dbName);
		
		// 쿼리 전송
		$result = mysqli_query($conn, $query);

		// 결과값 가져오기
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $detail_value");
		$result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);

		echo "<script>document.getElementById(\"goods_img1\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_1]\";</script>";
		echo "<script>document.getElementById(\"goods_img2\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_2]\";</script>";
		echo "<script>document.getElementById(\"goods_img3\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_3]\";</script>";
		
		echo "<script>document.getElementById(\"goods_name1\").innerHTML = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"goods_name2\").innerHTML = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"goods_name3\").innerHTML = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"goods_name4\").innerHTML = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"goods_name5\").innerHTML = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"goods_price\").innerHTML = \"₩$result_row[prod_price]\";</script>";
		echo "<script>document.getElementById(\"com\").innerHTML = \"$result_row[prod_com]\";</script>";
		// echo "<script>document.getElementById(\"goods_img1\").src = \"images/goods/road_goods_1-1.jpg\";</script>";
		// echo "<script>document.getElementById(\"goods_img2\").src = \"images/goods/road_goods_1-2.jpg\";</script>";
		// echo "<script>document.getElementById(\"goods_img3\").src = \"images/goods/road_goods_1-3.jpg\";</script>";
		echo "<script>document.getElementById(\"goods_geo\").src = \"images/geo/road_geo.jpg\";</script>";
		
		mysqli_close($conn);
		
	?>

	<!-- Footer -->
	<footer id="footer" style="background : #2e3842;">
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
