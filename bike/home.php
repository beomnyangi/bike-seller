<!DOCTYPE HTML>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
	<head>
		<title>Bike Seller</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header" class="alt">
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
											$cookie = $_COOKIE['user_id'];
											if($cookie != ""){
												header("location: login_cookie_result.php");
											}

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

											echo "<li><a href=\"#\" onClick=\"chat()\">실시간 채팅</a></li>";
											echo "<script>";
												echo "function chat(){";
													echo "window.open(\"http://bikeseller.kro.kr:8080?a=$user_name\", \"실시간 채팅\", \"width=550, height=900\");";
													//echo "window.open(\"http://bikeseller.kro.kr:8080\", \"실시간 채팅\", \"width=550, height=900\");";
												echo "}";
											echo "</script>";

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

			<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Bike Seller</h2>
					<!-- <p>PHP test<br />
					teamnova<br />
					made by <a href="http://html5up.net">beom</a>.</p>
					<ul class="actions special">
						<li><a href="#" class="button primary">Activate</a></li>
					</ul> -->
				</div>
				<a href="#one" class="more scrolly">제품 보기</a>
			</section>

			<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="inner">
					<header class="major">
						<h2>giro'd italia 챔피언들의 자전거<br />
						</h2>
						<p>Bike Seller의 디자이너와 엔지니어들이 끊임없이 갈고닦으며 개발한<br />
						이 자전거로 세계 최고의 선수들이 각자의 분야에서 큰 승리를 거둘 수 있었습니다.</p>
					</header>
					<!-- <ul class="icons major">
						<li><span class="icon fa-gem major style1"><span class="label">Lorem</span></span></li>
						<li><span class="icon fa-heart major style2"><span class="label">Ipsum</span></span></li>
						<li><span class="icon solid fa-code major style3"><span class="label">Dolor</span></span></li>
					</ul> -->
				</div>
			</section>

			<!-- Two -->
			<section id="two" class="wrapper alt style2">
				
				<section class="spotlight" >
					<!-- 이미지 클릭 했을 때 다른 페이지로 이동 -->
					<div class="image" onClick="location.href='roadbikes_goods.php'" style='cursor:pointer;'><img src="images/road.jpg" alt="" />
					</div><div class="content" >
						<h2 ><a href="roadbikes_goods.php"></a>로드 자전거<br />
						road bikes</h2>
						<p>아스팔트 도로위에서 라이딩 누적 거리를 늘려보세요</p>
					</div>
				</section>


				<section class="spotlight">
					<div class="image" onClick="location.href='mtb_goods.php'" style='cursor:pointer;'><img src="images/mtb.jpg" alt="" /></div><div class="content">
						<h2>산악 자전거<br />
						mountain bikes</h2>
						<p>새로운 바이크셀러 MTB를 타고 트레일을 정복하세요.</p>
					</div>
				</section>
				<section class="spotlight">
					<div class="image" onClick="location.href='fitnessbikes_goods.php'" style='cursor:pointer;'><img src="images/fitness.jpg" alt="" /></div><div class="content">
						<h2>피트니스 자전거<br />
						fitness bikes</h2>
						<p>바이크셀러 피트니스 자전거로 두 바퀴 위에서 운동을 시작해보세요.</p>
					</div>
				</section>
			</section>

			<!-- Three -->
				<!-- <section id="three" class="wrapper style3 special">
					<div class="inner">
						<header class="major">
							<h2>Accumsan mus tortor nunc aliquet</h2>
							<p>Aliquam ut ex ut augue consectetur interdum. Donec amet imperdiet eleifend<br />
							fringilla tincidunt. Nullam dui leo Aenean mi ligula, rhoncus ullamcorper.</p>
						</header>
						<ul class="features">
							<li class="icon fa-paper-plane">
								<h3>Arcu accumsan</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
							<li class="icon solid fa-laptop">
								<h3>Ac Augue Eget</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
							<li class="icon solid fa-code">
								<h3>Mus Scelerisque</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
							<li class="icon solid fa-headphones-alt">
								<h3>Mauris Imperdiet</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
							<li class="icon fa-heart">
								<h3>Aenean Primis</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
							<li class="icon fa-flag">
								<h3>Tortor Ut</h3>
								<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
							</li>
						</ul>
					</div>
				</section> -->

			<!-- CTA -->
			<!-- <section id="cta" class="wrapper style4">
				<div class="inner">
					<header>
						<h2>Arcue ut vel commodo</h2>
						<p>Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.</p>
					</header>
					<ul class="actions stacked">
						<li><a href="#" class="button fit primary">Activate</a></li>
						<li><a href="#" class="button fit">Learn More</a></li>
					</ul>
				</div>
			</section> -->

			<!-- Footer -->
			<footer id="footer">
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
<pre>

바이크셀러 대표 김성범     주소 : 07011 서울특별시 동작구 사당동 318-13
사업자등록번호 : 123-45-67890     통신판매업신고: 제2020-서울동작-00002호
개인정보관리책임자 김성범     이메일: bikeseller@bikeseller.com     고객센터: 1588-1588

&copy; Bike Seller Components. All Rights Reserved.
</pre>
				</ul>
			</footer>
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>