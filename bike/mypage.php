<!DOCTYPE HTML>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
	<head>
		<title>Bike Seller</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript></noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

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

	<body>

		<section style="margin-top: 7em;">
			<div class="container" style="color:black;">
				<div class="card-deck mb-3 text-center">
					<div class="card mb-4 shadow-sm">
						<div class="card-header">
							<h4 class="my-0 font-weight-normal" style="color:black;">회원정보 & 주소정보</h4>
						</div>
						<div class="card-body">
							<?php
								$user_name = $_SESSION['user_name'];
								echo "<h1 class=\"card-title pricing-card-title\" style=\"color:black;\">$user_name 님</h1>";
							?>
							<button type="button" class="btn btn-lg btn-outline-primary" onClick="location.href='mypage_profile_modify.php'">수정하기</button>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
						<div class="card-header">
							<h4 class="my-0 font-weight-normal" style="color:black;">비밀번호 변경</h4>
						</div>
						<div class="card-body">
							<h1 class="card-title pricing-card-title" style="color:black;">비밀번호 변경하러 가기</h1>
							<button type="button" class="btn btn-lg btn-outline-primary" onClick="location.href='mypage_password_modify.php'">변경하기</button>
						</div>
					</div>
					<!-- <div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal" style="color:black;">배송지관리</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title" style="color:black;">배송지 조회하러 가기</h1>
						<ul class="list-unstyled mt-3 mb-4">
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-outline-primary">조회하기</button>
					</div>
					</div> -->


					<!-- <div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal" style="color:black;">비밀번호 변경</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title" style="color:black;">비밀번호 변경하러 가기</h1>
						<ul class="list-unstyled mt-3 mb-4">
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-outline-primary">비밀번호 변경하기</button>
					</div>
					</div> -->

					<!-- <div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal" style="color:black;">회원탈퇴</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title" style="color:black;">회원탈퇴 바로 가기</h1>
						<ul class="list-unstyled mt-3 mb-4">
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-outline-primary">회원 탈퇴하기</button>
					</div>
					</div> -->
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

		<script src="login_check.js"></script>
	</body>
</html>